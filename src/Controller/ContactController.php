<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact_index')]
    public function index(
        Request $request,
        EntityManagerInterface $manager,
        MailService $mailService
    ): Response {
        $contact = new Contact();

        if ($this->getUser()) {
            $contact->setEmail($this->getUser()->getEmail())
                ->setFullName($this->getUser()->getFullName());
        }

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            
            $manager->persist($contact);
            $manager->flush();

            $mailService->sendMail(
                $contact->getEmail(),
                $contact->getSubject(),
                'emails/contact.html.twig',
                ['contact' => $contact]
            );

            $this->addFlash(
                'success',
                'Votre message a été envoyé avec succès !'
            );

            return $this->redirectToRoute('contact_index');
        }
        return $this->render('pages/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

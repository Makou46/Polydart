<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, MailerInterface $mailerInterface): Response
    {
        $form=$this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
            ->from($contact->get('email')->getData())
            ->to('support@polydart.makou-web.fr')
            ->subject('truc')
            ->htmlTemplate('mails/mail.html.twig')
            ->context([
                'prenom' => $contact->get('prenom')->getData(),
                'nom' => $contact->get('nom')->getData(),
                'adresse' => $contact->get('adresse')->getData(),
                'mail' => $contact->get('email')->getData(),
                'ville' => $contact->get('ville')->getData(),
                'pays' => $contact->get('email')->getData(),
                'message' => $contact->get('message')->getData(),
            ]);   
            $mailerInterface->send($email);
            $this->addFlash('success', 'message envoyé');
           // dd($email);
        }
        
        
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
            
        ]);
    }
}

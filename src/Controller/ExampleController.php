<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    /**
     * @Route("/test")
     */
    public function test(MailerInterface $mailer): Response
    {
        $mail = new Email();
        $mail->from(new Address('some@email.com', 'A name'))
            ->to(new Address('other@email.com', 'Another name'))
            ->subject('Test email')
            ->text('Some content here');
        $mailer->send($mail);

        return new Response('OK');
    }
}
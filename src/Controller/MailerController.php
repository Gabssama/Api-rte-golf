<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use App\Controller\GeneratepdfController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailerController extends AbstractController
{
    /**
     * @Route("/mailer", name="mailer")
     */

    private $mailer;
    private $pdf;
    private $knpSnappyPdf;

    public function __construct(MailerInterface $mailer, GeneratepdfController $pdf)
    {
        $this->mailer = $mailer;
        $this->pdf = $pdf;
    }

    /**
     * @param string $mail customer's email
     * @param array $products array of ids
     * @param string $filename name of pdf file
     * @return boolean 
     */
    
    public function orderEmail($mail, $filename, $products)
    {
        
        $pdf = $this->pdf->pdfCreate($products, $filename);

        if($pdf){
               
            $email = (new TemplatedEmail())
            ->from('no-reply@golf-api.com')
            ->to(new Address($mail))
            ->subject('Thanks for your order')
            ->htmlTemplate('generatepdf/index.html.twig')
            ->attachFromPath("pdf-temp/".$filename.'.pdf');
            $this->mailer->send($email);

            return true; 
        }else{
            return ("Erreur ! L'email n'a pas pu vous être envoyé.");
        }
    }
}


<?php

namespace App\Controller;

use App\Entity\Product;
use App\Controller\MailerController;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    /**
     * @Route("/api/order", name="order", methods={"POST"})
     */

    public function index(Request $request, ProductRepository $productRepository, MailerController $sendMail): Response
    {
        $order = $request->toArray();
        $ids = $order['productIds'];
        $products = $productRepository->findBy(['id' => $ids]);
        $client_name = $order['name'];
        $client_mail = $order['mail'];
        $filename = strtolower($client_name).'-'.uniqid();
       
        $sendMail->orderEmail($client_mail, $filename, $products);

        if($sendMail){
            return $this->render('mailer/index.html.twig', [
                'client_name' => $client_name    
            ]);
        }else{
            return ("Oops ! Une erreur est survenue ! ");
        };
    }
}

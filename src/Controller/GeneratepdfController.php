<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeneratepdfController extends AbstractController
{
    
    private $knpSnappyPdf;

    public function __construct(Pdf $knpSnappyPdf)
    {
        $this->knpSnappyPdf = $knpSnappyPdf;
       
    }
    
    /**
     * @Route("/generatepdf", name="generatePdf", methods={"GET"})
     */

    public function pdfCreate($products, $filename)
    {
           
        $html = $this->knpSnappyPdf->generateFromHtml(
            $this->renderView(
                'generatepdf/pdf.html.twig',
                array(
                    'headline'  => 'Review your order',
                    'products' => $products
                )
            ),
            'var/cache/pdf/'.$filename.'.pdf'
        );

        return true;
    }
}



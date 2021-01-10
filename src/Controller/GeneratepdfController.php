<?php

/* TODO 
 * Add HTML code in 'generatepdf/pdf.html.twig' for display more information to the customer
 */

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

    /**
     * @param array $products array of ids
     * @param string $filename name of pdf file
     * @return boolean 
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
            'pdf-temp/'.$filename.'.pdf'
        );

        return true;
    }
}



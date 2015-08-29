<?php

namespace PHPFastCGI\SpeedfonyBenchmarkingBundle\Controller;

use PHPFastCGI\SpeedfonyBenchmarkingBundle\DataFixtures\ORM\LoadPageData;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function randomPageAction()
    {
        $id = mt_rand(0, LoadPageData::NUMBER_OF_PAGES - 1);

        $repository = $this->getDoctrine()->getRepository('PHPFastCGISpeedfonyBenchmarkingBundle:Page');

        $page = $repository->find($id);

        $response = $this->render('PHPFastCGISpeedfonyBenchmarkingBundle:Default:page.html.twig', array('page' => $page));

        $repository->clear();

        return $response;
    }
}

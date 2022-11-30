<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TownsController extends AbstractController
{
    #[Route('/towns', name: 'towns_list')]
    public function index(): Response
    {
        $towns = ['Paris, New York, San Francisco'];
        return $this->render('towns/list.html.twig', [
            'towns' => $towns,
        ]);
    }
}

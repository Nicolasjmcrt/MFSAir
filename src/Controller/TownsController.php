<?php

namespace App\Controller;

use App\Repository\TownRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TownsController extends AbstractController
{
    #[Route('/towns', name: 'towns_list')]
    public function index(TownRepository $townRepository): Response
    {
        $towns_list = $townRepository->findAll();
        
        return $this->render('towns/list.html.twig', [
            'towns' => $towns_list,
        ]);
    }
}

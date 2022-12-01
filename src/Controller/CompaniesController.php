<?php

namespace App\Controller;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CompaniesController extends AbstractController
{
    #[Route('/companies', name: 'companies_list')]
    public function index(CompanyRepository $companyRepository): Response
    {
        $companies = $companyRepository->findAll();

        return $this->render('companies/index.html.twig', [
            'companies' => $companies,
        ]);
    }

    #[Route('/companies/{id}', name: 'company_show')]
    public function show(Request $request, CompanyRepository $companyRepository): Response
    {

        $id = $request->attributes->get('id');
        $company = $companyRepository->find($id);
        
        return $this->render('companies/show.html.twig', [
            'company' => $company,
        ]);
    }
}

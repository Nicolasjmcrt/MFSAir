<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController {
    
    #[Route('/product/{id?0}', name: 'product-by-id', requirements: ['id' => '\d{1,3}'])]
    public function showById(Request $request): Response
    {
        return new Response('Product ID: ' . $request->attributes->get('id'));
    }

    #[Route('/product/{slug}', name: 'product-by-slug', requirements: ['slug' => '[a-z]*'])]
    public function showBySlug(Request $request): Response
    {
        return new Response('Product Slug: ' . $request->attributes->get('slug'));
    }
}
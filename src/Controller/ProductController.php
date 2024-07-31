<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{ref}', name: 'app_product')] // {ref} paramètre dans l'url
    public function show(ProductRepository $productRepository, string $ref): Response
    {
        $product = $productRepository->findOneBy(['ref' => $ref]); // valeur du filtre
        return $this->render('product/show.html.twig', [
            'product' => $product, // Variable à passer à la vue
        ]);
    }
}

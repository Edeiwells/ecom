<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage', methods: ['GET'])]
    public function index(
        ProductRepository $productRepository

    ): Response {

        $products = $productRepository->findBy(
            [], // valeur du filtre
            ['name' => 'ASC'], // ordre du tri
            10
        ); // nb d'éléments à afficher
        // dd($products); // dup une variable et die pour arrêter le script


        return $this->render('homepage/index.html.twig', [
            'products' => $products,
        ]);
    }
}

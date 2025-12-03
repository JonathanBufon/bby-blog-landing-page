<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $products = [
            [
                'title' => 'Gatepass',
                'description' => 'Sistema completo de gestão de ingressos e eventos. Controle de acesso, validação em tempo real e relatórios detalhados.',
                'status' => 'available',
                'url' => 'https://gatepass.bbytech.com.br'
            ],
            [
                'title' => 'MenuFácil',
                'description' => 'Cardápio digital personalizado para restaurantes e bares. Agilidade no pedido e facilidade na atualização de produtos.',
                'status' => 'development',
                'url' => null
            ]
        ];

        return $this->render('home/index.html.twig', [
            'products' => $products
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contato', name: 'app_contact', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        return $this->json([
            'email' => 'suporte@bbytech.com.br',
            'links' => [
                [
                    'label' => 'LinkedIn',
                    'url' => 'https://www.linkedin.com/in/jonathan-bufon-892287247/',
                ],
                [
                    'label' => 'GitHub',
                    'url' => 'https://github.com/JonathanBufon',
                ],
            ],
        ]);
    }
}

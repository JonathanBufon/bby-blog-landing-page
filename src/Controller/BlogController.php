<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/blog', name: 'app_blog')]
class BlogController extends AbstractController
{
    #[Route('', name: '')]
    public function index(): Response
    {
        // Lista de posts - será lido de arquivos Twig posteriormente
        $posts = [
            [
                'slug' => 'post-componentes-twig-02-12-2025',
                'title' => 'Componentes Twig no Symfony: Construindo um Design System em PHP',
                'excerpt' => 'Descubra como criar componentes reutilizáveis em PHP usando Symfony UX Twig Component. PHP não ficou para trás quando o assunto é Design System!',
                'date' => new \DateTime('2024-12-02'),
                'author' => 'Jonathan Bufon'
            ]
        ];

        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);
    }

    #[Route('/{slug}', name: '_post')]
    public function post(string $slug): Response
    {
        // Verifica se o template do post existe
        $templatePath = sprintf('blog/posts/%s.html.twig', $slug);
        
        try {
            return $this->render($templatePath, [
                'slug' => $slug
            ]);
        } catch (\Exception $e) {
            throw $this->createNotFoundException('Post não encontrado');
        }
    }
}

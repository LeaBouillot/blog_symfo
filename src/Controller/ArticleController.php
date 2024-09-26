<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article', methods: ['GET'])]
    public function all(ArticleRepository $articles): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles->findBy(
                [],
                ['createdAt' => 'DESC']
            )
        ]);
    }

    #[Route('/article/{id}', name: 'article_show')]
    public function show(ArticleRepository $ar, Request $request, int $id): Response
    {
        $article = $ar->findOneBy(['id' => $id]);
        return $this->render('article/article_show.html.twig', [
            'article' => $article,
        ]);
    }
}

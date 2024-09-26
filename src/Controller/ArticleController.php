<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles->findBy(
                    [],
                    ['createdAt' => 'DESC']
                )
        ]);
    }
    
#Route : /article/{id}, name="article_show", methods=["GET"])
public function show(ArticleRepository $articles, $id): Response{
    return $this->render('article/show.html.twig', [
        'articles' => $articles->findOneBy(
                [id => $id],
            )
    ]);
}
}

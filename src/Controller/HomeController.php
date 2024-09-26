<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $ar): Response
    {
        $articles = $ar->findBy(
            [],
            ['createdAt' => 'DESC'],
            6 // On limite à 6 articles par page
        );

        return $this->render('home/index.html.twig', [
            'articles' => $articles // Envoie des articles à la vue Twig
        ]);
    }
}

<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article', name: 'fetch')]
class FetchDataController extends AbstractController
{

    /**
     * @var ArticleRepository
     */
    private ArticleRepository $articleRepository;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, ArticleRepository $articleRepository){
        $this->entityManager = $entityManager;
        $this->articleRepository = $articleRepository;
    }
//    /**
//     * @Route("/fetch", name="article_fetch")
//     */
    #[Route('/fetch', name: '_data')]
    public function fetchData()
    {
        $articles = $this->articleRepository->findAll();
//        $articles = $this->articleRepository->fetchAllData();
        dump($articles);

        return $this->render('fetchdata/index.html.twig', [
            'articles' => $articles
        ]);
    }
}

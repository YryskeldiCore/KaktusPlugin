<?php

namespace App\Controller\Author;

use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/author', name: 'fetch')]
class FetchAuthorController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;
    /**
     * @var AuthorRepository
     */
    private AuthorRepository $authorRepository;

    public function __construct(EntityManagerInterface $entityManager, AuthorRepository $authorRepository){
        $this->entityManager = $entityManager;
        $this->authorRepository = $authorRepository;
    }

    #[Route('/fetch', name: 'fetch_author')]
    public function fetchAuthors(): Response
    {
        $authors = $this->authorRepository->findAll();

        return $this->render('fetchauthor/index.html.twig', [
            'authors' => $authors,
        ]);
    }
}

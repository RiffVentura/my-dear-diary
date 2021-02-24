<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(
        EntityManagerInterface $em,
        AuthorRepository $authorRepository
    ): Response
    {
        $authors = $authorRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'authors' => $authors,
        ]);
    }

    /**
     * @Route("/a/{id}", name="author")
     */
    public function author(Author $author)
    {
        
        return $this->render('home/author.html.twig', [
            'author' => $author,
        ]);
    }
}

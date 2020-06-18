<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/{search}", name="home", defaults={"search":""})
     */
    public function index($search, EntityManagerInterface $manager, PostRepository $postRepo): Response
    {
        //$manager = $this->getDoctrine()->getManager();
        //$postRepo = $this->getDoctrine()->getRepository(Post::class);
        if (!empty($search)) {
            $items = $postRepo->search($search);
        } else {
            $items = $postRepo->findAll();
        }
        return $this->render('home/index.html.twig', [
            'items' => $items,
        ]);
    }
}

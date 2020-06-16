<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/post/{search}", name="post", defaults={"search":""})
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
        return $this->render('post/index.html.twig', [
            'items' => $items,
        ]);
    }
}

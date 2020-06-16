<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $postRepo = $this->getDoctrine()->getRepository(Post::class);
        $items = $postRepo->findAll();
        return $this->render('post/index.html.twig', [
            'items' => $items,
        ]);
    }
}

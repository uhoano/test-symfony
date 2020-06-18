<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContentController extends AbstractController
{
    /**
     * @Route("/content/id/{id}", name="content_from_id")
     */
    public function displayContentFromId(Post $oneItem): Response
    {
        return $this->render('home/index.html.twig', [
            'items' => [$oneItem],
        ]);
    }

    /**
     * @Route("/content/title/{title}", name="content_from_title")
     */
    public function displayContentFromTitle(Post $oneItem): Response
    {
        return $this->render('home/index.html.twig', [
            'items' => [$oneItem],
        ]);
    }
}

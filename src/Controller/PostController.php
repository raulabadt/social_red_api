<?php
namespace App\Controller;

use App\Document\Post;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{

    #[Route('/post/create', name: 'post_create')]
    public function create(DocumentManager $dm): Response
    {
        $post = new Post();
        $post->setTitle('nuevo post');
        $post->setContent('john.doe@example.com');
      
        $dm->persist($post);
        $dm->flush();
      

        return new Response('Created user with id ' . $post->getId());
    }
}

<?php
namespace App\Controller;

use App\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/user/create', name: 'user_create')]
    public function create(DocumentManager $dm): Response
    {
        $user = new User();
        $user->setUsername('john_doe');
        $user->setEmail('john.doe@example.com');
        $user->setPassword('securepassword');

        $dm->persist($user);
        $dm->flush();

        return new Response('Created user with id ' . $user->getId());
    }
}

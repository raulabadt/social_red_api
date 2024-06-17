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
        $user->setName('john_doe');
        $user->setMail('john.doe@example.com');
        $user->setPassword('securepassword');
        $user->setFechaNacimiento(new \DateTime('2000-01-01'));
        dump($user->getFechaNacimiento());
        $dm->persist($user);
        $dm->flush();
        $fetchedUser = $dm->getRepository(User::class)->find($user->getId());
        dump($fetchedUser->getFechaNacimiento());

        return new Response('Created user with id ' . $user->getId());
    }
}

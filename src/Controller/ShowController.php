<?php

namespace App\Controller;

use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    #[Route('/', name: 'app_show')]
    public function index(EntityManagerInterface $entityManager)
    {
     $repository = $entityManager->getRepository(Animal::class); 
     $animaux = $repository -> findAll();

     return $this->render('base.html.twig', [
        "animaux"=>$animaux
     ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController

{  
    #[Route('/', name: 'liste_animaux')]
    public function index(AnimalRepository $repository)
    {
     $animaux = $repository -> findAll(); 
     return $this->render('base.html.twig', [
        "animaux"=>$animaux
     ]);
    }

     #[Route('/animal/{id}', name: 'afficher_animal')]
    public function show(Animal $animal)
    {
         return $this->render('animal.html.twig', [
        "animal"=>$animal
     ]);
    }
}

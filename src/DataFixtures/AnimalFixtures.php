<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use FamilleFixtures;

class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

         // Récupérer les continents via leurs références
         $afrique = $this->getReference(ContinentFixtures::AFRIQUE_REFERENCE);
         $europe = $this->getReference(ContinentFixtures::EUROPE_REFERENCE);
         $asie = $this->getReference(ContinentFixtures::ASIE_REFERENCE);

         $famille1 = $this->getReference('famille_mammiferes');
         $famille2 = $this->getReference('famille_reptiles');
         $famille3 = $this->getReference('famille_poissons');

        $a1 = new Animal();
        $a1->setNom("cochon")
            ->setPoids(50)
            ->setTaille(1)
            ->setImage("cochon.png")
            ->setDangereux(false)
            ->setFamille($famille1)
            ->addContinent($europe);

        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("chien")
            ->setPoids(30)
            ->setTaille(1)
            ->setImage("chien.png")
            ->setDangereux(false)
            ->setFamille($famille1)
            ->addContinent($europe);


        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("requin")
            ->setPoids(400)
            ->setTaille(6)
            ->setImage("requin.png")
            ->setDangereux(true)
            ->setFamille($famille3)
            ->addContinent($afrique);


        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("serpent")
            ->setPoids(2)
            ->setTaille(2)
            ->setImage("serpent.png")
            ->setDangereux(true)
            ->setFamille($famille2)
            ->addContinent($afrique);


        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom("crocodile")
            ->setPoids(500)
            ->setTaille(4)
            ->setImage("croco.png")
            ->setDangereux(true)
            ->setFamille($famille2)
            ->addContinent($afrique);


        $manager->persist($a5);

        $manager->flush();
    }
     // Assure que ContinentFixtures est exécuté avant AnimalFixtures
     public function getDependencies()
     {
         return [
             ContinentFixtures::class,
         ];
     }
}

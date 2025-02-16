<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


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


        $a1 = new Animal();
        $a1->setNom("Cochon")
            ->setPoids(50)
            ->setTaille(1)
            ->setImage("cochon.png")
            ->addContinent($europe)
            ->addContinent($asie);

        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("Chien")
            ->setPoids(30)
            ->setTaille(1)
            ->setImage("chien.png")
            ->addContinent($europe);


        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("Requin")
            ->setPoids(400)
            ->setTaille(6)
            ->setImage("requin.png")
            ->addContinent($afrique)
            ->addContinent($europe);


        $manager->persist($a3);

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

<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $a1 = new Animal();
        $a1->setNom("Cochon")
            ->setPoids(50)
            ->setTaille(1)
            ->setImage("cochon.png");

        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("Chien")
            ->setPoids(30)
            ->setTaille(1)
            ->setImage("chien.png");

        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("Requin")
            ->setPoids(400)
            ->setTaille(6)
            ->setImage("requin.png");

        $manager->persist($a3);

        $manager->flush();
    }
}

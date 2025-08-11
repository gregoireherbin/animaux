<?php

namespace App\DataFixtures;

use App\Entity\Famille;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FamilleFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $f1 = new Famille();
        $f1 -> setLibelle("mammiferes");
        $f1 -> setDescription("des mangeurs de viandes");
        $this->addReference('famille_mammiferes', $f1);
        $manager -> persist($f1);

        $f2 = new Famille();
        $f2 -> setLibelle("reptiles");
        $f2 -> setDescription("des mangeurs de végétaux");
        $this->addReference('famille_reptiles', $f2);
        $manager -> persist($f2);

        $f3 = new Famille();
        $f3 -> setLibelle("poissons");
        $f3 -> setDescription("ils mangent de tout");
        $this->addReference('famille_poissons', $f3);
        $manager -> persist($f3);
        
        
        $manager->flush();
    }
}

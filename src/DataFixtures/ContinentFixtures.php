<?php

namespace App\DataFixtures;

use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class ContinentFixtures extends Fixture
{
    public const AFRIQUE_REFERENCE = 'continent-afrique';
    public const EUROPE_REFERENCE = 'continent-europe';
    public const ASIE_REFERENCE = 'continent-asie';



    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $europe = new Continent();
        $europe->setNom("Europe");
        $manager->persist($europe);

        $asie = new Continent();
        $asie->setNom("Asie");
        $manager->persist($asie);

        $afrique = new Continent();
        $afrique->setNom("Afrique");
        $manager->persist($afrique);

         // Enregistrement des références
         $this->addReference(self::AFRIQUE_REFERENCE, $afrique);
         $this->addReference(self::EUROPE_REFERENCE, $europe);
         $this->addReference(self::ASIE_REFERENCE, $asie);


        $manager->flush();
    }
}

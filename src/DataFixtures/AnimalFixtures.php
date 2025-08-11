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
            ->setDescription("Le Cochon domestique, Sus domesticus, synonyme Sus scrofa domesticus, est un mammifère domestique omnivore de la famille des Suidae. Appelé porc ou cochon, il est resté proche du sanglier avec lequel il peut se croiser.")
            ->setDangereux(false)
            ->setFamille($famille1)
            ->addContinent($europe);

        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setNom("chien")
            ->setPoids(30)
            ->setTaille(1)
            ->setImage("chien.png")
            ->setDescription("Le Chien, plus précisément désigné sous le nom de Chien domestique, est une espèce de mammifère de la famille des Canidés. Il s’agit de la forme domestiquée du loup gris, laquelle comprend également le dingo, retourné à l'état sauvage.")
            ->setDangereux(false)
            ->setFamille($famille1)
            ->addContinent($europe);


        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setNom("requin")
            ->setPoids(400)
            ->setTaille(6)
            ->setImage("requin.png")
            ->setDescription("Les requins, squales ou sélachimorphes forment un super-ordre des poissons cartilagineux, possédant cinq à sept fentes branchiales sur les côtés de la tête et les nageoires pectorales qui ne sont pas fusionnées à la tête. Ils sont présents dans tous les océans du globe et dans certains grands fleuves.")
            ->setDangereux(true)
            ->setFamille($famille3)
            ->addContinent($afrique);


        $manager->persist($a3);

        $a4 = new Animal();
        $a4->setNom("serpent")
            ->setPoids(2)
            ->setTaille(2)
            ->setImage("serpent.png")
            ->setDescription("Les serpents, de nom scientifique Serpentes, forment un sous-ordre de squamates carnivores au corps très allongé et dépourvus de membres apparents.")
            ->setDangereux(true)
            ->setFamille($famille2)
            ->addContinent($afrique);


        $manager->persist($a4);

        $a5 = new Animal();
        $a5->setNom("crocodile")
            ->setPoids(500)
            ->setTaille(4)
            ->setImage("croco.png")
            ->setDescription("Les Crocodilidés sont une famille de crocodiliens. Elle a été créée par Georges Cuvier en 1807. Cette famille regroupe comme espèces actuelles les crocodiles et le Faux-gavial de Malaisie ; toutefois des analyses génétiques récentes incluent les Tomistominés dans la famille des Gavialidés.")
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

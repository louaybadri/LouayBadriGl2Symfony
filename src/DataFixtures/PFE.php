<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PFE extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $faker=Factory::create();
        for ($i=0;$i<10;$i++){
            $entreprise= new \App\Entity\Entreprise();
            $name=$faker->domainName;
            $entreprise->setName($name);
            $pfe = new \App\Entity\PFE();
            $pfe->setStudent($faker->name);
            $pfe->setTitle($faker->name);
            $pfe->setEntreprise($entreprise);
            $manager->persist($entreprise);
            $manager->persist($pfe);

        }

        $manager->flush();

    }
}

<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PFE extends Fixture
{
    public $entreprises;

    public function load(ObjectManager $manager): void
    {

        $faker=Factory::create();
        for ($i=0;$i<20;$i++){
            $pfe = new \App\Entity\PFE();
            $pfe->setStudent($faker->name);
            $pfe->setTitle($faker->title);
            $pfe->setEntreprise("entreprise".$i);

            $manager->persist($pfe);

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

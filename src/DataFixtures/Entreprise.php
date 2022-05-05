<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Entreprise extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $faker=Factory::create();
//        for ($i=0;$i<20;$i++){
//            $entreprise = new \App\Entity\Entreprise();
//            $entreprise->setName($faker->name);
//            $manager->persist($entreprise);
//
//        }
//        // $product = new Product();
//        // $manager->persist($product);
//
//        $manager->flush();
    }
}

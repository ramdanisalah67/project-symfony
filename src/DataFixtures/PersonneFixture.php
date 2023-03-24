<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Personne ;
class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<20;$i++){
            $personne = new Personne();
            $personne->setFirstName($faker->FirstName);
            $personne->setAge($faker->numberBetween(18,65));
            $manager->persist($personne);
        }

        $manager->flush();
    }
}

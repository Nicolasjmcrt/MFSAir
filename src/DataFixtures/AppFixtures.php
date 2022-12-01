<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Town;
use App\Entity\Airport;
use App\Entity\Company;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create('en_US');

        // Towns & Airports
        for ($i=1; $i <= 5; $i++) { 

            $airport = new Airport();
            $airport
                ->setName($faker->company())
                ->setRunwaysNumber($i);
            $manager->persist($airport);
            
            $town = new Town();
            $town
                ->setName($faker->city())
                ->setState($faker->state())
                ->addAirport($airport);

            if($i % 2 ==0) {
                $airport = new Airport();
                $airport
                    ->setName($faker->company())
                    ->setRunwaysNumber($i);
                $manager->persist($airport);
                $town->addAirport($airport);
            }

            $manager->persist($town);

            

        }

        // Companies
        for ($i=1; $i < 5; $i++) { 
            $company = new Company();
            $company
                ->setName($faker->company())
                ->setEmployees($faker->numberBetween(100, 10000))
                ->setAcronym($faker->companySuffix());

            $manager->persist($company);
        }

        $manager->flush();
    }
}

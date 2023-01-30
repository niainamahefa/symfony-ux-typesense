<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Catalog;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 1000; $i++) {
            $data = new Catalog();
            $data->setTitle($faker->sentence(3));
            $data->setDateEnd(\DateTime::createFromFormat('Y-m-d', "2022-09-09"));
            $data->setIsInOffer(true);
            $data->setBrandName($faker->sentence(5));
            $data->setCategoryName($faker->sentence(5));
            $data->setThumbnailUrl('https://dash.rodzafer.re/uploads/small_63bcf4620da36000198c879f_p_1_8b89e7bee3.jpg');
            $manager->persist($data);
        }
        $manager->flush();
    }
}

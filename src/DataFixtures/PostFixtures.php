<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $onePost = new Post();
            $onePost->setTitle($faker->word());
            $onePost->setContent($faker->text(255));
            $manager->persist($onePost);
        }
        $manager->flush();
    }
}

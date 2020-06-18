<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    private function encode($user, $plaintextpassword)
    {
        return $this->passwordEncoder->encodePassword(
            $user,
            $plaintextpassword
        );
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $simpleUser = new User();
            $simpleUser->setNickname(strtolower($faker->firstName()));
            $simpleUser->setPassword($this->encode($simpleUser, "mdp"));
            $simpleUser->setRoles(['ROLE_USER']);
            $manager->persist($simpleUser);
        }
        $manager->flush();
    }
}

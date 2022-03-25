<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Users;
use App\Entity\Clients;
use App\Entity\Experts;
use App\Entity\CustomerSuccess;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    protected $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $idUser = 0;
        $csmail = ["cs1@mail.com", "cs2@mail.com", "cs3@mail.com", "cs4@mail.com", "cs5@mail.com"];
        for ($i=0; $i < 5; $i++) { 
            $cs[$i] = new CustomerSuccess();
            $user[$idUser] = new Users();
            

            $hash = $this->hasher->hashPassword($user[$idUser], "password");

            $user[$idUser]
                ->setEmail($csmail[$i])
                ->setPassword($hash)
                ->setNom($faker->lastname)
                ->setPrenom($faker->firstName)
                ->setRoles(['CS']);

            $manager->persist($user[$idUser]);

            $cs[$i] ->setCivilite("Monsieur")
                    ->setPrenom($user[$idUser]->getPrenom())
                    ->setNom($user[$idUser]->getNom())
                    ->setEmail($csmail[$i])
                    ->setTelephone($faker->PhoneNumber)
                    ->setUser($user[$idUser]);

            $manager->persist($cs[$i]);
            $idUser++;
        }

        $clientMail = ["client".$i."1@mail.com", "client".$i."2@mail.com", "client".$i."3@mail.com", "client".$i."4@mail.com", "client".$i."5@mail.com"];
        for ($y=0; $y < 5; $y++) { 
            $client[$y] = new Clients();
            $user[$idUser] = new Users();
            

            $date = new \DateTime();

            $user[$idUser]
            ->setEmail($clientMail[$y])
            ->setPassword($hash)
            ->setNom($faker->lastname)
            ->setPrenom($faker->firstName)
            ->setRoles(['CLIENT']);

            $manager->persist($user[$idUser]);

            $client[$y] ->setEmail("$clientMail[$y]")
                    ->setCivilite("Monsieur")
                    ->setPrenom($user[$idUser]->getPrenom())
                    ->setNom($user[$idUser]->getNom())
                    ->setEmail($user[$idUser]->getEmail())
                    ->setTelephone($faker->PhoneNumber)
                    ->setAdresse("rue Coeur")
                    ->setCodePostal("69007")
                    ->setVille("69007")
                    ->setActivite("69007")
                    ->setSiret("69007")
                    ->setStatus("69007")
                    ->setDateCreation($date)
                    ->setCustomerSuccess($cs[rand(0,4)])
                    ->setUser($user[$idUser]);
                
                $manager->persist($client[$y]);
                $idUser++;
            }

            $expertMail = ["expert".$i."1@mail.com", "expert".$i."2@mail.com", "expert".$i."3@mail.com", "expert".$i."4@mail.com", "expert".$i."5@mail.com"];
        for ($y=0; $y < 5; $y++) { 
            $expert[$y] = new Experts();
            $user[$idUser] = new Users();
            

            $date = new \DateTime();

            $user[$idUser]
            ->setEmail($expertMail[$y])
            ->setPassword($hash)
            ->setNom($faker->lastname)
            ->setPrenom($faker->firstName)
            ->setRoles(['EXPERT']);

            $manager->persist($user[$idUser]);

            $expert[$y] ->setEmail("$expertMail[$y]")
                    ->setCivilite("Monsieur")
                    ->setPrenom($user[$idUser]->getPrenom())
                    ->setNom($user[$idUser]->getNom())
                    ->setEmail($user[$idUser]->getEmail())
                    ->setTelephone($faker->PhoneNumber)
                    ->setAdresse("rue Coeur")
                    ->setCodePostal("69007")
                    ->setVille("69007")
                    ->setStatus("69007")
                    ->setDateCreation($date)
                    ->setUser($user[$idUser]);
                
                $manager->persist($expert[$y]);
                $idUser++;
            }
    $manager->flush();
    }
}
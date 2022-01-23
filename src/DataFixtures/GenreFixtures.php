<?php

namespace App\DataFixtures;
use App\Entity\Genre ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use  Faker;
class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Faker\Factory::create('fr_FR');
        for ($i=1;$i<=10;$i++){
            $genre = new Genre();
            $genre->setNom($faker->realText(10));
            
            $manager->persist($genre);
            $this->addReference('g_'.$i,$genre);
        }

        $manager->flush();
    }
}

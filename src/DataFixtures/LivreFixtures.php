<?php

namespace App\DataFixtures;
use App\Entity\Livre ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Faker\Factory::create('fr_FR');
        for($i=1 ; $i<=50 ; $i++){
            $livre= new Livre();
            for($j=1;$j<=$faker->numberBetween(1,2);$j++){
                $livre->addAuteur($this->getReference('aut_'.$faker->numberBetween(1,20)));
            }
            for($j=1;$j<=$faker->numberBetween(1,2);$j++){
                $livre->addGenre($this->getReference('g_'.$faker->numberBetween(1,10)));
            }
            $livre->setIsbn($faker->isbn13);
            $livre->setTitre($faker->realText(25));
            $livre->setDescription($faker->realText(80));
            $livre->setImage(('images/livres/book-'.$faker->numberBetween(1,25).'.jpg'));
            $livre->setDateDeParution($faker->dateTimeBetween($startDate = '1900-01-01', $endDate = '2021-01-01', $timezone = null));
            $livre->setNombrePages($faker->numberBetween($min = 10,$max=300));
            $livre->setNote($faker->numberBetween($min = 0,$max=20));
            
            $manager->persist($livre);
        }

        $manager->flush();
    }
}

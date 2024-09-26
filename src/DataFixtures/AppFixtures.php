<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->words(5, true))
                ->setContent($faker->text(500))
                ->setPremium($faker->boolean(30)) // 30% de chance que l'article soit premium
                ->setAuthor($faker->username())
            ;

            $manager->persist($article);
        }
        $manager->flush();
    }
}

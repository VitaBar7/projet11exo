<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        // create categories
        //$categories = ['mode', 'sport', 'bio']; exemple si on a de categories determinés, pas besoin de faker dans ce cas
            $categories = [];
            for ($i = 0; $i < 5; $i++) {
                    $category = new Category();
                    $category->setName($faker->unique()->word());
                    $manager->persist($category);
                    $categories[]=$category;  
                }

           // create array with articles
            for ($i = 0; $i < 10; $i++) {
                $article = new Articles(); //create a new class
                $article->setCategory($faker->randomElement($categories));
                $article->setTitle($faker->sentence($nbWords = 4, $variableNbWords = true));
                $article->setDescription($faker->text());
                $article->setCreatedAt($faker->dateTimeThisMonth());
                $article->setImage($faker->imageUrl(640, 480, 'fashion', true));

                $manager->persist($article);
            }
              


           $manager->flush();
       }
   }

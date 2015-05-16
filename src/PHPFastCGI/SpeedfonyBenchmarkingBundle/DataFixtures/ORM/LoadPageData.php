<?php

namespace PHPFastCGI\SpeedfonyBenchmarkingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use PHPFastCGI\SpeedfonyBenchmarkingBundle\Entity\Page;

class LoadPageData implements FixtureInterface
{
    const NUMBER_OF_PAGES = 500;

    public static $propertyWordLengths = array(
        'title'       => 5,
        'header'      => 10,
        'description' => 15,
        'text'        => 40,
    );

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $calculateProperty = function ($property) use ($faker) {
            return implode(' ', $faker->words(self::$propertyWordLengths[$property]));
        };

        for ($i = 0; $i < self::NUMBER_OF_PAGES; $i++) {
            $page = new Page();
            $page
                ->setId($i)
                ->setTitle($calculateProperty('title'))
                ->setHeader($calculateProperty('header'))
                ->setDescription($calculateProperty('description'))
                ->setText($calculateProperty('text'));

            $manager->persist($page);
        }

        $manager->flush();
    }
}

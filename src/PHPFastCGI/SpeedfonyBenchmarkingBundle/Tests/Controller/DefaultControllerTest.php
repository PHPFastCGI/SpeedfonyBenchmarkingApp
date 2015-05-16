<?php

namespace PHPFastCGI\SpeedfonyBenchmarkingBundle\Tests\Controller;

use PHPFastCGI\SpeedfonyBenchmarkingBundle\DataFixtures\ORM\LoadPageData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testRandomPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/random-page');

        $title       = $crawler->filter('title')->eq(0)->text();
        $header      = $crawler->filter('h1')->eq(0)->text();
        $description = $crawler->filter('h2')->eq(0)->text();
        $text        = $crawler->filter('p')->text();

        $this->assertEquals(LoadPageData::$propertyWordLengths['title'],       str_word_count($title));
        $this->assertEquals(LoadPageData::$propertyWordLengths['header'],      str_word_count($header));
        $this->assertEquals(LoadPageData::$propertyWordLengths['description'], str_word_count($description));
        $this->assertEquals(LoadPageData::$propertyWordLengths['text'],        str_word_count($text));
    }
}

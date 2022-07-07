<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HotelPageTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/hotel/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('table#hotel-table');
        $this->assertSelectorExists('table#hotel-table > tbody > tr');
    }
}

<?php
namespace App\Tests\integration;

use App\Entity\Hotel;
use App\Hotel\SearchService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HotelIntegrationTest extends KernelTestCase {
    
    public function testHotelSearch()
    {
        self::bootKernel();

        $container = static::getContainer();

        $em = $container->get(EntityManagerInterface::class);

        $hotel = new Hotel();
        $hotel->setName("123 hotel 123");
        $hotel->setAddress("address 123");

        $em->persist($hotel);
        $em->flush();


        $hotelSearchService = $container->get(SearchService::class);

        $results = $hotelSearchService->search("hotel");

        $this->assertNotEmpty($results);
    }
}
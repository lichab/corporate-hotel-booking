<?php
declare(strict_types=1);

namespace AppTest\Repository;

use App\EmployeeRepository;
use App\Repository\EmployeeRepositoryInMemory;
use App\Repository\HotelRepository;
use App\Repository\HotelRepositoryInMemory;
use PHPUnit\Framework\TestCase;

final class HotelRepositoryInMemoryTest extends TestCase
{
    /** @test */
    public function should_be_a_hotel_repository(): void {
        $this->assertInstanceOf(HotelRepository::class, new HotelRepositoryInMemory());
    }
}

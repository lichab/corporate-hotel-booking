<?php
declare(strict_types=1);

namespace AppTest;

use App\Hotel;
use App\HotelService;
use App\Repository\HotelRepository;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

final class HotelServiceTest extends TestCase
{
    use ProphecyTrait;

    /** @test */
    public function should_add_a_hotel()
    {
        $id = 'testid';
        $hotelName = 'hotel name';
        $repository = $this->prophesize(HotelRepository::class);
        $hotelService = new HotelService($repository->reveal());
        $hotelService->addHotel($id, $hotelName);

        $repository->save(new Hotel($id, $hotelName))->shouldHaveBeenCalled();
    }
}

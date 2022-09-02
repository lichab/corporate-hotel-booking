<?php

namespace App;

use App\Repository\HotelRepository;

class HotelService
{
    public function __construct(private readonly HotelRepository $repository)
    {
    }

    public function addHotel(string $id, string $hotelName):void
    {
        $this->repository->save(new Hotel($id, $hotelName));
    }

    public function setRoom(string $hotelId, string $number, string $roomType): void
    {
    }
}

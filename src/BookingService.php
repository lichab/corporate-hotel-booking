<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;

final class BookingService
{
    public function book(string $employeeId, string $hotelId, string $roomType, DateTimeImmutable $checkIn, DateTimeImmutable $checkOut): ?Booking
    {
        return new Booking('id', $employeeId, $hotelId, $roomType, $checkIn, $checkOut);
    }
}

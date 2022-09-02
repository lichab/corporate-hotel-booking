<?php
declare(strict_types=1);

namespace App;

use DateTimeImmutable;

final class Booking
{
    public function __construct(
        public readonly string $id,
        public readonly string $employeeId,
        public readonly string $hotelId,
        public readonly string $roomType,
        public readonly DateTimeImmutable $checkIn,
        public readonly DateTimeImmutable $checkOut,
    ) {}
}

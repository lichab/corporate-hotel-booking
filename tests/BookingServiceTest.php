<?php
declare(strict_types=1);

namespace AppTest;

use App\BookingService;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class BookingServiceTest extends TestCase
{
    /** @test */
    public function should_return_a_booking_confirmation(): void
    {
        $bookingService = new BookingService();
        $booking = $bookingService->book(
            $employeeId = 'employeeId',
            $hotelId = 'hotelId',
            $roomType = 'roomType',
            $checkIn = DateTimeImmutable::createFromFormat('!Y-m-d', '2022-09-15'),
            $checkOut = DateTimeImmutable::createFromFormat('!Y-m-d', '2022-09-22')
        );

        $this->assertNotNull($booking);
        $this->assertNotNull($booking->id);
        $this->assertEquals($employeeId, $booking->employeeId);
        $this->assertEquals($hotelId, $booking->hotelId);
        $this->assertEquals($roomType, $booking->roomType);
        $this->assertEquals($checkIn, $booking->checkIn);
        $this->assertEquals($checkOut, $booking->checkOut);
    }
}

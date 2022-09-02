<?php

use App\Booking;
use App\Repository\EmployeeRepositoryInMemory;
use App\Repository\HotelRepositoryInMemory;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use App\CompanyService;
use App\HotelService;
use App\BookingService;
use function PHPUnit\Framework\assertEquals;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private array $employeeIds = [];
    private array $hotelIds = [];

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given the employee :employeeName from company :company
     */
    public function theEmployeeFromCompany(string $employeeName, string $company)
    {
        $this->employeeIds[$employeeName] = $employeeId = $employeeName.'-id';
        $employeeRepository = new EmployeeRepositoryInMemory();
        $companyService = new CompanyService($employeeRepository);
        $companyService->addEmployee($company, $employeeId);
    }

    /**
     * @Given the hotel :hotelName has the following rooms:
     */
    public function theHotelHasTheFollowingRooms($hotelName, TableNode $table)
    {
        $this->hotelIds[$hotelName] = $hotelId = $hotelName.'-id';
        $hotelService = new HotelService();
        $hotelService->addHotel($hotelId, $hotelName);
        foreach ($table->getRows() as $row){
            $hotelService->setRoom($hotelId, $row[0], $row[1]);
        }
    }

    private string $bookedRoomHotelId;
    private string $bookedRoomType;
    private \DateTimeImmutable $bookedRoomCheckIn;
    private \DateTimeImmutable $bookedRoomCheckOut;
    private ?Booking $bookingConfirmation;

    /**
     * @When :employeeName books a :roomType in hotel :hotelName between :checkIn to :checkOut
     */
    public function bobBooksAInHotelBetweenTo(string $employeeName, string $roomType, string $hotelName, string $checkIn, string $checkOut): void
    {
        $this->bookedRoomHotelId = $this->hotelIds[$hotelName];
        $this->bookedRoomType = $roomType;
        $this->bookedRoomCheckIn = \DateTimeImmutable::createFromFormat('!Y-m-d', $checkIn);
        $this->bookedRoomCheckOut = \DateTimeImmutable::createFromFormat('!Y-m-d', $checkOut);

        $bookingService = new BookingService();
        $this->bookingConfirmation = $bookingService->book(
            $this->employeeIds[$employeeName],
            $this->bookedRoomHotelId,
            $this->bookedRoomType,
            $this->bookedRoomCheckIn,
            $this->bookedRoomCheckOut
        );
    }

    /**
     * @Then this room should be booked
     */
    public function thisRoomShouldBeBooked()
    {
        assertEquals($this->bookedRoomHotelId, $this->bookingConfirmation->hotelId);
        assertEquals($this->bookedRoomType, $this->bookingConfirmation->roomType);
        assertEquals($this->bookedRoomCheckIn, $this->bookingConfirmation->checkIn);
        assertEquals($this->bookedRoomCheckOut, $this->bookingConfirmation->checkOut);
    }

    /**
     * @Given that a booking policy for company :arg1 allows only standard room
     */
    public function thatABookingPolicyForCompanyAllowsOnlyStandardRoom($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then room should not be booked
     */
    public function roomShouldNotBeBooked()
    {
        throw new PendingException();
    }
}

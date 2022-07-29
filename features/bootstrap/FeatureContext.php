<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use App\CompanyService;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
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
     * @Given the employee :employee from company :company
     */
    public function theEmployeeFromCompany(string $employee, string $company)
    {
        $companyService = new CompanyService();
        $companyService->addEmployee($company, $employee);
    }

    /**
     * @Given the hotel :arg1 has the following rooms:
     */
    public function theHotelHasTheFollowingRooms($arg1, TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When Bob books the room number :arg2 in hotel :arg1
     */
    public function bobBooksTheRoomNumberInHotel($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then this room should be booked
     */
    public function thisRoomShouldBeBooked()
    {
        throw new PendingException();
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

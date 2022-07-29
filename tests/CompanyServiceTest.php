<?php
declare(strict_types=1);

namespace AppTest;

use App\EmployeeRepository;
use PHPUnit\Framework\TestCase;
use App\CompanyService;
use Prophecy\PhpUnit\ProphecyTrait;
use App\Employee;

final class CompanyServiceTest extends TestCase
{
    use ProphecyTrait;

    /** @test */
    public function should_add_an_employee()
    {
       $repository =  $this->prophesize(EmployeeRepository::class);
       $service = new CompanyService($repository->reveal());
       $service->addEmployee('companyID','employeeID');
       $repository->save(new Employee('companyID','employeeID'))->shouldHaveBeenCalled();
    }
}

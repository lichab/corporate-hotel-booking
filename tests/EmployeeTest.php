<?php
declare(strict_types=1);

namespace AppTest;

use PHPUnit\Framework\TestCase;
use App\Employee;

final class EmployeeTest extends TestCase
{
    /** @test */
    public function should_have_a_companyId_and_employeeId()
    {
       $employee = new Employee('companyId','employeeId');

       $this->assertEquals('companyId', $employee->companyId);
       $this->assertEquals('employeeId', $employee->employeeId);

    }
}

<?php
declare(strict_types=1);

namespace AppTest\Repository;

use App\Employee;
use App\EmployeeRepository;
use App\Repository\EmployeeRepositoryInMemory;
use PHPUnit\Framework\TestCase;

final class EmployeeRepositoryInMemoryTest extends TestCase
{
    private EmployeeRepositoryInMemory $subject;

    protected function setUp(): void
    {
        $this->subject = new EmployeeRepositoryInMemory();
    }

    /** @test */
    public function should_be_an_employee_repository(): void {
        $this->assertInstanceOf(EmployeeRepository::class, $this->subject);
    }

    /** @test */
    public function should_save_an_employee(): void
    {
        $this->subject->save($employee = new Employee('company', 'employee'));
        $this->assertSame($employee, $this->subject->get('employee'));
    }
}

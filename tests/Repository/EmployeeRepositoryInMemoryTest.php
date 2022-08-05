<?php
declare(strict_types=1);

namespace AppTest\Repository;

use App\EmployeeRepository;
use App\Repository\EmployeeRepositoryInMemory;
use PHPUnit\Framework\TestCase;

final class EmployeeRepositoryInMemoryTest extends TestCase
{
    /** @test */
    public function should_be_an_employee_repository(): void {
        $this->assertInstanceOf(EmployeeRepository::class, new EmployeeRepositoryInMemory());
    }
}

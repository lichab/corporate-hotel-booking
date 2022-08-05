<?php
declare(strict_types=1);

namespace App\Repository;

use App\Employee;
use App\EmployeeRepository;

final class EmployeeRepositoryInMemory implements EmployeeRepository
{
    private array $employees = [];

    public function save(Employee $employee): void
    {
        $this->employees[$employee->employeeId] = $employee;
    }

    public function get(string $id): ?Employee
    {
        return $this->employees[$id];
    }
}

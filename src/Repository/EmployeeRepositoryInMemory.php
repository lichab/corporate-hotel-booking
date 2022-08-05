<?php
declare(strict_types=1);

namespace App\Repository;

use App\Employee;
use App\EmployeeRepository;

final class EmployeeRepositoryInMemory implements EmployeeRepository
{
    public function save(Employee $employee): void
    {
        throw new \Exception('Implement this!');
    }
}

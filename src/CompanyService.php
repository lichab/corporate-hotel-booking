<?php
declare(strict_types=1);

namespace App;

final class CompanyService
{
    public function __construct(private readonly EmployeeRepository $repository)
    {
    }

    public function addEmployee(string $companyId, string $employeeId) : void {
        $this->repository->save(new Employee($companyId, $employeeId));
    }
}

<?php

namespace App;

interface EmployeeRepository
{
    public function save(Employee $employee): void;

    public function get(string $id): ?Employee;
}

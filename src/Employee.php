<?php

namespace App;

class Employee
{
    public function __construct(
        public readonly string $companyId,
        public readonly string $employeeId
    ) {
    }
}
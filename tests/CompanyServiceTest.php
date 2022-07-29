<?php
declare(strict_types=1);

namespace AppTest;

use PHPUnit\Framework\TestCase;
use App\CompanyService;

final class CompanyServiceTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $this->assertNotNull(
            new CompanyService()
        );
    }
}

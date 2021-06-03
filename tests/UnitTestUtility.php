<?php

declare(strict_types=1);

namespace DevUtils\Test;

use DevUtils\Utility;
use PHPUnit\Framework\TestCase;

class UnitTestUtility extends TestCase
{
    public function testCaptureClientIp(): void
    {
        $ip = Utility::captureClientIp();
        self::assertNull($ip); //Phpunit not read global ambient
    }

    public function testGeneratePassword(): void
    {
        $passWordFull = Utility::generatePassword(10);

        self::assertEquals(10, strlen($passWordFull));
        self::assertTrue(boolval(preg_match('@[A-Z]@', $passWordFull)));
        self::assertTrue(boolval(preg_match('@[a-z]@', $passWordFull)));
        self::assertTrue(boolval(preg_match('@[0-9]@', $passWordFull)));
        self::assertTrue(boolval(preg_match("/(?=.*[^A-Za-zd])/", $passWordFull)));
    }
}

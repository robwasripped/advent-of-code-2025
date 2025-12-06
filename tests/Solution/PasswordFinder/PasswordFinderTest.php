<?php

declare(strict_types=1);

namespace App\Tests\Solution\PasswordFinder;

use App\Solution\PasswordFinder\PasswordFinder;
use App\Solution\PasswordFinder\VaultInputs;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class PasswordFinderTest extends TestCase
{
    #[Test]
    public function findPassword_finds_password(): void
    {
        $vaultInputs = new VaultInputs(
            'L68',
            'L30',
            'R48',
            'L5',
            'R60',
            'L55',
            'L1',
            'L99',
            'R14',
            'L82',
        );

        $passwordFinder = new PasswordFinder(new NullLogger());

        $result = $passwordFinder->findPassword($vaultInputs);

        self::assertSame(3, $result);
    }
}
<?php

declare(strict_types=1);

namespace App\Tests\Solution\BatteryCombiner;

use App\Solution\BatteryCombiner\BatteryCombiner;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BatteryCombinerTest extends TestCase
{
    #[Test]
    #[DataProvider('joltBankProvider')]
    public function findHighestJoltage_returns_highest_joltage(string $joltBank, int $expectedResult): void
    {
        $batteryCombiner = new BatteryCombiner();

        $actualResult = $batteryCombiner->findHighestJoltage($joltBank);

        self::assertSame($expectedResult, $actualResult);
    }

    public static function joltBankProvider(): array
    {
        return [
            ['987654321111111', 98],
            ['811111111111119', 89],
            ['234234234234278', 78],
            ['818181911112111', 92],
        ];
    }
}
<?php

declare(strict_types=1);

namespace App\Tests\Solution\InvalidProductFinder;

use App\Solution\InvalidProductFinder\InvalidProductFinder;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InvalidProductFinderTest extends TestCase
{
    #[Test]
    #[DataProvider('rangeProvider')]
    public function findInvalidProducts_produces_expected_sum(array $range, array $expectedResult): void
    {
        $invalidProductFinder = new InvalidProductFinder();

        $result = $invalidProductFinder->findInvalidProducts($range);

        self::assertSame($expectedResult, $result);
    }

    public static function rangeProvider(): array
    {
        return [
            [\range(11, 22), [11, 22]],
            [\range(95, 115), [99]],
            [\range(998, 1012), [1010]],
            [\range(1188511880, 1188511890), [1188511885]],
            [\range(222220, 222224), [222222]],
            [\range(1698522, 1698528), []],
            [\range(446443, 446449), [446446]],
            [\range(38593856, 38593862), [38593859]],
            [\range(565653, 565659), []],
            [\range(824824821, 824824827), []],
            [\range(2121212118, 2121212124), []],
        ];
    }
}
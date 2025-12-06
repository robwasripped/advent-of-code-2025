<?php

declare(strict_types=1);

namespace App\Solution\PasswordFinder;

use Psr\Log\LoggerInterface;

class PasswordFinder
{
    private const int START_POINT = 50;

    public function __construct(
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function findPassword(VaultInputs $inputs): int {

        $position = self::START_POINT;
        $this->logger->debug("Position started at $position");

        $zeroCount = 0;

        foreach ($inputs->getRotations() as $rotation) {
            $this->logger->debug("Applying rotation value $rotation");
            $position += $rotation;

            if ($position % 100 === 0) {
                $zeroCount++;
            }
        }

        return $zeroCount;
    }
}
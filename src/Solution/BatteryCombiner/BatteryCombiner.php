<?php

declare(strict_types=1);

namespace App\Solution\BatteryCombiner;

class BatteryCombiner
{
    public function findHighestJoltage(string $joltBank): int
    {
        $bankSize = \strlen($joltBank);

        $highestJolt = 0;
        $nextHighJolt = 0;

        for ($i=0; $i < $bankSize; $i++) {
            $currentJolt = $joltBank[$i];
            $isLast = $i === $bankSize - 1;

            // Exit early if we reach the highest number possible
            if ($highestJolt === 9 && $currentJolt === 9) {
                return 99;
            }

            if ($highestJolt >= $currentJolt) {
                $nextHighJolt = \max($nextHighJolt, $currentJolt);
                continue;
            }

            if ($currentJolt > $highestJolt) {

                if ($isLast) {
                    $nextHighJolt = $currentJolt;
                } else {
                    $highestJolt = $currentJolt;
                    $nextHighJolt = 0;
                }
            }
        }

        return $highestJolt * 10 + $nextHighJolt;
    }
}
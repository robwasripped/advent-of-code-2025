<?php

declare(strict_types=1);

namespace App\Solution\PasswordFinder;

use Generator;

class VaultInputs {

    private readonly array $inputs;

    public function __construct(string ...$inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return Generator<int>
     */
    public function getRotations(): \Generator
    {
        foreach ($this->inputs as $input) {

            if ($input === '') {
                continue;
            }

            $rotations = (int) \substr($input, 1);

            yield match ($input[0]) {
                'L' => -$rotations,
                'R' => +$rotations,
            };
        }
    }
}
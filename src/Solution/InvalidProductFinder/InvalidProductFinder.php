<?php

declare(strict_types=1);

namespace App\Solution\InvalidProductFinder;

class InvalidProductFinder {

    public function findInvalidProducts(array $range): array {
        return \array_values(\preg_grep(
            '/^([1-9]\d*)\1$/',
            $range,
        ));
    }

    public function findInvalidProductsRepeated(array $range): array {
        return \array_values(\preg_grep(
            '/^([1-9]\d*)\1+$/',
            $range,
        ));
    }
}
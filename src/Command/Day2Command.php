<?php

declare(strict_types=1);

namespace App\Command;

use App\Solution\InvalidProductFinder\InvalidProductFinder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:day2-invalid-product-sum')]
class Day2Command
{
    public function __construct(
        private readonly InvalidProductFinder $invalidProductFinder,
    )
    {
    }

    public function __invoke(OutputInterface $output): int
    {
        $output->writeln('Loading input data');
        $productIdRanges = \file_get_contents(\dirname(__DIR__, 2) . '/data/day2/product_id_ranges.txt');

        $rangeStrings = \explode(',', $productIdRanges);
        $output->writeln(\sprintf('Found %u ranges', \count($rangeStrings)));

        $sum = 0;
        foreach ($rangeStrings as $rangeString) {
            list($from, $to) = \explode('-', $rangeString);

            $sum += \array_sum($this->invalidProductFinder->findInvalidProducts(\range($from, $to)));
        }

        $output->writeln("Sum: $sum");
        
        return 0;
    }
}
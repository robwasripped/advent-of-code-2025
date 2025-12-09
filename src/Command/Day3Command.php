<?php

declare(strict_types=1);

namespace App\Command;

use App\Solution\BatteryCombiner\BatteryCombiner;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:day3-battery-banks')]
class Day3Command
{
    public function __construct(
        private readonly BatteryCombiner $batteryCombiner,
    )
    {
    }

    public function __invoke(OutputInterface $output): int
    {
        $output->writeln('Loading input data');
        $productIdRanges = \file_get_contents(\dirname(__DIR__, 2) . '/data/day3/battery_banks.txt');

        $bankStrings = \explode("\n", $productIdRanges);
        $output->writeln(\sprintf('Found %u banks', \count($bankStrings)));

        $sum = 0;
        foreach ($bankStrings as $bankString) {
            if ($bankString === '') {
                continue;
            }
            
            $sum += $this->batteryCombiner->findHighestJoltage($bankString);
        }

        $output->writeln("Sum: $sum");
        
        return 0;
    }
}
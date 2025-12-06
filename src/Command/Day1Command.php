<?php

declare(strict_types=1);

namespace App\Command;

use App\Solution\PasswordFinder\PasswordFinder;
use App\Solution\PasswordFinder\VaultInputs;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:day1-vault-rotation-password')]
class Day1Command
{
    public function __construct(
        private readonly PasswordFinder $passwordFinder,
    )
    {
    }

    public function __invoke(OutputInterface $output): int
    {
        $output->writeln('Loading input data');
        $vaultInputText = \file_get_contents(\dirname(__DIR__, 2) . '/data/day1/vault_input.txt');

        $vaultInputArray = \explode("\n", $vaultInputText);
        $output->writeln(\sprintf('Found %u rotations', \count($vaultInputArray)));

        $vaultInputs = new VaultInputs(...$vaultInputArray);

        $result = $this->passwordFinder->findPassword($vaultInputs);

        $output->writeln("Password: $result");
        
        return 0;
    }
}
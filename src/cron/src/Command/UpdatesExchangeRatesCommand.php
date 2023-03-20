<?php

namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureLevel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdatesExchangeRatesCommand extends Command
{
    private const API_URL = 'https://api.coinpaprika.com/v1/price-converter?base_currency_id=usd-us-dollars&quote_currency_id=stx-stacks&amount=1';

    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository,
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:updates-exchange-rates';

    protected function configure(): void
    {
        $this->setDescription('Updates exchange rates.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = json_decode(file_get_contents(self::API_URL), false, 512, JSON_THROW_ON_ERROR);
        $dollarToMicrostxRate = $response->price * 1000000;

        /** @var CreatureLevel[] $creatureLevels */
        $creatureLevels = $this->creatureLevelRepository->findAll();
        $countLevels = count($creatureLevels);

        if ($countLevels < 1) {
            return Command::SUCCESS;
        }

        $progressBar = new ProgressBar($output, $countLevels);
        $progressBar->setFormat('debug');
        $progressBar->start();

        foreach ($creatureLevels as $creatureLevel) {
            $progressBar->display();
            $price = $creatureLevel->getPriceDollar() * $dollarToMicrostxRate;
            $creatureLevel->setPriceStacks($price);
            $progressBar->advance();
        }

        $this->creatureLevelRepository->flush();

        $progressBar->finish();
        $output->writeln('');

        return Command::SUCCESS;
    }
}

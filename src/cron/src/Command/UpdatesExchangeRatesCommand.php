<?php

namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureLevel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdatesExchangeRatesCommand extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:updates-exchange-rates';

    private const API_URL = 'https://api.coinpaprika.com/v1/price-converter?base_currency_id=usd-us-dollars&quote_currency_id=stx-stacks&amount=1';

    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Updates exchange rates.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return Command::SUCCESS;
        }

        $response = json_decode(file_get_contents(self::API_URL), false, 512, JSON_THROW_ON_ERROR);
        $usdToStxRate = $response->price;

        /** @var CreatureLevel[] $creatureLevels */
        $creatureLevels = $this->creatureLevelRepository->findAll();
        $countLevels = count($creatureLevels);

        if ($countLevels < 1) {
            $this->release();

            return Command::SUCCESS;
        }

        $progressBar = new ProgressBar($output, $countLevels);
        $progressBar->setFormat('debug');
        $progressBar->start();

        foreach ($creatureLevels as $creatureLevel) {
            $progressBar->display();
            $price = round($creatureLevel->getPriceUSD() * $usdToStxRate * 100) * 10000;
            $creatureLevel->setPriceStacks($price);
            $progressBar->advance();
        }

        $this->creatureLevelRepository->flush();

        $progressBar->finish();
        $output->writeln('');
        $this->release();

        return Command::SUCCESS;
    }
}

<?php

namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureLevel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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

        $io = new SymfonyStyle($input, $output);

        $output->write('Start time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        /** @var CreatureLevel[] $creatureLevels */
        $creatureLevels = $this->creatureLevelRepository->findAll();
        $count = count($creatureLevels);

        if ($count > 0) {
            $progressBar = new ProgressBar($output, $count);
            $progressBar->setFormat('debug');

            if ($output->isVerbose()) {
                $progressBar->start();
            }

            $usdToStxRate = $this->getUsdToStxRate();

            foreach ($creatureLevels as $creatureLevel) {
                if ($output->isVerbose()) {
                    $progressBar->display();
                }

                $price = round($creatureLevel->getPriceUSD() * $usdToStxRate * 100) * 10000;
                $creatureLevel->setPriceStacks($price);

                if ($output->isVerbose()) {
                    $progressBar->advance();
                }
            }

            $this->creatureLevelRepository->flush();

            if ($output->isVerbose()) {
                $progressBar->finish();
                $output->writeln('');
            }
        }

        $output->write('End time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        $output->writeln('Update prices: ' . $count);

        if ($output->isVerbose()) {
            $io->success('Complete!');
        }

        $this->release();

        return Command::SUCCESS;
    }

    private function getUsdToStxRate()
    {
        $response = json_decode(file_get_contents(self::API_URL), false, 512, JSON_THROW_ON_ERROR);

        return $response->price;
    }
}

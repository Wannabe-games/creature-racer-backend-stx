<?php

namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportDataLevelsCommand extends Command
{
    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'import:level-data:csv';

    protected function configure()
    {
        $this->setDescription('Import data from CSV file')
            ->addArgument('filename', InputArgument::REQUIRED);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $filename = $input->getArgument('filename');

        $data = $this->extracted($io, $filename);

        $progressBar = new ProgressBar($output, count($data));
        $progressBar->start();
        $progressBar->setFormat('debug');


        foreach ($data as $row) {
            /** @var CreatureLevel $creatureLevels */
            $creatureLevels = $this->creatureLevelRepository->findOneBy([
                'creatureType' => $row[1],
                'upgradeType' => $row[2],
                'level' => $row[3]
            ]);

            if (!empty($creatureLevels)) {
                $creatureLevels->setPriceGold($row[6]);
                $creatureLevels->setPriceStacks($row[7]);

                /** @var CreatureUpgrade $performance */
                foreach ($creatureLevels->getUpgradeChanges() as $performance) {
                    if ($performance->getName() === $row[4]) {
                        $performance->setValue($row[5]);
                    }
                }

                $this->creatureLevelRepository->save($creatureLevels);
            }
            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln('');

        return 0;
    }

    /**
     * @param SymfonyStyle $io
     * @param mixed        $filename
     *
     * @return array
     */
    protected function extracted(SymfonyStyle $io, mixed $filename): array
    {
        $io->note('Preparing data');

        if (!str_ends_with($filename, '.csv')) {
            throw new \InvalidArgumentException('Invalid file extension provided. Expected .csv');
        }

        $file = fopen('uploads/' . $filename, 'r');
        $isTitleRow = true;
        $lines = [];

        try {
            while ($line = fgetcsv($file, 0, '|', '"')) {
                if ($isTitleRow) {
                    $isTitleRow = false;
                    continue;
                }

                $lines[] = $line;
            }
        } catch (\Exception $e) {
            dump($e->getMessage());
        }

        fclose($file);

        return $lines;
    }
}

<?php

namespace Yipdi\PortalBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FizzBuzzCommand extends ContainerAwareCommand
{

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this->setName('mj:fizzbuzz')
            ->setDescription('Do the fizzbuzz kata.')
            ->addArgument('max', InputArgument::REQUIRED, 'How long should it run?')
            ->addOption('colorized', 'c', InputOption::VALUE_NONE, 'Should the output be highlighted?');
    }


    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $end = (int)$input->getArgument('max');

        for ($i = 1; $i <= $end; $i += 1) {

            if ($i % 3 === 0 && $i % 5 === 0) {
                $stringToRender = 'FizzBuzz';

                if ($input->getOption('colorized')) {
                    $stringToRender = '<bg=green;fg=white>' . $stringToRender . '</bg=green;fg=white>';
                }

                $output->writeln($stringToRender);

            } elseif ($i % 5 === 0) {

                $stringToRender = 'Buzz';

                if ($input->getOption('colorized')) {
                    $stringToRender = '<fg=green>' . $stringToRender . '</fg=green>';
                }

                $output->writeln($stringToRender);

            } elseif ($i % 3 === 0) {

                $stringToRender = 'Fizz';

                if ($input->getOption('colorized')) {
                    $stringToRender = '<fg=red>' . $stringToRender . '</fg=red>';
                }

                $output->writeln($stringToRender);

            } else {

                $output->writeln($i);

            }

        }

        return 0;

    }

}
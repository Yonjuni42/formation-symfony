<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ToggleComputersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('park:toggle')
            ->setDescription('Disable all computers')
            ->addArgument(
                'enable',
                InputArgument::REQUIRED,
                'Do you want to enable or disable all computers?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('enable');
        if ($argument == 'yes')
            $enabled = true;
        else
            $enabled = false;
        $computerManager = $this->getContainer()->get('app.computer_manager');

        $computerManager->setComputers($enabled);

        $output->writeln(($enabled?'Enabled':'Disabled').' all computers');
    }
}
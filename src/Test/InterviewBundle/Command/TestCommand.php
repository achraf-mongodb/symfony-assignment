<?php

namespace Test\InterviewBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Test\InterviewBundle\Services\BiosService;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('test:command')
            ->setDescription('The command check if a Bios document with an id of the argument exists')
            ->addArgument('id', InputArgument::REQUIRED, 'The id of the bios')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $dialog = $this->getHelperSet()->get('dialog');

        if (!$dialog->askConfirmation($output, '<question>his is a test. Do you want to continue (y/N) ?</question>')) {
            $output->writeln(
                'Nothing done. Exiting...'
            );

            return;
        }
        try {
            /** @var BiosService $biosService */
            $biosService = $this->getContainer()->get('test.interview.bios_service');
            $bios = $biosService->findById($id);

            if (!$bios) {
                throw new \Exception('Document does not exist for id ' . $id);
            }

            $output->writeln(
                'document exists'
            );
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
        }
    }
}

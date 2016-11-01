<?php

namespace SandboxBundle\Command;

use SandboxBundle\Service\TeddyBear;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppDebugCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:debug')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $teddyBear = $this->getContainer()->get('app.teddyBear');
        if (!$teddyBear->getHead())
            throw new \RuntimeException('Teddy does not have a head');
        else if (!$teddyBear->getBody())
            throw new \RuntimeException('Teddy does not have a body');


        $output->writeln("TeddyBear HEAD: ");
        $output->writeln("TeddyBear has ".$teddyBear->getHead()->getEyeCount().
            " eyes, a ".$teddyBear->getHead()->getNoseShape().
            " nose and it is ".$teddyBear->getHead()->getFaceExpression());
        $output->writeln("\nTeddyBear BODY: ");
        $output->writeln("TeddyBear has a ".$teddyBear->getBody()->getBodyColor().
            " body, ".$teddyBear->getBody()->getArmCount().
            " arms and ".$teddyBear->getBody()->getLegCount()." legs");

        $output->writeln("\nThis is my TeddyBear!");
    }

}

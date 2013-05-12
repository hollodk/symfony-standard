<?php

namespace Club\UserBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class CreateCommand extends ContainerAwareCommand
{
  protected function configure()
  {
    $this
      ->setName('club:user:create')
      ->setDescription('Create user')
      ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $user = new \Club\UserBundle\Entity\User();
    $user->setMemberNumber(1);
    $user->setPassword('test');

    $em = $this->getContainer()->get('doctrine.orm.entity_manager');
    $em->persist($user);
    $em->flush();
  }
}

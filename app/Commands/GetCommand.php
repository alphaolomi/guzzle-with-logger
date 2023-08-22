<?php

namespace Alpha\Guzzle\Commands;

use Alpha\Guzzle\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetCommand extends Command
{
    protected static $defaultName = 'get';

    protected function configure()
    {
        $this->setDescription('Make a GET request to JSONPlaceholder');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $response = $client->get('posts/1');
        $output->writeln("Response:\n" . $response);
        return Command::SUCCESS;
    }
}
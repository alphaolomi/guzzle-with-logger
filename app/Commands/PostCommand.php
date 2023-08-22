<?php

namespace Alpha\Guzzle\Commands;

use Alpha\Guzzle\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PostCommand extends Command
{
    protected static $defaultName = 'post';

    protected function configure()
    {
        $this->setDescription('Make a POST request to JSONPlaceholder');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $response = $client->post('posts', [
            'json' => ['title' => 'New Post', 'body' => 'This is the content'],
        ]);
        $output->writeln("Response:\n" . $response);
        return Command::SUCCESS;
    }
}

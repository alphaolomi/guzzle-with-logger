<?php

namespace Alpha\Guzzle\Commands;

use Alpha\Guzzle\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AllCommand extends Command
{
    protected static $defaultName = 'all';

    protected function configure()
    {
        $this->setDescription('Get all posts from JSONPlaceholder');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $response = $client->get('posts?_limit=5');

        $rows = [];
        $posts = json_decode($response, true);
        $headers = ['ID', 'Title', 'Body'];

        foreach ($posts as $post) {
            $rows[] = [$post['id'], $post['title'], $post['body'],];
        }

        $table = new Table($output);
        $table->setHeaders($headers)->setRows($rows);
        $table->render();

        return Command::SUCCESS;
    }
}

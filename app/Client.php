<?php

declare(strict_types=1);

namespace Alpha\Guzzle;

// Monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Guzzle
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client as GuzzleClient;

// GuzzleLogMiddleware
use GuzzleLogMiddleware\LogMiddleware;


class Client
{
    private $client;

    public function __construct()
    {
        // Project root path + /logs
        // $logsPath = __DIR__ . '/../../logs';

        // $logFile = $logsPath . '/guzzle.log';

        // A new PSR-3 Logger like Monolog
        $logger = new Logger('guzzle');
        // A new StreamHandler to save the logs in a file 'guzzle.log
        $logger->pushHandler(
            new StreamHandler(
                'logs/guzzle.log', // 'logs/guzzle.log
                Level::Debug
            )
        );

        // will create a stack stack with middlewares of guzzle 
        // already pushed inside of it.
        $handlerStack = HandlerStack::create();
        $handlerStack->push(new LogMiddleware(
            $logger,
            null,
            $onFailureOnly = false,
            $logStatistics = true
        ));

        $this->client = new GuzzleClient([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            'handler' => $handlerStack,
            'debug' => true,
        ]);
    }

    public function get(string $url): string
    {
        $response = $this->client->request('GET', $url);
        return $response->getBody()->getContents();
    }

    public function post(string $url, array $data)
    {
        $response = $this->client->request('POST', $url, $data);
        return $response->getBody()->getContents();
    }
}

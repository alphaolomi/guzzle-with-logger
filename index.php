<?php

require 'vendor/autoload.php';

// Monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Guzzle
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

// GuzzleLogMiddleware
use GuzzleLogMiddleware\LogMiddleware;


$logger = new Logger('log-guzzle');  //A new PSR-3 Logger like Monolog
$logger->pushHandler(new StreamHandler('logs/guzzle.log', Level::Debug)); //A new StreamHandler to save the logs in a file 'guzzle.log

$stack = HandlerStack::create(); // will create a stack stack with middlewares of guzzle already pushed inside of it.
$stack->push(new LogMiddleware($logger));
// Create a new Guzzle client instance
$client = new GuzzleHttp\Client([
    'handler' => $stack,
]);

// Make a GET request to a URL
$response = $client->get('https://jsonplaceholder.typicode.com/posts/1');

// Get the response body as a string
$response = $response->getBody()->getContents();

// Convert the response to a PHP associative array
$body = json_decode($response, true);

// Print the response array
print_r($body);


// add records to the log
// $logger->warning('Foo');
// $logger->error('Bar');
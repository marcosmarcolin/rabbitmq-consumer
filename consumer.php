<?php

use Bunny\Channel;
use Bunny\Message;
use MarcosMarcolin\RabbitMQ\Consumer\ConfigClient;
use Workerman\Worker;
use Workerman\RabbitMQ\Client;

require __DIR__ . '/vendor/autoload.php';

$worker = new Worker();

$worker->onWorkerStart = function () {
    /* Configure the connection with RabbitMQ */
    $options = (new ConfigClient())->toArray();
    // example
    // $options = (new ConfigClient())->setHost('192.168.33.128')->setHeartbeat(25.0)->toArray();
    (new Client($options))->connect()->then(function (Client $client) {
        return $client->channel();
    })->then(function (Channel $channel) {
        return $channel->queueDeclare('queue_name', false, true, false, true)->then(function () use ($channel) {
            return $channel;
        });
    })->then(function (Channel $channel) {
        echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";
        $channel->consume(
            function (Message $message, Channel $channel, Client $client) {
                echo " [x] Received ", $message->content, "\n";
            },
            'queue_name',
            '',
            false,
            true
        );
    });
};

Worker::runAll();
### Repository for studies only

# Consume your RabbitMQ queue with Workerman

First of all:

``` shell
composer install
```

Open the file `consumer.php`, use the library's default settings or insert custom by calling the
class `MarcosMarcolin\RabbitMQ\Consumer\ConfigClient`.

### Example of custom options configuration

``` php

use MarcosMarcolin\RabbitMQ\Consumer\ConfigClient;
use Workerman\RabbitMQ\Client;

$options = (new ConfigClient())->setHost('192.168.33.128')->setHeartbeat(25.0)->toArray();
(new Client($options))->connect()->then(function (Client $client) {
    return $client->channel();
})
...
```

## Run the file in the terminal:

``` php
php consumer.php start
```

Send some message to the queue you configured earlier, the message should appear in the terminal.

-----

### Author

Marcos Marcolin <marcolindev@gmail.com>
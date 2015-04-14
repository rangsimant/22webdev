<?php
require_once __DIR__ .'/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPConnection('localhost', 5672, 'sunnamaja', '1100s0120877');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
for ($i=0; $i < 100; $i++) { 
	$channel->basic_publish($msg, '', 'task_queue');
}

echo " [x] Sent 'Hello World!' total: ".$i."\n";

$channel->close();
$connection->close();
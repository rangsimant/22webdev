<?php
require_once __DIR__ .'/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPConnection('localhost', 5672, 'sunnamaja', '1100s0120877');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

// $msg = new AMQPMessage('Hello World!');
// for ($i=0; $i < 150000; $i++) { 
// 	$channel->basic_publish($msg, '', 'hello');
// }

// echo " [x] Sent 'Hello World!' total: ".$i."\n";

$data = implode(' ', array_slice($argv, 1));
for ($i=0; $i < 1000; $i++) { 
$data = array(
	'id'=>$i,
	'message'=>'I\'m test RabbitMQ from SUNNYSUN',
	'created_at'=>date('Y-m-d H:i:s')
	);
$data = json_encode($data);
$msg = new AMQPMessage($data,
                        array('delivery_mode' => 2) # make message persistent
                      );
	$channel->basic_publish($msg, '', 'task_queue');
}

echo "<pre>";
print_r($data);

$channel->close();
$connection->close();
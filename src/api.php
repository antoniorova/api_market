<?php

require "../vendor/autoload.php";
// require 'vendor/autoload.php';

use api\CallProcess;
use api\connection\MySQLConnection;
use api\utils\RequestDetail;

header("Content-Type: application/json");

$request = new RequestDetail($_SERVER);

// var_dump($request);
$a = new CallProcess(new MySQLConnection());

echo $a->doIt($request);
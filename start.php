<?php

require_once 'controller.php';

$coin = strtoupper($argv[1]);
$method = strtolower($argv[2]);

echo "\n COIN = ".$coin;
echo "\n METHOD = ".$method;
echo "\n";


controller::get_value($coin, $method);


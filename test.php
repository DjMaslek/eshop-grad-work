<?php 

require_once 'includes/rbdb.php';

/*$order = R::load('orders', 33);
$order->status = '1';
var_dump($order->status);
$cock = R::store($order);
var_dump($cock);*/

$order = R::load('orders', 35);
$order->status = '1';
var_dump($order->status);
$cock = R::store($order);
var_dump($cock);

//header("Location: /");
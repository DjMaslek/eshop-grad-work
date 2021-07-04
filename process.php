<?php

if(empty($_POST)){
    die;
}

require_once 'includes/rbdb.php';

$key = 'xnxgt2kFGPcx9mZK';
$ik_id = '60b20d953c991b13b66c1e0d';
$dataSet = $_POST;

unset($dataSet['ik_sign']);
ksort($dataSet, SORT_STRING);
array_push($dataSet, $key);
$signString = implode(':', $dataSet);
$sign = base64_encode(hash('sha256', $signString, true));

$order = R::load('orders', (int)$dataSet['ik_pm_no']);
if(!$order) die;

if($dataSet['id_co_id'] != $ik_id || $dataSet['ik_inv_st'] != 'success' ||
$dataSet['ik_am'] != $order->price || $sign != $_POST['ik_sign']){
    die;
}

$order->status = '1';
R::store($order);

<?php
include "smsGateway.php";
include 'includes/conf.php';
$smsGateway = new SmsGateway('ssadnan1005@gmail.com', 'salman14');

$deviceID = 23893;
$number = '+8801933714736';
$message = 'Hello World!';

// $options = [
// 'send_at' => strtotime('+1 minutes'), // Send the message in 10 minutes
// 'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
// ];

//Please note options is no required and can be left out
$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
?>
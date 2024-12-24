<?php
include_once '../config/database.php';
include_once './paymentConfig.php';
include_once '../objects/paymentsMaster.php';
$database = new Database();
$db = $database->getConnection();
$paymentsmaster = new PaymentsMaster($db);
$paymentConfig = new PaymentConfig();

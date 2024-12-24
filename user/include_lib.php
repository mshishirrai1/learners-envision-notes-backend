<?php
include_once '../config/database.php';
include_once '../objects/userMaster.php';
include_once '../objects/smsMaster.php';

$database = new Database();
$db = $database->getConnection();
$userMaster = new UserMaster($db);
$smsMaster = new SmsMaster($db);
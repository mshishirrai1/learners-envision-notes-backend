<?php
include_once '../config/database.php';
include_once '../objects/categoriesMaster.php';
include_once '../http_header/post_header.php';
$database = new Database();
$db = $database->getConnection();
$categoriesMaster = new CategoriesMaster($db);
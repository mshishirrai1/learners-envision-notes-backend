<?php
include_once '../config/database.php';
include_once '../objects/departmentMaster.php';
include_once '../http_header/post_header.php';
$database = new Database();
$db = $database->getConnection();
$deptMaster = new DepartmentMaster($db);
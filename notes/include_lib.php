<?php
include_once '../config/database.php';
include_once '../objects/notesMaster.php';
$database = new Database();
$db = $database->getConnection();
$notesmaster = new NotesMaster($db);


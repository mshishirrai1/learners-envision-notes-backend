<?php
include_once '../http_header/post_header.php';
include_once 'include_lib.php';
$notesmaster->id = $_GET['id'];
if($notesmaster->delete()){
    // set response code - 200 ok
    http_response_code(200);
    // tell the user
      echo json_encode(array("res" => 1));
}
// if unable to delete the product
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
     echo json_encode(array("res" => 0));
}
?>
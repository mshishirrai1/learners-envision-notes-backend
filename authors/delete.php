<?php
// required headers
include_once '../http_header/post_header.php';
include_once 'include_lib.php';

$deptMaster->id = isset($_GET['id']) ? $_GET['id'] : die(); 

// get product id
if(!empty($deptMaster->id)
){
$data = json_decode(file_get_contents("php://input"));
// set product id to be deleted
//$deptMaster->id = $data->id;
  
// delete the product
if($deptMaster->delete()){
  
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
}
else {
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("res" => 0));
}
?>
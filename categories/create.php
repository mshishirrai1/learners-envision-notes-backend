<?php
include_once '../http_header/post_header.php';
include_once 'include_lib.php';
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(!empty($data->name)
){
    
    // set product property values
    $deptMaster->name = $data->name; 
    $deptMaster->twitter = $data->twitter;
    $deptMaster->facebook = $data->facebook;
    $deptMaster->whatsapp=$data->whatsapp;
    $deptMaster->email=$data->email;
	$deptMaster->status=1;
    
    // create the product
    if($deptMaster->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("res" => 1));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("res" => 0));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("res" => 0));
}
?>
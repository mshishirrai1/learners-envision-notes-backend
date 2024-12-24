<?php
include_once '../http_header/post_header.php';
include_once 'include_lib.php';

  
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
if(!empty($data->name) &&
!empty($data->twitter) &&
!empty($data->facebook)  &&
!empty($data->whatsapp)  &&
!empty($data->email)  &&
!empty(strlen($data->status))
){

$deptMaster->id = $data->id;
  
$deptMaster->name = $data->name;
$deptMaster->twitter = $data->twitter;
$deptMaster->facebook = $data->facebook;
$deptMaster->whatsapp=$data->whatsapp;
$deptMaster->email=$data->email;
$deptMaster->status = $data->status;

  
// update the product
if($deptMaster->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("res" => 1));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("res" => 0));
}
}
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("res" => 0));
}
?>
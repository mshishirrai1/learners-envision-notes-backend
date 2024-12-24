<?php
include_once '../http_header/read_header.php';
include_once 'include_lib.php';
  
// set ID property of record to read
$deptMaster->id = isset($_GET['id']) ? $_GET['id'] : die();
// read the details of product to be edited
$deptMaster->readOne();
  
if($deptMaster->name!=null){
    // create array
    $product_arr = array(
        "id" =>  $deptMaster->id,
        "name" => $deptMaster->name,
        "twitter" => $deptMaster->twitter,
        "facebook" => $deptMaster->facebook,
        "whatsapp" => $deptMaster->whatsapp,
        "email" => $deptMaster->email,
        "status"=>$deptMaster->status
  
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($product_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "User does not exist."));
}
?>
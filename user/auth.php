<?php
include_once '../http_header/post_header.php';
include_once 'include_lib.php';
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(!empty($data->username) &&
!empty($data->password))
{
    //$userMaster->user_name = $data->username;
    //$userMaster->user_password = $data->password;

    
    // create the product
	$userMaster->authUser($data->username, $data->password);
  
      if($userMaster->user_name!=null){
    // create array
    $product_arr = array(
        "id" =>  $userMaster->id,
        "type" => $userMaster->type,
        "user_name" => $userMaster->user_name
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
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("res" => 0));
    }

?>
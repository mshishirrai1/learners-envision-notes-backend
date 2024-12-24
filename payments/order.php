<?php
include_once '../http_header/post_header.php';
require('../razorpay-php-master/Razorpay.php');
use Razorpay\Api\Api;
include_once 'include_lib.php';
  

    if (isset($_POST['amount']) ) {
		
		$api = new Api($paymentConfig->keyRz, $paymentConfig->secretRz);
		$dataOrder = $api->order->create(array('receipt' => 'LE0001', 'amount' => $_POST['amount'], 'currency' => 'INR'));
		
		
if($dataOrder['id']){
	  // set response code - 201 created
        http_response_code(201);
  
        // tell the user
         echo json_encode(array("res" => 1,"id" => $dataOrder['id']));
}else{
	  // Data not provided
        http_response_code(400);
        echo json_encode(array('message' => 'Image or other data not provided'));
}

  
      
   
    }else

{
        // Data not provided
        http_response_code(400);
        echo json_encode(array('message' => 'Image or other data not provided'));
    }









  

?>
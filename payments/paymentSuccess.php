<?php
include_once '../http_header/post_header.php';
include_once 'include_lib.php';
require('../razorpay-php-master/Razorpay.php');
use Razorpay\Api\Api;

$api = new Api($paymentConfig->keyRz, $paymentConfig->secretRz);

$returnData = $api->utility->verifyPaymentSignature(array('razorpay_order_id' => $_POST['order_id'], 'razorpay_payment_id' => $_POST['paymentid_rz'], 'razorpay_signature' => $_POST['signature']));


    if (isset($_POST['amount']) && isset($_POST['order_id']) ) {
		
		 $paymentsmaster->order_id = $_POST['order_id'];
		 $paymentsmaster->name = $_POST['name'];
		 $paymentsmaster->email = $_POST['email']; 
		 $paymentsmaster->phone = $_POST['phone'];
		 $paymentsmaster->amount = $_POST['amount'];
		 $paymentsmaster->notes_ids = $_POST['notes_ids'];
		 $paymentsmaster->status_rz = '';
		 $paymentsmaster->paymentid_rz = $_POST['paymentid_rz'];
		 $paymentsmaster->signature = $_POST['signature'];
		 $paymentsmaster->failed_reason = $_POST['failed_reason'];
		 $paymentsmaster->address = $_POST['address'];

        if ($paymentsmaster->create()) {
  
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
            // You can also store $otherData or perform any other operations here
        } else {
            // Failed to upload file
            http_response_code(400);
            echo json_encode(array('message' => 'Failed to create '));
        }
    
?>
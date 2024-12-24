<?php

include_once '../http_header/post_header.php';
include_once 'include_lib.php';
  
// get posted data
$data = json_decode(file_get_contents("php://input"));


    if ( isset($_POST['id'])) {
		
		$stmt = $notesmaster->checkUrlOnUpdate($_POST['id'],$_POST['url']);
		$num = $stmt->rowCount();
		if($num>0){
			http_response_code(501);
            echo json_encode(array('message' => 'URL  is already exists'));
			die;
		}
		
		 $notesmaster->category_id = $_POST['category_id'];
		 $notesmaster->title = $_POST['title'];
		 $notesmaster->url = $_POST['url']; 
		 $notesmaster->author_id = $_POST['author_id'];
		 $notesmaster->price = $_POST['price'];
		 $notesmaster->description = $_POST['desc'];
		 $notesmaster->id = $_POST['id'];

        // Handle the file upload
        $uploadDirPdf = 'uploads/pdf/';
		$uploadDirSlides = 'uploads/slides/';
		 $timestamp = time();
		 $pdf = isset($_FILES['pdfFile']) ? $_FILES['pdfFile']:'';
		 $uploadImageNames = '';
		$uploadedImages = isset($_FILES['imageFiles'])? $_FILES['imageFiles']:'';
		
		if(isset($_FILES['imageFiles'])){
			for ($i = 0; $i < count($uploadedImages['name']); $i++) {
            // Get file details
            $fileName = $uploadedImages['name'][$i];
			$uploadImage = $uploadDirSlides . $timestamp + $i . '_' . basename( $fileName);
			$uploadImageNames .= $uploadImage . ',';
			move_uploaded_file($uploadedImages['tmp_name'][$i], $uploadImage);
		}
		$notesmaster->slides = substr($uploadImageNames, 0, -1);
		}
		
		if(isset($_FILES['pdfFile'])){
			 // $uploadFile = $uploadDir . basename($image['name']);
		  $uploadFile = $uploadDirPdf . $timestamp . '_' . basename($pdf['name']);
		  $notesmaster->pdf = $uploadFile;

         move_uploaded_file($pdf['tmp_name'], $uploadFile);
		}
		
            // File uploaded successfully
				$insertedID = $notesmaster->updateData();
			    if($insertedID){
  
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
       
    }else

{
        // Data not provided
        http_response_code(400);
        echo json_encode(array('message' => 'Image or other data not provided'));
    }












  

?>
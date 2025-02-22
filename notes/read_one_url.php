<?php
include_once '../http_header/get_header.php';
include_once 'include_lib.php';

// set ID property of record to read
$notesmaster->url = isset($_GET['url']) ? $_GET['url'] : die();
$stmt = $notesmaster->readWithUrl();
 $num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // ategory_master array
    $notesMaster_arr=array();
    $notesMaster_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $notesMaster_item=array(
            "id" => $id,
            "category_id" => $category_id,
            "author_id" => $author_id,
            "url" => $url,
            "title"=>$title,
            "price"=>$price,
            "slides"=>$slides,
			"desc"=>$description, 
        );
  
        array_push($notesMaster_arr["records"], $notesMaster_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show ategory_master data in json format
    echo json_encode($notesMaster_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no ategory_master found
    echo json_encode(
        array("message" => "No records found.")
    );
}
?>
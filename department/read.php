<?php
include_once '../http_header/read_header.php';
include_once 'include_lib.php';

$stmt = $deptMaster->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // ategory_master array
    $deptMaster_arr=array();
    $deptMaster_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $arrayMaster_item=array(
            "id" => $id,
            "name" => $name,
            "twitter" => $twitter,
            "facebook"=>$facebook,
            "whatsapp"=>$whatsapp,
            "email"=>$email,
            "status"=>$status
        );
  
        array_push($deptMaster_arr["records"], $arrayMaster_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show ategory_master data in json format
    echo json_encode($deptMaster_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no ategory_master found
    echo json_encode(
        array("message" => "No record found.")
    );
}
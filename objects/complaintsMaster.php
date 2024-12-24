<?php
class ComplaintsMaster{
	// database connection and table name
    private $conn;
    private $table_name = "complaints";
  
    // object properties
    public $id;
    public $category_id;
    public $img_path;
	public $location1;
	public $description1;
	public $contact_no;
	public $location2;
    public $description2;
    public $status;
	public $limit;
	public $lat;
	public $long;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
		// read products
	function read(){
		// select all query
		 $query = "SELECT
		 complaints.id, complaints.category_id, complaints.img_path, complaints.location1, complaints.description1, 
		complaints.contact_no, complaints.title, complaints.resolution, complaints.status, category.name
		FROM
		" . $this->table_name . ", category WHERE complaints.category_id = category.id ";
		
		// if($this->limit){
			// $query .= "limit ".(($this->limit*10)-10)."," .($this->limit*10);
		// }else{
			// $query .= "limit 0,10";
		// }
		
		$query .= "limit ".(($this->limit*10)-10)."," .($this->limit*10);
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                category_id=:category_id,
				img_path=:img_path,
				location1=:location1,
                description1=:description1,
                contact_no=:contact_no,
				lat=:lat,
				longt=:long";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize

  
    // bind values
	$stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":img_path", $this->img_path);
	$stmt->bindParam(":location1", $this->location1);
    $stmt->bindParam(":description1", $this->description1);
    $stmt->bindParam(":contact_no", $this->contact_no);
	$stmt->bindParam(":lat", $this->lat);
	$stmt->bindParam(":long", $this->long);
	
  
    // execute query
    if($stmt->execute()){
		$lastInsertId = $this->conn->lastInsertId();
        return $lastInsertId;
    }
    return false;  
}
function readOne(){
  $query = "SELECT
		complaints.id, complaints.category_id, complaints.img_path, complaints.location1, complaints.description1, 
		complaints.contact_no, complaints.title, complaints.resolved_img, complaints.resolution, complaints.status,
		complaints.lat,complaints.longt,category.name
		FROM
		" . $this->table_name . ", category WHERE complaints.category_id = category.id AND 
		complaints.id = :id
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(":id", $this->id);

    // execute query
    $stmt->execute();
	return $stmt;
    
}
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                category_id=:category_id,";
	if($this->img_path){
		$query .= "img_path=:img_path,";
	}
			$query .= "location1=:location1,
				title=:title,
                description1=:description1
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
	$stmt->bindParam(":category_id", $this->category_id);
	if($this->img_path){
		$stmt->bindParam(":img_path", $this->img_path);
	}
	$stmt->bindParam(":title", $this->title);
	$stmt->bindParam(":location1", $this->location1);
    $stmt->bindParam(":description1", $this->description1);
	$stmt->bindParam(":id", $this->id);
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

function resolve(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                resolution=:resolution,
				resolved_img=:img_path,
				status = 3
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
	$stmt->bindParam(":resolution", $this->resolution);
	$stmt->bindParam(":img_path", $this->img_path);
	$stmt->bindParam(":id", $this->id);
	
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
function update2(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
				location2=:location2,
                description2=:description2
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
	$stmt->bindParam(":location2", $this->location2);
    $stmt->bindParam(":description2", $this->description2);
	$stmt->bindParam(":id", $this->id);
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

function updateStatus($id, $val){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                status=".$val;
			$query .= " WHERE
                id = ".$id;
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}


function dashboard(){
  $query = "SELECT COUNT(id) AS total_count, 
  SUM(CASE WHEN status IN (2,4) THEN 1 ELSE 0 END) AS progress, 
  SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) AS resolved, 
  SUM(CASE WHEN lodged_date >= NOW() - INTERVAL 14 DAY THEN 1 ELSE 0 END) AS notResolved 
  FROM " . $this->table_name;
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  

    // execute query
    $stmt->execute();
	return $stmt;
    
}

function getCount(){
  $query = "SELECT COUNT(*) as count FROM ".$this->table_name;
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated

    // execute query
    $stmt->execute();
	return $stmt;
    
}

function getContactsOfLinkedComplaints($id){
 $query = "SELECT c.contact_no, c.id
			FROM complaints AS c
			JOIN link AS l ON c.id = l.complaint_id WHERE l.linked_to =" . $id;
		
		
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
}

function readLinkedComplaints($id){
	 $query = "SELECT c.id, c.location1,c.description1
		FROM complaints AS c
		JOIN link AS l ON c.id = l.complaint_id WHERE l.linked_to = " . $id;
		
		
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
}

function getActionsOnComplaint($id){
 $query = "SELECT d.name, a.source
			FROM actions AS a
			JOIN department AS d ON a.department_id = d.id WHERE a.complaints_id =" . $id;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
}

function delete(){
  
    // delete query
        $query = "UPDATE " . $this->table_name . " SET  status=0 WHERE id = ?";
        //$query = "DELETE FROM " . $this->table_name . " WHERE  id = ?";
    // prepare query
    $stmt = $this->conn->prepare($query);
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
}
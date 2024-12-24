<?php
class DepartmentMaster{
	// database connection and table name
    private $conn;
    private $table_name = "department";
  
    // object properties
    public $id;
    public $name;
    public $twitter;
    public $facebook;
    public $whatsapp;
    public $email;
    public $status;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
		// read products
	function read(){
		// select all query
		$query = "SELECT
		*
		FROM
		" . $this->table_name . " c WHERE status=1";

		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// execute query
		$stmt->execute();
		return $stmt;
	}
	function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name,
                twitter=:twitter,
                facebook=:facebook,
                whatsapp=:whatsapp,
                email=:email,
                status=:status
                ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->twitter=htmlspecialchars(strip_tags($this->twitter));
    $this->facebook=htmlspecialchars(strip_tags($this->facebook));
    $this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":twitter", $this->twitter);
    $stmt->bindParam(":facebook", $this->facebook);
    $stmt->bindParam(":whatsapp", $this->whatsapp);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":status", $this->status);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
    return false;  
}
function readOne(){
  
    // query to read single record
   $query = "SELECT
		id,name,twitter,facebook,whatsapp,email,status FROM
                " . $this->table_name . "
            WHERE
                id = :id AND status=1
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind id of product to be updated
    $stmt->bindParam(":id", $this->id);
    // execute query
    $stmt->execute();
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // set values to object properties
	if(!empty($row['name'])){
		$this->twitter = $row['twitter'];
		$this->facebook = $row['facebook'];
        $this->name = $row['name'];
        $this->status = $row['status'];
        $this->whatsapp = $row['whatsapp'];
        $this->email = $row['email'];
	}
    
}
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name=:name,
                twitter=:twitter,
                facebook=:facebook,
                whatsapp=:whatsapp,
                email=:email,
                status=:status

            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
   
  
    // bind new values
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->twitter=htmlspecialchars(strip_tags($this->twitter));
    $this->facebook=htmlspecialchars(strip_tags($this->facebook));
    $this->whatsapp=htmlspecialchars(strip_tags($this->whatsapp));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":twitter", $this->twitter);
    $stmt->bindParam(":facebook", $this->facebook);
    $stmt->bindParam(":whatsapp", $this->whatsapp);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
function delete(){
  
    // delete query
        $query = "UPDATE " . $this->table_name . " SET  status=0 WHERE id = ?";
  
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
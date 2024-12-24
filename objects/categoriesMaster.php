<?php
class CategoriesMaster{
	// database connection and table name
    private $conn;
    private $table_name = "categories";
  
    // object properties
    public $id;
    public $name;

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
                status=:status
                ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(":name", $this->name);
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
		* FROM
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
        $this->name = $row['name'];
        $this->status = $row['status'];
	}
    
}
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name=:name

            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
   
  
    // bind new values
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));

    // bind values
    $stmt->bindParam(":name", $this->name);
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
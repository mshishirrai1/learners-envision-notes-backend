<?php
class UserMaster{
	// database connection and table name
    private $conn;
    private $table_name = "user";
  
    // object properties
    public $id;
    public $type;
    public $user_name;
    public $user_password;
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
                type=:type,
                user_name=:user_name,
                user_password=:user_password,
                status=:status
                ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->type=htmlspecialchars(strip_tags($this->type));
    $this->user_name=htmlspecialchars(strip_tags($this->user_name));
    $this->user_password=htmlspecialchars(strip_tags($this->user_password));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":user_name", $this->user_name);
    $stmt->bindParam(":user_password", $this->user_password);
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
		id,type,user_name,user_password,status FROM
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
	if(!empty($row['user_name'])){
		$this->user_name = $row['user_name'];
        $this->type = $row['type'];
        $this->status = $row['status'];
        $this->user_password = $row['user_password'];
	}
    
}

function authUser($user_name, $user_password ){
  
    // query to read single record
   $query = "SELECT
		id,type,user_name,status FROM
                " . $this->table_name . "
            WHERE
                user_name = '" . $user_name . "' AND user_password = '" . $user_password . "' AND status=1
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // execute query
    $stmt->execute();
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // set values to object properties
	if(!empty($row['user_name'])){
		$this->user_name = $row['user_name'];
        $this->type = $row['type'];
        $this->id = $row['id'];
	}
    
}

function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
            type=:type,
            user_name=:user_name,
            user_password=:user_password,
            status=:status

            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
   
  
    // bind new values
    $this->id=htmlspecialchars(strip_tags($this->id));
     $this->type=htmlspecialchars(strip_tags($this->type));
    $this->user_name=htmlspecialchars(strip_tags($this->user_name));
    $this->user_password=htmlspecialchars(strip_tags($this->user_password));
    $this->status=htmlspecialchars(strip_tags($this->status));

    // bind values
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":user_name", $this->user_name);
    $stmt->bindParam(":user_password", $this->user_password);
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
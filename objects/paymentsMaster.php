<?php
class PaymentsMaster{
	// database connection and table name
    private $conn;
    private $table_name = "payments";
  
    // object properties
    public $id;
    public $order_id;
    public $name;
	public $email;
	public $phone;
	public $amount;
	public $notes_ids;
    public $status_rz;
    public $paymentid_rz;
	public $signature;
	public $failed_reason;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	
	function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                order_id=:order_id,
				name=:name,
				email=:email,
                phone=:phone,
				address=:address,
                amount=:amount,
				notes_ids=:notes_ids,
				status_rz=:status_rz,
				paymentid_rz=:paymentid_rz,
				signature=:signature,
				failed_reason=:failed_reason";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize

  
    // bind values
	$stmt->bindParam(":order_id", $this->order_id);
    $stmt->bindParam(":name", $this->name);
	$stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":phone", $this->phone);
	$stmt->bindParam(":address", $this->address);
    $stmt->bindParam(":amount", $this->amount);
	$stmt->bindParam(":notes_ids", $this->notes_ids);
	$stmt->bindParam(":status_rz", $this->status_rz);
	$stmt->bindParam(":paymentid_rz", $this->paymentid_rz);
	$stmt->bindParam(":signature", $this->signature);
	$stmt->bindParam(":failed_reason", $this->failed_reason);
	
  
    // execute query
    if($stmt->execute()){
		$lastInsertId = $this->conn->lastInsertId();
        return $lastInsertId;
    }
    return false;  
}
}
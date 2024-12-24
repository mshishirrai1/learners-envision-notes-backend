<?php
class NotesMaster{
	// database connection and table name
    private $conn;
    private $table_name = "notes";
  
    // object properties
    public $id;
    public $category_id;
    public $title;
	public $url;
	public $author_id;
	public $price;
	public $slides;
    public $pdf;
    public $description;
	public $author_name;
	public $category_name;
	public $stat;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
		// read products
	function read(){
		// select all query
		 $query = "SELECT 
					notes.id, 
					notes.category_id, 
					notes.title, 
					notes.url, 
					notes.author_id, 
					notes.price, 
					notes.slides, 
					notes.pdf, 
					notes.description, 
					categories.name AS category_name, 
					authors.name AS author_name 
				FROM 
					" . $this->table_name . "
				INNER JOIN categories ON notes.category_id = categories.id
				INNER JOIN authors ON notes.author_id = authors.id
				WHERE 
    notes.status = 1";

		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	
	function readDownloadableNotes($ids){
		// select all query
		 $query = "SELECT 
					notes.id, 
					notes.category_id, 
					notes.title, 
					notes.url, 
					notes.author_id, 
					notes.price, 
					notes.slides, 
					notes.pdf, 
					notes.description, 
					categories.name AS category_name, 
					authors.name AS author_name 
				FROM 
					" . $this->table_name . "
				INNER JOIN categories ON notes.category_id = categories.id
				INNER JOIN authors ON notes.author_id = authors.id
				WHERE 
    notes.id IN (".$ids.")";

		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	
	function checkUrl($url){
		// select all query
		 $query = "SELECT id
		FROM
		" . $this->table_name . " WHERE url = '" .$url."'";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	
	function checkUrlOnUpdate($id,$url){
		// select all query
		 $query = "SELECT id
		FROM
		" . $this->table_name . " WHERE url = '" .$url."' AND id !=".$id;
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// $stmt->bindParam(":limit", $this->limit);
		// execute query
		$stmt->execute();
		return $stmt;
	}
	
	function readWithUrl(){
		// select all query
		 $query = "SELECT 
					notes.id, 
					notes.category_id, 
					notes.title, 
					notes.url, 
					notes.author_id, 
					notes.price, 
					notes.slides, 
					notes.pdf, 
					notes.description, 
					categories.name AS category_name, 
					authors.name AS author_name 
				FROM 
					" . $this->table_name . "
				INNER JOIN categories ON notes.category_id = categories.id
				INNER JOIN authors ON notes.author_id = authors.id
				WHERE 
    notes.status = 1 AND notes.url='".$this->url."'";

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
                title=:title,
				url=:url,
				author_id=:author_id,
                category_id=:category_id,
                price=:price,
				slides=:slides,
				pdf=:pdf,
				description=:description";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize

  
    // bind values
	$stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":url", $this->url);
	$stmt->bindParam(":author_id", $this->author_id);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":price", $this->price);
	$stmt->bindParam(":slides", $this->slides);
	$stmt->bindParam(":pdf", $this->pdf);
	$stmt->bindParam(":description", $this->description);
	
  
    // execute query
    if($stmt->execute()){
		$lastInsertId = $this->conn->lastInsertId();
        return $lastInsertId;
    }
    return false;  
}
function readOne(){
	$query = "SELECT 
					notes.id, 
					notes.category_id, 
					notes.title, 
					notes.url, 
					notes.author_id, 
					notes.price, 
					notes.slides, 
					notes.pdf, 
					notes.description
				FROM 
					" . $this->table_name . "
				WHERE 
    notes.status = 1 AND notes.id = :id  LIMIT 0,1";

		// prepare query statement
		$stmt = $this->conn->prepare($query);
    // bind id of product to be updated
    $stmt->bindParam(":id", $this->id);

    // execute query
    $stmt->execute();
	return $stmt;
    
}
function updateData(){
    // query to insert record
    $query = "UPDATE
                " . $this->table_name . "
            SET
                title=:title,
				url=:url,
				author_id=:author_id,
                category_id=:category_id,
                price=:price, 
				description=:description ";
;				if($this->slides){
					$query .= ", slides=:slides ";
				}
				if($this->pdf){
					$query .= ", pdf=:pdf ";
				}
				$query .= " WHERE id = :id";
  
    // prepare query
    $stmt = $this->conn->prepare($query);

    // bind values
	$stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":url", $this->url);
	$stmt->bindParam(":author_id", $this->author_id);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":price", $this->price);
	$stmt->bindParam(":description", $this->description);
	$stmt->bindParam(":id", $this->id);
	if($this->slides){
		$stmt->bindParam(":slides", $this->slides);
	}
	if($this->pdf){
		$stmt->bindParam(":pdf", $this->pdf);
	}
	
  
    // execute query
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
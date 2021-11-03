<?php
class User
{
	// Database connection and table name
	private $con;
	private $table_name = "signup";

	// object properties of table name
	public $name;
	public $email;
	public $mobile;
	public $password;

	public function __construct($db)
	{
		$this->con = $db;
	}

	function signup(){
		if($this->isAlreadyExist()){
			return false;
		}


		// INSERT INTO signup SET name='user1', email='user1@mail.com', mobile='1234567890',password='user1@123'
		

		// insert into table
		$query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, mobile=:mobile, password=:password";

		// prepare query
		$stmt = $this->con->prepare($query);

		// bind values
		$stmt->bindParam(":name",$this->name);
		$stmt->bindParam(":email",$this->email);
		$stmt->bindParam(":mobile",$this->mobile);
		$stmt->bindParam(":password",$this->password);

		if($stmt->execute()){
			$this->email = $this->con->lastInsertId(); 
			return true;
		}

	}

	function isAlreadyExist(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE email='" .$this->email."'";
		// $query = "SELECT * FROM $this->table_name WHERE email=$this->email";
		// prepare query statement
		$stmt = $this->con->prepare($query);
		// execute query
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
}
?>
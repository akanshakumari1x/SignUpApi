<?php
class Database
{
	private $host = "localhost";
	private $db_name = "signup_api";
	private $username = "root";
	private $pass = "";
	public $con;

	public function getConnection(){
		$this->con = null;

		try {
			$this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->pass);
			$this->con->exec("set names utf8");
			
		} catch (PDOException $e) {
			echo "Connection error: " . $e->getMessage();
		}

		return $this->con;
	}
}
?>
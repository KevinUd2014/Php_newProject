<?php

class QuizDAL{

	private $conn;
	public function createSqlConnection(){
		
		// Create connection
		$this->conn = mysqli_connect(Settings::$SQLservername, Settings::$SQLusername, Settings::$SQLpassword, Settings::$SQLDatabase);//hämtar från settings!
		if (!$this->conn) {
		    die("Could not connect: " . mysql_error());
		}
		//echo "Connected successfully";
		return $this->conn;
		
	}
	public function closeSqlConnection(){
		mysqli_close($this->conn);
	}
	
}
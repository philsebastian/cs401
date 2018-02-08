<?php
class Dao {

  private $host = "localhost";
  private $db = "";
  private $user = "";
  private $password = "";

  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
  }
  
  public function getTeacher() {
	  $teacherId = $_GET["id"];	
		// TODO -- need to check valid input also, if nothing -> return sales
	  
	  $conn = $this->getConnection();
	  $searchQuery = "SELECT * FROM registeredTeachers WHERE active = 1 AND ID = " . $teacherId;
	  $results = $conn->query($searchQuery);	  
	  echo "<pre>" . $results . "</pre>";
  }
}
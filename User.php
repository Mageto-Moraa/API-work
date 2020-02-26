<?php
include "Crud.php";
include "Authenticator.php";
include_once 'DBConnector.php';
class User implements Crud,Authenticator
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
	
	private $username;
	private $password;

    function __construct($first_name,$last_name,$city_name,$username,$password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
		$this->username = $username;
		$this->password = $password;
    }
	public static function create() {
		$instance = new self();
		return $instance;
	}
	public function setUsername($username){
		$this->username= $username;
	}
		
	public function getUsername(){
        return $this->username;
    }	
	public function setPassword($password){
		$this->password= $password;
	}
		
		public function getPassword(){
        return $this->password;
    }	
		
		

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function save(){
        $conn = new DBConnector;
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $query = "INSERT INTO user(first_name,last_name,user_city)VALUES('$fn','$ln','$city')";
        $res = mysqli_query($conn->__construct(), $query) or die("Error: ". mysqli_errno($conn->__construct()));
        return $res;

    }

    public function readAll(){
        
        $conn = new DBConnector;
        $query = "SELECT * FROM user";
        $res = mysqli_query($conn->__construct(), $query) or die(mysqli_errno($conn->__construct()));
        return $res;
    }

    public function readUnique(){

        return null;
    }

    public function search(){

        return null;
    }

    public function update(){

        return null;
    }

    public function removeOne(){

        return null;
    }

    public function removeAll(){
        return null;
    }
	public function validateForm(){
		//if values are not empty it returns true
		
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;

        if($fn == null || $ln == "" || $city == "") {
            return false;
        }
        return true;
    }
    public function createFormErrorSessions()
    {
        session_start();
        $_SESSION['form_errors'] = "All the fields are required";
		
		
		
}





}
?>
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
		
	public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function isPasswordCorrect(){
        $con = new DBConnector;
        $found = false;
        $res = mysql_query("SELECT * FROM user")or die('Error:'. mysql_error());

        while($row = mysql_fetch_array($res)){
            if(password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username']){
                $found = true;
            }
            $con->closeDatabase();
            return $found;
        }
    
    }
    public function login(){
        if ($this->isPasswordCorrect()){
            header("Location:private_page.php");
        }
    }
	 public function createUserSession(){
        session_start();
        $_SESSION['username'] = $this->getUsername();
    }
    public function logout(){
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("Location:lab1.php");
    }
	
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function save(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
		$uname = $this->username;
		$this->hashPassword();
		$pass = $this->password;
        $query = 
        $res = mysql_query("INSERT INTO user(first_name,last_name,user_city,username, password)
		VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error: ". mysql_error());
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

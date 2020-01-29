<?php
include "crud.php";
class User implements crud
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

    function __construct($first_name,$last_name,$city_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
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

}

?>
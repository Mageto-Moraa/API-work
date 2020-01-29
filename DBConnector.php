<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'btc3205');

class DBConnector
{
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $this->conn;
    }

    public function closeDatabase()
    {
        mysqli_close($this->conn);
    }
}


?>
© 2020 GitHub, 
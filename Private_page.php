<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:Login.php")
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	 <script type= "text/javascript" src="Validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
    <p><h1>This is a private page</h1></p>
    <p><h2>We want to protect it</h2></p>
    <p><a href="Logout.php">logout</a></p>
</body>
</html>

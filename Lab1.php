<?php
include_once "DBConnector.php";
include_once "user.php";


if (isset($_POST['btn-save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];

    $user = new User($first_name, $last_name, $city);
	if(!$user->validateForm()){
        $user->createFormErrorSessions();
        header ("Refresh:0");
		die();
    }
    $res = $user->save();

    if ($res) {
        echo "Save operation was successful";
    } else {
        echo "An error occured";
    }
    $res = $user->save();

    if ($res) {
        echo "Save operation was successful";
    } else {
        echo "An error occured";
    }
	$con->closeDatabase();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 1</title>
	<script type= "text/javascript" src="Validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>

<body>
    <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
        <table align="center">
		<tr>
		<td>
			<div id="form-errors">
				<?php	
					session_start();
					if(!empty($_SESSION['form_errors'])){
							echo " " . $_SESSION['form_errors'];
							unset($_SESSION['form_errors']);
					}
				?>
			</div>
		</td>
		</tr>
            <tr>
                <td>
                    <h1>First Name</h1>
                </td>
                <td><input type="text" name="first_name" placeholder="First Name"></td>
            </tr>
            <tr>
                <td>
                    <h1>Last Name</h1>
                </td>
                <td><input type="text" name="last_name" placeholder="Last Name"></td>
            </tr>
            <tr>
                <td>
                    <h1>City Name</h1>
                </td>
                <td><input type="text" name="city_name" placeholder="City Name"></td>
            </tr>
            <tr>
                <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <th>First Name</th>
            <th>last Name</th>
            <th>City</th>
        </tr>
        <?php
        
        
        $res2 = User::readAll();
        if(mysqli_num_rows ($res2) > 0) {
            while($row = mysqli_fetch_assoc($res2)){
                $fn = $row['first_name'];
                $ln = $row['last_name'];
                $cn = $row['user_city'];

                $entries = "<tr><td>$fn</td><td>$ln</td><td>$cn</td></tr>";
                echo $entries;
            }
            
        }
    
    ?>
        
    
    </table>
</body>

</html>
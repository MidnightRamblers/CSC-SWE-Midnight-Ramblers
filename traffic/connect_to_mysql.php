<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php   
$db_host = "localhost"; 
$db_username = "root";   
$db_pass = "";  
$db_name = "traffic_database"; 
 
$con=mysqli_connect("$db_host","$db_username","$db_pass","$db_name");
if(!$con){
	echo"unsuccessful";
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"."<br>";

$sql = "SELECT email, password, username FROM users";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "email: " . $row["email"]. " - password: " . $row["password"]. " "."myuser" . $row["username"]. "<br>";
    }
} else {
    echo "0 results";
}

//mysqli_close($con);
?>
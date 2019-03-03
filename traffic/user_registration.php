
<?php
include "connect_to_mysql.php";
     if (isset($_POST['button'])){
    $name=$_POST['name'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword =$_POST['cpassword'];	

	if($password != $cpassword){
		echo 'Your passwords do not match., <a href="user_registration.php">Refill here</a>';
		exit();
	}

//////////////////////////////////////////////////////////////////
$data = "INSERT INTO users (email,password,confirm_password,username,name)
VALUES ('$email', '$password', '$cpassword','$username','$name')";
if (mysqli_query($con, $data)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $data . "<br>" . mysqli_error($con);
}

}
	//header("location:user_login.php?success"); 
    //exit();
mysqli_close($con);
 header("location: index.php?userloginsuccess");
?>


<?php
/*session_start();
if (!isset($_SESSION["user"])) {
    header("location:user_login.php"); 
    exit();
    */
}
//$user = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["username"]); 
//$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 
 
include "storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM customer WHERE id='$userID' AND login='$user' AND password='$password' LIMIT 1"); 

$existCount = mysql_num_rows($sql); 
if ($existCount == 0) { 
   echo "Your login session data is not on record in the database.";
     exit();
}
?>
<?php 
if (isset($_POST['name'])) {
  
  $pid = mysql_real_escape_string($_POST['thisID']);
    $name = mysql_real_escape_string($_POST['name']);
  $email = mysql_real_escape_string($_POST['email']);
  $address = mysql_real_escape_string($_POST['address']);
  $city = mysql_real_escape_string($_POST['city']);
  $state = mysql_real_escape_string($_POST['state']);
  $pin = mysql_real_escape_string($_POST['pin']);

  $sql = mysql_query("UPDATE customer SET name='$name',email='$email',address='$address',city='$city', state='$state',pin='$pin' WHERE id='$pid'");
  header("location: index.php"); 
    exit();
}
?>
<?php 

if (isset($_SESSION["id"])) {
  $targetID = $_SESSION["id"];
    $sql = mysql_query("SELECT * FROM customer WHERE id='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); 
    if ($productCount > 0) {
      while($row = mysql_fetch_array($sql)){ 
             
      $name = $row['name'];
      $mobile = $row['mobile'];
      $email = $row['email'];
      $address = $row['address'];
      $city = $row['city'];
      $state = $row['state'];
      $pin = $row['pin'];
        }
    } else {
      echo "Sorry that doesnt exist.";
    exit();
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory List</title>
<script type="text/javascript" language="javascript"> 
<!--
function validateMyForm ( ) { 
    var isValid = true;
    if ( document.userForm.name.value == "" ) { 
	    alert ( "Please type Your Name" ); 
	    isValid = false;
    } else if ( document.userForm.mobile.value == "" ) { 
            alert ( "Please enter your Mobile Number" ); 
            isValid = false;
    } else if ( document.userForm.email.value == "" ) { 
            alert ( "Please provide your Email" ); 
            isValid = false;
    } else if ( document.userForm.address.value == "" ) { 
            alert ( "Please provide your address" ); 
            isValid = false;
    } else if ( document.userForm.city.value == "" ) { 
            alert ( "Please provide your city" ); 
            isValid = false;
    } else if ( document.userForm.state.value == "" ) { 
            alert ( "Please provide your state" ); 
            isValid = false;
    } else if ( document.userForm.pin.value == "" ) { 
            alert ( "Please provide your pin" ); 
            isValid = false;
    }
    return isValid;
}
//-->
</script>
</head>

<body>
<div align="center" id="mainWrapper"
  <div id="pageContent"><br />
<div align="left" style="margin-left:24px;">
    </div>
    <a name="UserRegistration" id="UserRegistration"></a>
    <h3>
    &darr; Edit Your profile &darr;
    </h3>
    <form action="" enctype="multipart/form-data" name="userForm" id="userForm" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Full Name</td>
        <td width="80%"><label>
          <input name="name" type="text" id="name" size="40" value="" />
        </label></td>
      </tr>   
      <tr>
        <td align="right">Mobile</td>
        <td><label>
        </label></td>
      </tr>
      <tr>
        <td align="right">Email Id</td>
        <td><label>
          <input name="email" type="text" id="email" size="50" value=""/>
        </label></td>
      </tr>
      <tr>
        <td align="right">Address</td>
        <td><label>
          <textarea name="address" id="address" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">City</td>
        <td width="80%"><label>
          <input name="city" type="text" id="city" size="20" value="" />
        </label></td>
      </tr>
      <tr>
        <td width="20%" align="right">State</td>
        <td width="80%"><label>
          <input name="state" type="text" id="state" size="20" value="" />
        </label></td>
      </tr>
      <tr>
        <td align="right">zipcode</td>
        <td><label>
          <input name="pin" type="text" id="pin" size="6" value="" />
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="" />
          <input type="submit" name="button" id="button" value="Change Now"  onclick="javascript:return validateMyForm();"/>
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
</body>
</html>
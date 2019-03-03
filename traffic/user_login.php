<!DOCTYPE html>
<head>
    <meta charset="utf-8">
<title>Group 4</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/traffic.css">
</head>
<body>
<h1> Traffic monitoring service</h1>
    <div align="center" id="mainWrapper">
  <?php 
if (isset($_SESSION["username"])) {
    header("location:index.php"); 
    exit();
}
?>
<?php 
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
     include "connect_to_mysql.php"; 
    $sql = mysqli_query($con,"SELECT * FROM users WHERE username='$user' AND password='$password' LIMIT 1"); 
      $row = mysqli_fetch_assoc($sql);
      if($row){
     //$_SESSION["username"] = $user;
     //$_SESSION["password"] = $password;
     header("location: index.php?userloginsuccess");
         exit();
    } else {
    echo 'That information is incorrect, try again <a href="user_login.php">Click Here</a>.<br>';
     echo 'Or Sign Up,  <a href="registration.html">Click Here</a>';
    exit();
  }
}
?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Log In</h2>
      <form id="form2" name="form2" method="post" action="user_login.php">
        User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
         <input type="submit" name="button" id="button" value="Log In" />
      </form>
      
      <form id="form2" name="form3" method="post" action="registration.html">
       <br />
       <br />
            <h3>Register to see exciting stuff we have to offer<h3>
         <input type="submit" name="button" id="button" value="Sign Up" />
      </form>

      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>


        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Copyright &copy; 2018 <a href="user_login.php">Traffic monitoring service</a> | Design: <a href="user_login.php">Group 5</a></span>
                        <p> Movement remagined</p>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->


</body>
</html>


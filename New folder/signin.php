<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: home.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $username = ($_POST['username']);
        $password = ($_POST['password']);



if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;


    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to home page
                            header("location: home.php");

                        }else {
                        	echo "Incorrect password";
                        }
                    }

                }

    }
}


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PROPERTY MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" href="s1.css">
	<style>.my{
		background-color: #2eca6a;
	}
	html{
		background-color:#2eca6a
	}
	</style>
</head>
<body>
<div class="wrapper fadeInDown my">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover"><a href="signup.php">Sign Up </a></h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="user.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="" method="post">
      <input type="email" id="email" class="fadeIn second" name="username" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
      <button type="submit" class="fadeIn fourth" value="Log in">Log in</button>
    </form>


    <div id="formFooter">
       <p>Don't have an account? <a class="underlineHover" href="signup.php">Register here</a>.</p>

    </div>

  </div>
</div>
</body>
</html>

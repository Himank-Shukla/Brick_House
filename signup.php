<?php
require_once "config.php";

$username = $password =$name =$phone = "";
$username_err = $password_err =  "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken";
                    echo"This username is already taken";

                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);



    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);





// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) )
{
    $sql = "INSERT INTO users (username, password, name, phone) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_name, $param_phone);

        // Set these parameters
        $param_username = $username;
        $param_password = $password;
        $param_name = $name;
        $param_phone =$phone;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: signin.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
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
.wrapper {
  
  background-color:#2eca6a;
}
	</style>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="inactive underlineHover"><a href="signin.php">Sign In </a></h2>
    <h2 class="active"> Sign Up </h2>

    <!-- Icon -->


    <!-- Login Form -->
    <form action="" method="post">
	  <input type="text" id="name" class="fadeIn second" name="name" placeholder="Name" required>
      <input type="email" id="email" class="fadeIn second" name="username" placeholder="Email" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"  required >
      <input type="text" id="Phone" class="fadeIn second" name="phone" placeholder="Phone" required>


      <button type="submit" class="fadeIn fourth" value="Register">Register</button>
    </form>

    <div id="formFooter">
       <p>Already have an account? <a class="underlineHover" href="signin.php">Login here</a>.</p>

    </div>


  </div>
</div>
</body>
</html>

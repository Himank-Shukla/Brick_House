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
<?php
  include 'config.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
	{
		header("location: signin.php");
	}
	$id=$_SESSION['id'];
	$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	$row= mysqli_fetch_array($query);
  ?>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> User Profile</h2>

    <!-- Icon -->
	<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Name" value="<?php echo $row['name']; ?>" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="username" style="width:20em;" placeholder="Enter your Email" required value="<?php echo $row['username']; ?>" />
          </div>
     
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" style="width:20em;" required placeholder="Enter your Phone number" value="<?php echo $row['phone']; ?>"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value='Update Profile' style="width:20em; margin:0; "><br><br>
            
           </center>
          </div>
        </form>
      </div>

    
    <div id="formFooter">
       <p><a class="underlineHover" href="home.php">Cancel</a>.</p>

    </div>


  </div>
</div>
</body>
</html>
<?php
      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
      $query = "UPDATE users SET name = '$name',
                      username = '$username', phone = '$phone'
                      WHERE id = '$id'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "home.php";
        </script>
        <?php
             }               
?>
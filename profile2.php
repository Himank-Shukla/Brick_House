
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link  href="s1.css" rel="stylesheet">

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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>



    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $row['name']; ?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>
<center>
  <h1>User Profile</h1>
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
            window.location = "welcome.php";
        </script>
        <?php
             }               
?>
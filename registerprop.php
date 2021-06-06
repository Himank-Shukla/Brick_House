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
	

	$user_id = $row['id'];






$property_name = $location =$area =$pincode =$price = "";
$bhk =$category =$city =$state =$amenities = "";
$property_name_err =   "";

	


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if property_name is empty
    if(empty(trim($_POST["property_name"]))){
        $property_name_err = "property_name cannot be blank";
    }
    else{
        $sql = "SELECT property_id FROM property WHERE property_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_property_name);

            // Set the value of param property_name
            $param_property_name = trim($_POST['property_name']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $property_name_err = "This property_name is already taken";

                }
                else{
                    $property_name = trim($_POST['property_name']);
                }
            }
			
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);



    $location = trim($_POST['location']);
    $area = trim($_POST['area']);
    $pincode = trim($_POST['pincode']);
    $price = trim($_POST['price']);
    $bhk = trim($_POST['bhk']);
    $category = trim($_POST['category']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
	$amenities= trim($_POST['amenities']);

	
	//echo("inserted id is ".mysqli_insert_id($conn));




// If there were no errors, go ahead and insert into the database
if(empty($property_name_err)  )
{
    $sql = "INSERT INTO property (property_name, location, price, pincode, user_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssss", $param_property_name, $param_location, $param_price, $param_pincode, $param_user_id);

        // Set these parameters
        $param_property_name = $property_name;
        $param_location = $location;
        $param_price = $price;
        $param_pincode = $pincode;
		$param_user_id = $user_id;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: home.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}

	echo("inserted id is ".mysqli_insert_id($conn));
	$property_id= mysqli_insert_id($conn);
	

    $sql1 = mysqli_query($conn,"INSERT INTO property_type (property_id ,bhk , size  ,category) VALUES ( '$property_id' ,'$bhk', '$area', '$category')")or die(mysqli_error($conn));
	$sql2 = mysqli_query($conn,"INSERT INTO area_table (pincode, city ,state) VALUES ('$pincode', '$city', '$state')");


	//$amenities = 'test 1; test 2; test 3';
	$strArr = explode(",", $amenities);
	foreach ($strArr as $key => $value) {
		$sql = mysqli_query($conn,"INSERT into amenity (property_id,amenities)values('$property_id', '$value')")or die(mysqli_error());
      
}
	$uploadFolder = 'uploads/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        $query = "INSERT INTO image SET images='$imageName' , property_id='$property_id' " ;
        $run = $conn->query($query) or die("Error in saving image".$conn->error);
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
    <h2 class="inactive underlineHover"><a href=""><?php echo $row['name']; ?></a></h2>
    <h2 class="active"> Register Property</h2>

    <!-- Icon -->


    <!-- Login Form -->
    <form action="" method="post"  enctype="multipart/form-data">
	  <input type="text" id="property_name" class="fadeIn second" name="property_name" placeholder="Property Name" required>
      <input type="text" id="area" class="fadeIn third" name="area" placeholder="area"  required >
      <input type="text" id="BHK" class="fadeIn second" name="bhk" placeholder="BHK" required>
      <input type="text" id="category" class="fadeIn second" name="category" placeholder="Category" required>
      <input type="text" id="price" class="fadeIn second" name="price" placeholder="Price" required>
	  <input type="text" id="amenities" class="fadeIn second" name="amenities" placeholder="Amenites(use ',' to seperate)" required>

      <input type="text" id="location" class="fadeIn second" name="location" placeholder="Location" required>
      <input type="text" id="pincode" class="fadeIn second" name="pincode" placeholder="Pincode" required>
      <input type="text" id="city" class="fadeIn second" name="city" placeholder="City" required>
      <input type="text" id="state" class="fadeIn second" name="state" placeholder="State" required>
      <input type="file" name="imageFile[]" class="fadeIn second" required multiple class="form-control">



      <button type="submit" name="uploadImageBtn" id="uploadImageBtn" class="fadeIn fourth" value="Register">Register</button>
    </form>

    <div id="formFooter">
       <p><a class="underlineHover" href="home.php">Cancel</a>.</p>

    </div>


  </div>
</div>
</body>
</html>

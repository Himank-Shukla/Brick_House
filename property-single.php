<?php
  include 'config.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
	{
		header("location: signin.php");
	}
	$property_id=$_GET['property_id'];
	//$property_id=24;
	$query=mysqli_query($conn,"SELECT * FROM property where property_id='$property_id'")or die(mysqli_error($conn));
	$row= mysqli_fetch_array($query);
	$query1=mysqli_query($conn,"SELECT * FROM property_type where property_id='$property_id'")or die(mysqli_error($conn));
	$row1= mysqli_fetch_array($query1);
	$pincode=$row['pincode'];
	$query2=mysqli_query($conn,"SELECT * FROM area_table where pincode='$pincode'")or die(mysqli_error($conn));
	$row2= mysqli_fetch_array($query2);
	$query3=mysqli_query($conn,"SELECT amenities FROM amenity where property_id='$property_id'")or die(mysqli_error($conn));
	
	//if($query3){
		//while($row3= mysqli_fetch_array($query3))
			//echo $row3['amenities'];
	
	//}
	
	
	
	$user_id=$row['user_id'];
	$query4=mysqli_query($conn,"SELECT * FROM users where id='$user_id'")or die(mysqli_error($conn));
	$row4= mysqli_fetch_array($query4);
	
	
	$id=$_SESSION['id'];
	//$query5=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	//$row5= mysqli_fetch_array($query5);
	
  ?>
 






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $row['property_name']; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
  .owl-carousel .owl-item img {
    display: block;
    width: 100%;
    height: 800px;
  }
  </style>

  <!-- =======================================================
  * Template Name: EstateAgency - v2.2.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  
 <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Brick<span class="color-b">House</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">
            <a class="nav-link active" href="home.php">Home</a>
          </li>
          
          <li class="nav-item">
			<a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
			<a class="nav-link" href="registerprop.php">Register</a>
          </li>
          <li class="nav-item">
			<a class="nav-link" href="property-grid.php">Properties</a>
          </li>
          <li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
          </li>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  
        </ul>
      </div>
      
    </div>
  </nav><!-- End Header/Navbar -->
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
             <h1 class="title-single"><?php echo $row['property_name']; ?></h1>
              <span class="color-text-a"><?php echo $row['location']; ?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="home.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="property-grid.php">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $row['property_name']; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              
	 <?php
        // fetch Images
        $queryGetImg = "SELECT images FROM image WHERE property_id='$property_id'";
        $resultImg = $conn->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
            while ($row5 = $resultImg->fetch_object()){
				?>
                <div class="carousel-item-b">
                    
                    <img src="<?php echo 'uploads/'.$row5->images;?>"/>
                </div>
			  <?php 
            }
        }
        ?>
			  
			  
			  
			  
			  
			  
			  
			  
            </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">Rs</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $row['price']; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span><?php echo $row['property_id']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span><?php echo $row['location']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span><?php echo $row1['category']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status:</strong>
                        <span>Sale</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span><?php echo $row1['size']; ?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Beds:</strong>
                        <span><?php echo $row1['bhk']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Baths:</strong>
                        <span>2</span>
                      </li>
					  <li class="d-flex justify-content-between">
                        <strong>Pincode:</strong>
                        <span><?php echo $row2['pincode']; ?></span>
                      </li>
					  <li class="d-flex justify-content-between">
                        <strong>Owner name:</strong>
                        <span><?php echo $row4['name']; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Owner contact:</strong>
                        <span><?php echo $row4['phone']; ?></span>
                      </li>
					  <li class="d-flex justify-content-between">
                        <strong>Owner email:</strong>
                        <span><?php echo $row4['username']; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    Elegance and simplicity are expressed in this apartment. Bright and welcoming, it consists of a living room, a  kitchenette, pretty bedrooms with an attached bathroom. 

                  </p>
                  <p class="description color-text-a no-margin">
                    Suitable for families  who want to enjoy a comfortable stay.
                  </p>
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li><?php 
							while($row3= mysqli_fetch_array($query3))
										echo "<li>".$row3['amenities']."</li>";
	
						 ?> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            
         
          <div class="col-md-12">
                  
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a" action="" method="POST">   

                    <div class="row">
                      <!-- <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>-->
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="textMessage" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-a" name="submit">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          
          <div class="copyright-footer">
            <p class="copyright color-text-a" style="color:#f6f4f4">
              &copy; Copyright
              <span class="color-a" style="color:#f6f4f4">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits" style="color:#f6f4f4">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/" style="color:#f6f4f4">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php
      if(isset($_POST['submit'])){
		$textMessage = trim($_POST['textMessage']);
	
      	$sql1 = mysqli_query($conn,"INSERT INTO feedback (property_id ,user_id , rating) VALUES ( '$property_id' ,'$id', '$textMessage')")or die(mysqli_error($conn));
	
    mysqli_close($conn);                
	?>
		<script type="text/javascript">
            alert("Feedback sent!");
            window.location = "";
        </script>
        <?php
             }               
?>
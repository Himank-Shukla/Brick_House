<?php
  include 'config.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
	{
		header("location: signin.php");
	}
	$query=mysqli_query($conn,"SELECT * FROM property ")or die(mysqli_error($conn));
	$data= (mysqli_fetch_all($query,MYSQLI_ASSOC));
	//$query1=mysqli_query($conn,"SELECT * FROM property_type where property_id='$property_id'")or die(mysqli_error($conn));
	//$row1= mysqli_fetch_array($query1);
//	$pincode=$row['pincode'];
	//$query2=mysqli_query($conn,"SELECT * FROM area_table where pincode='$pincode'")or die(mysqli_error($conn));
	//$row2= mysqli_fetch_array($query2);
//	$query3=mysqli_query($conn,"SELECT amenities FROM amenity where property_id='$property_id'")or die(mysqli_error($conn));
	
	//if($query3){
		//while($row3= mysqli_fetch_array($query3))
			//echo $row3['amenities'];
	
	//}
	
	
	
	//$user_id=$row['user_id'];
	//$query4=mysqli_query($conn,"SELECT * FROM users where id='$user_id'")or die(mysqli_error($conn));
	//$row4= mysqli_fetch_array($query4);
	
	
	$id=$_SESSION['id'];
	//$query5=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	//$row5= mysqli_fetch_array($query5);
	
  ?>


 










<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Property-Grid</title>
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
  .card-box-a card-shadow{
	  height:450px
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
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="home.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->























    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select" name="city" onchange="this.form.submit()">
                  <option selected>SELECT CITY</option>
                  <option  value="Bangalore">Bangalore</option>
                  <option value="Ajmer">Ajmer</option>
                  <option value="Mumbai">Mumbai</option>
                </select>
              </form>
			  </div>
          </div>
			  <?php 
			  
			       $city=null;
				   
					if(isset($_GET["city"])){
						$city=$_GET["city"];
						//echo "city:".$city;
					}
					if($city==null){
							
							
							 
					//print_r($data);
					//foreach ($data as $items) {	
					//	echo $items['property_id'];
						//echo $items['price'];
					
					//}
					foreach ($data as  $value) {						
						//echo $value['property_id'];
						$property_id=$value['property_id'];
						$query1=mysqli_query($conn,"SELECT * FROM property_type where property_id='$property_id'")or die(mysqli_error($conn));
						$row1= mysqli_fetch_array($query1);
						echo '
		  
					  <div class="col-md-4">
						<div class="card-box-a card-shadow" style="
    height: 450px;
">
						  <div class="img-box-a">';?>
							
						<?php
        // fetch Images
        $queryGetImg = "SELECT images FROM image WHERE property_id='$property_id'";
        $resultImg = $conn->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
            $row5 = $resultImg->fetch_object();
				?>
                
                    
                    <img src="<?php echo 'uploads/'.$row5->images;?>" alt"">
               
			  <?php 
            
        }
        ?>
			  	<?php   echo'
						  
						  
						  
						  </div>
						  <div class="card-overlay">
							<div class="card-overlay-a-content">
							  <div class="card-header-a">
								<h2 class="card-title-a">
								  <a href="#">';
								  echo $value['property_name'];
									echo '<br />'.$value['location'].'</a>';
								echo '</h2>
							  </div>
							  <div class="card-body-a">
								<div class="price-box d-flex">';
								  echo '<span class="price-a">sale |'.$value['price'].'</span>';
								echo '</div>
								<a href="property-single.php?property_id='.$property_id.'" class="link-a">Click here to view
								  <span class="ion-ios-arrow-forward"></span>
								</a>
							  </div>
							  <div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
								  <li>
									<h4 class="card-info-title">Area</h4>';
									echo '<span> '.$row1['size'].'</span>';
								  echo '</li>
								  <li>
									<h4 class="card-info-title">Beds</h4>';
									echo '<span> '.$row1['bhk'].'</span>';
								  echo '</li>
								  <li>
									<h4 class="card-info-title">Baths</h4>
									<span>4</span>
								  </li>
								  <li>
									<h4 class="card-info-title">Category</h4>';
									echo '<span> '.$row1['category'].'</span>';
								  echo '</li>
								</ul>
							  </div>
							</div>
						  </div>
						</div>
					  </div>';
					}
		  
							
							
							
							
							
							
							}
					else{
					
					
					$city=$_GET['city'];
					
					
					$queryx=mysqli_query($conn,"SELECT property_id from property where pincode in (select pincode from area_table where city='$city')")or die(mysqli_error($conn));
					//print_r($queryx);
					while($rowx= mysqli_fetch_assoc($queryx)){
						//print_r($rowx);
					//print_r($rowx);
					//echo count($rowx);
			
 			//foreach ($rowx as $res) {
 //  echo "x";
   //echo "<br>";
    //echo $res; 
    //echo "<br>";
//} 
					$arr= implode(",",$rowx);
					$queryy=mysqli_query($conn,"SELECT * FROM property where property_id in ('$arr') ")or die(mysqli_error($conn));
					$datay= (mysqli_fetch_all($queryy,MYSQLI_ASSOC));
					//print_r($datay);
							  ?>
            
		  
		  
		  
		  
		  
		 <?php 
					//print_r($rowx);
					//foreach ($data as $items) {	
					//	echo $items['property_id'];
						//echo $items['price'];
					
					//}
					//foreach ($datay as  $value) {						
						//echo $value['property_id'];
						$value=$datay['0'];
						//print_r($value);
						$property_id=$value['property_id'];
						$query1=mysqli_query($conn,"SELECT * FROM property_type where property_id='$property_id'")or die(mysqli_error($conn));
						$row1= mysqli_fetch_array($query1);
						echo '
		  
					  <div class="col-md-4">
						<div class="card-box-a card-shadow" style="
    height: 450px;
">
						  <div class="img-box-a">';?>
							
						<?php
        // fetch Images
        $queryGetImg = "SELECT images FROM image WHERE property_id='$property_id'";
        $resultImg = $conn->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
            $row5 = $resultImg->fetch_object();
				?>
                
                    
                    <img src="<?php echo 'uploads/'.$row5->images;?>" style="float:left;" alt"">
               
			  <?php 
            
        }
        ?>
			  	<?php   echo'
						  
						  
						  
						  </div>
						  <div class="card-overlay">
							<div class="card-overlay-a-content">
							  <div class="card-header-a">
								<h2 class="card-title-a">
								  <a href="#">';
								  echo $value['property_name'];
									echo '<br />'.$value['location'].'</a>';
								echo '</h2>
							  </div>
							  <div class="card-body-a">
								<div class="price-box d-flex">';
								  echo '<span class="price-a">sale |'.$value['price'].'</span>';
								echo '</div>
								<a href="property-single.php?property_id='.$property_id.'" class="link-a">Click here to view
								  <span class="ion-ios-arrow-forward"></span>
								</a>
							  </div>
							  <div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
								  <li>
									<h4 class="card-info-title">Area</h4>';
									echo '<span> '.$row1['size'].'</span>';
								  echo '</li>
								  <li>
									<h4 class="card-info-title">Beds</h4>';
									echo '<span> '.$row1['bhk'].'</span>';
								  echo '</li>
								  <li>
									<h4 class="card-info-title">Baths</h4>
									<span>2</span>
								  </li>
								  <li>
									<h4 class="card-info-title">Category</h4>';
									echo '<span> '.$row1['category'].'</span>';
								  echo '</li>
								</ul>
							  </div>
							</div>
						  </div>
						</div>
					  </div>';
					}}//
		  ?>
		 
		  
		  
		  
		  
		  <!--
		  
		  
		  <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-3.jpg" alt="" class="img-a img-fluid">
              </div>
			  
			  
			  
			  
			  
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ 12.000</span>
                    </div>
                    <a href="property-single.html" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-6.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ 12.000</span>
                    </div>
                    <a href="property-single.html" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-7.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ 12.000</span>
                    </div>
                    <a href="property-single.html" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-8.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ 12.000</span>
                    </div>
                    <a href="property-single.html" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-10.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> Olive Road Two</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | $ 12.000</span>
                    </div>
                    <a href="property-single.html" class="link-a">Click here to view
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span>340m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span>2</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span>4</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Garages</h4>
                        <span>1</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  
  <footer >
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="color:#f6f4f4">
          
          
          <div class="copyright-footer">
            <p class="copyright color-text-a" style="color:#f6f4f4">
              &copy; Copyright
              <span class="color-a" style="color:#f6f4f4">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
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
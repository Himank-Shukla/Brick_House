<?php
require_once "config.php";
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: signin.php");
}
	$id=$_SESSION['id'];
	$query=mysqli_query($conn,"SELECT * FROM users where id='$id'")or die(mysqli_error());
	$row= mysqli_fetch_array($query);
	
	
	

	$query=mysqli_query($conn,"SELECT * FROM property ")or die(mysqli_error($conn));
	$data= (mysqli_fetch_all($query,MYSQLI_ASSOC));
	


?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
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
		  <li class="nav-item">
			<a class="nav-link" href="profile.php"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo $row['name']; ?></a>
          </li>
        </ul>
      </div>
      
    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      
	  
	  
	  <?php 
					//print_r($data);
					//foreach ($data as $items) {	
					//	echo $items['property_id'];
						//echo $items['price'];
					
					//}
					foreach ($data as  $value) {						
						//echo $value['property_id'];
						$property_id=$value['property_id'];

						$pincode=$value['pincode'];
						$query1=mysqli_query($conn,"SELECT * FROM area_table where pincode='$pincode'")or die(mysqli_error($conn));
						$row1= mysqli_fetch_array($query1);
						
						$queryGetImg = "SELECT images FROM image WHERE property_id='$property_id'";
        $resultImg = $conn->query($queryGetImg);
        
        if ($resultImg->num_rows > 0 ){
            $row5 = $resultImg->fetch_object();
				?>
                
                    
				  <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo 'uploads/'.$row5->images;?>)">

               
			  <?php 
            
        }							  //<div class="carousel-item-a intro-item bg-image" style="background-image: url(uploads/post-5.jpg)">

          			
						echo '
						
		  
							  
								<div class="overlay overlay-a"></div>
								<div class="intro-content display-table">
								  <div class="table-cell">
									<div class="container">
									  <div class="row">
										<div class="col-lg-8">
										  <div class="intro-body">
											<p class="intro-title-top">'.$row1['city'].' , '.$row1['state'].'
											  <br> '.$value['pincode'].' </p>
											<h1 class="intro-title mb-4">';
											echo  ' <span class="color-b">'.$value['property_name'].' </span>';
											 echo ' <br>'.$value['location'].' </h1>';
										echo '<p class="intro-subtitle intro-price">
											  <a href="#"><span class="price-a">sale | Rs. '.$value['price'].' </span></a>
											</p>
										  </div>
										</div>
									  </div>
									</div>
								  </div>
								</div>
							  </div>';
							  
					}
	  ?>	
	  
	  
	  
	  
	  <!--
	  <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Rino
                      <br> Venda Road Five</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">Doral, Florida
                      <br> 78345</p>
                    <h1 class="intro-title mb-4">
                      <span class="color-b">204 </span> Alira
                      <br> Roan Road One</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
		-->
    </div>
  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-usd"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Buy</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                 “Owning a home is a keystone of wealth…both financial affluence and emotional security.”
                </p>
              </div>
              <div class="card-footer-c">
                <a href="property-grid.php" class="link-c link-icon">See properties
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="fa fa-home"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sell</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  “Landlords grow rich in their sleep.”
                </p>
              </div>
              <div class="card-footer-c">
                <a href="registerprop.php" class="link-c link-icon">Sell
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
              <div class="title-link">
                <a href="property-grid.php">All Property
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
          
		  
		  
		  
		  
            <?php 
					//print_r($data);
					//foreach ($data as $items) {	
					//	echo $items['property_id'];
						//echo $items['price'];
					
					//}
					foreach (array_reverse($data) as  $value) {						
						//echo $value['property_id'];
						$property_id=$value['property_id'];
						$query1=mysqli_query($conn,"SELECT * FROM property_type where property_id='$property_id'")or die(mysqli_error($conn));
						$row1= mysqli_fetch_array($query1);
						echo '
					<div class="carousel-item-b">
						<div class="card-box-a card-shadow" style="
    height: 450px;
">
						  <div class="img-box-a">
';?>
							
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
          echo'						  </div>
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
					}
		  ?>
		 
          
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <!--
		  
		  <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-3.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.html">157 West
                        <br /> Central Park</a>
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
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-7.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.html">245 Azabu
                        <br /> Nishi Park let</a>
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
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="assets/img/property-10.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="property-single.html">204 Montal
                        <br /> South Bela Two</a>
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
      </div>-->
    </section><!-- End Latest Properties Section -->

    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <footer>
    <div class="container" style="color:#f6f4f4">
      <div class="row">
        <div class="col-md-12">
          
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
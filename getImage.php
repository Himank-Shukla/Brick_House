<?php

 // include "config.php";
  //$property_id = $_GET['property_id'];
  // do some validation here to ensure id is safe
//$property_id =29;
  //$sql = "SELECT images FROM image WHERE property_id='$property_id'";
  //$result = mysqli_query($conn,"$sql");
  //$row = mysqli_fetch_assoc($result);
  //mysqli_close($conn);

  //echo $row['images'];
?>

              


<?php
        // fetch Images
		include "config.php";
        $i = 1;
		$property_id =29;
        $queryGetImg = "SELECT images FROM image WHERE property_id='$property_id'";
        $resultImg = $conn->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
             $row = $resultImg->fetch_object()
				?>
                <div class="col-sm-3">
                    
                    <img src="<?php echo 'uploads/'.$row->images;?>"/>
                </div>
           <?php $i++;
            
        }
        ?>
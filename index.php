<?php 
session_start();

  include('header.php');
  include("connection.php");
	include("functions.php");

	#$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">   
<style>
    * {
        box-sizing: border-box;
    }
.containerimg {
  position: relative;
}

.centerimg {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
}

img { 
  width: 100%;
  height: auto;
  opacity: 0.5;
}

</style>

<div class="containerimg">
        <img src="img\pvds-banner.jpg" alt="Cinque Terre" width="1000" height="300">
        <div class="centerimg" style="font-size: 3vw;">Dream Health and Information Techonology - DHIT</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3 class="text-success">	Hello, <?php echo $user_data['user_name']; ?></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <!--Google map-->
        <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
        <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>

        <!--Google Maps-->
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</html>
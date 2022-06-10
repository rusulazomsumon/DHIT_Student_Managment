<?php 
	include("..\dashboard\dHeader.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	  //something was posted
	  $name = $_POST['name'];
	  $reg = $_POST['reg'];
	  $center = $_POST['center'];
	  $fee_type = $_POST['fee_type'];
	  $getway = $_POST['getway'];
	  $ammount = $_POST['ammount'];


	  $serial = random_num(20);

	  if(!empty($serial))
	  {
		  
		  //save to database
		 		  $query = "insert into fee (name,reg,center,fee_type,getway,ammount) 
				   values ('$name','$reg','$center','$fee_type','$getway','$ammount')";

		  mysqli_query($con, $query);

		  header("Location: ../dashboard/branch_admin.php");
		  die;
	  }else
	  {
		  echo "Please enter some valid information!";
	  }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Student Registration</title>
</head>
<body>

  <style type="text/css">
  
  #text{

	  height: 25px;
	  border-radius: 5px;
	  padding: 4px;
	  border: solid thin #aaa;
	  width: 100%;
	  background-color: white;
  }

  #button{

	  padding: 10px;
	  width: 100px;
	  color: white;
	  background-color: lightblue;
	  border: none;
  }

  #box{

	  background-color: grey;
	  margin: auto;
	  width: 50%;
	  padding: 50px;
  }

  </style>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Payment </div>  
  <!-- Registration Form -->
	  <form method="POST">
		<p>Student Name:</p><input id="text" type="text" name="name"><br><br> 
		<p>Regisraton No:</p> <input id="text" type="number" name="reg"><br><br>
		<label for="center">Training Center:</label>
		<select name="center" id="center">
		<option value="DHIT - Monirampur, Jessore">DHIT - Monirampur, Jessore</option>
		    <option value="DHIT - Kaligonj, Jhinaidah">DHIT - Kaligonj, Jhinaidah</option>
			<option value="DHIT - Mohammdapur,Dhaka">DHIT - Mohammdapur,Dhaka</option>
			<option value="DHIT - Kishorgonj, Nilphamari">DHIT - Kishorgonj, Nilphamari</option>
		</select><br><br>
		<label for="fee_type">Payment Type:</label>
		<select name="fee_type" id="fee_type">
			<option value="addmision">Addmision Fee</option>
			<option value="registration">Registration Fee</option>
			<option value="semester">Semester Fee</option>
			<option value="exam">Exam Fee</option>
			<option value="other">Other Fee</option>	
		</select><br><br>
		<label for="getway">Payment Getway:</label>
		<select name="getway" id="getway">
			<option value="cash">Cash Money</option>
			<option value="bKash">bKash - 01882834071</option>
			<option value="roket">Roket - 01882834071</option>
			<option value="nagod">Nagod - 01882834071</option>
			<option value="others">Others</option>	
		</select><br><br>
		<p>Ammount:</p> <input id="text" type="number" name="ammount"><br><br>
					
		   <input id="button" type="submit" value="Submit"><br><br>

	  </form>
  </div>
<?php // include('footer.php'); ?> 
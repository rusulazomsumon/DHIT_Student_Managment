<?php 
	include("..\dashboard\dHeader.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	  //something was posted
	  $s_roll = $_POST['s_roll'];
	  $reg = $_POST['reg'];
	  $course = $_POST['course'];
	  $grade = $_POST['grade'];

	

	  $serial = random_num(20);

	  if(!empty($serial))
	  {
		  
		  //save to database
		 		  $query = "insert into result (s_roll,reg,course,grade) values ('$s_roll','$reg','$course','$grade')";

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
  <div style="font-size: 20px;margin: 10px;color: white; ">Add Result </div>  
  <!-- Registration Form -->
	  <form method="post">
		<p>Student Roll</p><input id="text" type="number" name="s_roll"><br><br> 
		<p>Student Registration</p><input id="text" type="number" name="reg"><br><br> 
		<label for="course">Course:</label>
		<select name="course" id="course">
			<option value="select">select</option>
			<option value="DMA">DMA</option>
			<option value="DMS">DMS</option>
			<option value="DMP">DMP</option>
			<option value="LMAFP">LMAFP</option>
		</select><br><br>
		<p>Student Grade</p><input id="text" type="double" name="grade"><br><br> 
					
		<input id="button" type="submit" value="Submit"><br><br>

	  </form>
  </div>
<?php // include('footer.php'); ?> 
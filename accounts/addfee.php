<?php 
    session_start();
	include("../connection.php");
	include("../functions.php");
  	//include('header.php');
	$user_data = check_login($con);

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
       //geting by url
      $reg = $_GET['reg'];
	  //something was posted
	  $fee_type = $_POST['fee_type'];
	  $ammount = $_POST['ammount'];
	  

	  if(!empty($reg))
	  {
		  
		  $query = "insert into fee (roll,reg,fee_type,ammount) values ('$roll','$reg','$fee_type','$ammount')";

		  mysqli_query($con, $query);

		  header("Location: searchstudent.php");
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
  <title>Add Tution Fee</title>
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
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Fee Collection </div>  
  <!-- Registration Form -->
	  <form method="post">
		<label for="fee_type">Fee Type:</label>
		<select name="fee_type" id="fee_type">
			<option value="addmision">Addmision Fee</option>
			<option value="semester">Semester Fee</option>
			<option value="exam ">Exam Fee</option>
			<option value="fine">Fine</option>	
		</select><br><br>
		<p>Ammount</p><input id="text" type="number" name="ammount"><br><br> 

					
		   <input id="button" type="submit" value="Submit"><br><br>

		  <a  href="/dsms/login.php">Login</a><br><br>	
	  </form>
  </div>
<?php // include('footer.php'); ?> 
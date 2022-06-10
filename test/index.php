<?php 
session_start();

	include("connection.php");
    include("functions.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
        $sex = $_POST['sex'];
		$password = $_POST['password'];
		


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,sex,password) values ('$user_id','$user_name','$sex','$password')";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>




<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
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
		padding: 20px;
	}

	</style>
	

	<div id="box">
	<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>	
		<form method="post">
		<p>Student Name</p><input id="text" type="text" name="s_name"><br><br> 


            <p>Gender:</p>
            <input type="radio" id="male" name="sex" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="famale" name="sex" value="Famale">
            <label for="famale">Famale</label><br>
			
		<p>Blood</p> <input id="text" type="text" name="blood"><br><br>
		<p>Mobile</p> <input id="text" type="number" name="mobile"><br><br>
		<p>Father Name:</p> <input id="text" type="text" name="f_name"><br><br>
		<p>Mother Name:</p> <input id="text" type="text" name="m_name"><br><br>
		<p>Village/Pourosova:</p> <input id="text" type="text" name="village"><br><br>
		<p>Post:</p> <input id="text" type="text" name="post"><br><br>
		<p>Upozila/Thana:</p> <input id="text" type="text" name="upozila"><br><br>
		<p>District:</p> <input id="text" type="text" name="district"><br><br>
		<p>Division:</p> <input id="text" type="text" name="division"><br><br>
		<p>DHIT Center:</p> <input id="text" type="text" name="center"><br><br>
		<p>Center Code:</p> <input id="text" type="number" name="c_code"><br><br>
		<p>Roll Number:</p> <input id="text" type="number" name="roll"><br><br>
		<p>Regisraton Number:</p> <input id="text" type="number" name="reg"><br><br>
		<p>Course:</p> <input id="text" type="text" name="course"><br><br>
		<p>Season:</p> <input id="text" type="number" name="season"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="/dsms/login.php">Click to Login</a><br><br>
		</form>
	</div>




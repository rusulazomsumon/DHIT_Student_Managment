index.php
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>


*****************************login.php*************************


<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

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
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>

****************************************************logout.php********************************************

<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

header("Location: login.php");
die;

**********************************************signup.php********************************************************

<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
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
	<title>Signup</title>
</head>
<body>

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
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>

****************************************************connection.php****************************************
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

****************************************************************************
functions.php
<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


******************************************* last code *****************************

if($_SERVER['REQUEST_METHOD'] == "POST"){
	//something was posted
	$s_name = $_POST['s_name'];
	$sex = $_POST['sex'];
	$blood = $_POST['blood'];
	$mobile = $_POST['mobile'];
	$f_name = $_POST['f_name'];
	$m_name = $_POST['m_name'];
	$village = $_POST['village'];
	$post = $_POST['post'];
	$upozila = $_POST['upozila'];
	$district = $_POST['district'];
	$division = $_POST['division'];
	$center = $_POST['center'];
	$c_code = $_POST['c_code'];
	$roll = $_POST['roll'];
	$reg = $_POST['reg'];
	$course = $_POST['course'];
	$season = $_POST['season'];

	if(!empty($s_name) && !empty($c_code) && !is_numeric($sex)){

		//save to database
		$serial = random_num(20);
		$query = "insert into student (serial,s_name,sex,blood,mobile,f_name,
  m_name,village,post,upozila,district,division,center,c_code,roll,reg,
  course,season) values 
  ('$serial','$s_name','$sex','$blood','$mobile','$f_name','$m_name','$village','$post','$upozila','$district',
  '$division','$center','$c_code','$roll','$reg','$course','$season')";

		mysqli_query($con, $query);

		header("Location: studentList.php");
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
	width: 90%;
	padding: 0px;
}

</style>
<div id="box">
<div style="font-size: 20px;margin: 0px;color: white;">Student Registration Form</div> 
	<form method="post">
		<p>Student Name:</p> <input id="text" type="text" name="s_name"><br><br>
		<p>Sex:</p> <input id="text" type="text" name="sex"><br><br>
		<p>Blood Group:</p> <input id="text" type="text" name="blood"><br><br>
		<p>Mobile Number:</p> <input id="text" type="number" name="mobile"><br><br>
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

		<input id="button" type="submit" value="Submit Form"><br><br>

	</form>
</div>

**************************************registration page updated**************************************
<?php 
session_start();

	include("connection.php");
	include("functions.php");
  	//include('header.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
	  //something was posted
	  $s_name = $_POST['s_name'];
	  $sex = $_POST['sex'];
	  $blood = $_POST['blood'];
	  $mobile = $_POST['mobile'];

	  $f_name = $_POST['f_name'];
	  $m_name = $_POST['m_name'];
	  $village = $_POST['village'];
	  $post = $_POST['post'];
	  $upozila = $_POST['upozila'];
	  $district = $_POST['district'];
	  $division = $_POST['division'];
	  $center = $_POST['center'];
	  $c_code = $_POST['c_code'];
	  $roll = $_POST['roll'];
	  $reg = $_POST['reg'];
	  $course = $_POST['course'];
	  $season = $_POST['season'];
	  



	  if(!empty($s_name) && !empty($sex) && !is_numeric($s_name))
	  {

		  //save to database
		  $serial = random_num(20);
		  $action = 'NO';
		  $query = "insert into student (serial,s_name,sex,blood,mobile,f_name,
		  m_name,village,post,upozila,district,division,center,c_code,roll,reg,course,season,action) 
		  values ('$serial','$s_name','$sex','$blood','$mobile','$f_name','$m_name','$village','$post','$upozila','$district',
		  '$division','$center','$c_code','$roll','$reg','$course','$season','$action')";

		  mysqli_query($con, $query);

		  header("Location: dashboard.php");
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
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Registration Form </div>  
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
		
			
		   <input id="button" type="submit" value="Submit"><br><br>

		  <a  href="/dsms/login.php">Login</a><br><br>	
	  </form>
  </div>
    <?php // include('footer.php'); ?> 
	*************************************************print value ******************************* 

	echo "<tr>
	<td>".$no."</td>
	<td>".$row["s_name"]."</td>
	<td>".$row["sex"]."</td>
	<td>".$row["mobile"]."</td>
	<td>".$row["center"]."</td>
	<td>".$row["course"]."</td>
	<td>".$row["action"]."</td>
	<td>".$no."</td>
  </tr>";



  88888888888888888888888888888Eitpage88888888888888888888888888
  <?php 
session_start();

	include("connection.php");
  	//include('header.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //Geting id value by link form dashbord
      $student_id = $_GET['id'];

	  //something was posted
	  $s_name = $_POST['s_name'];
	  $sex = $_POST['sex'];
	  $blood = $_POST['blood'];
	  $mobile = $_POST['mobile'];
	  $f_name = $_POST['f_name'];
	  $m_name = $_POST['m_name'];
	  $village = $_POST['village'];
	  $post = $_POST['post'];
	  $upozila = $_POST['upozila'];
	  $district = $_POST['district'];
	  $division = $_POST['division'];
	  $center = $_POST['center'];
	  $c_code = $_POST['c_code'];
	  $roll = $_POST['roll'];
	  $reg = $_POST['reg'];
	  $course = $_POST['course'];
	  $season = $_POST['season'];

      $picture = $_FILES['picture']['name'];
	  $tmpname = $_FILES['picture']['tmp_name'];
	  



	  if(!empty($student_id))
	  {
           //picture upload 
		  $destinationFile = '../img/'.$picture;
		  move_uploaded_file($tmpname,$destinationFile);
		  //Update  to database
          $edit_query = " UPDATE student SET s_name = '$s_name', sex = '$sex', blood = '$blood', mobile = $mobile,
           f_name = '$f_name', m_name = '$m_name', village = '$village', post = '$post', upozila = '$upozila',
            district = '$district', division = '$division', center = '$center', c_code = $c_code, roll = $roll, reg = $reg,
           course = '$course', season = $season, picture = '$destinationFile' WHERE id = $student_id";
        
        $result = mysqli_query($con, $edit_query);

		  header("Location: dashboard.php");
		  die;
	  }else{
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
  <!-- Taking Data from Database To Show during Edit -->
  <?php 
    $student_id = $_GET['id'];
     
     $sql = "SELECT s_name, blood, mobile, f_name, m_name, village, post, upozila, district, c_code, roll ,reg, id  
     FROM student WHERE id = $student_id";

     $result = $con-> query($sql);
      
     /* Strorin Value */
     $row = $result-> fetch_assoc();
  ?>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Registration Form </div>  
	  <form method="post" enctype="multipart/form-data">
		<p>Student Name</p><input id="text" type="text" name="s_name" value="<?php echo $row['s_name']; ?>"><br><br> 
		<p>Gender:</p>
            <input type="radio" id="male" name="sex" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="famale" name="sex" value="Famale">
            <label for="famale">Famale</label><br>
		<p>Blood</p> <input id="text" type="text" name="blood" value="<?php echo $row['blood']; ?>"><br><br>
		<p>Mobile</p> <input id="text" type="number" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>
		<p>Father Name:</p> <input id="text" type="text" name="f_name" value="<?php echo $row['f_name']; ?>"><br><br>
		<p>Mother Name:</p> <input id="text" type="text" name="m_name" value="<?php echo $row['m_name']; ?>"><br><br>
		<p>Village/Pourosova:</p> <input id="text" type="text" name="village" value="<?php echo $row['village']; ?>"><br><br>
		<p>Post:</p> <input id="text" type="text" name="post" value="<?php echo $row['post']; ?>"><br><br>
		<p>Upozila/Thana:</p> <input id="text" type="text" name="upozila" value="<?php echo $row['upozila']; ?>"><br><br>
		<p>District:</p> <input id="text" type="text" name="district" value="<?php echo $row['district']; ?>"><br><br>
		<label for="division">Division:</label>
		<select name="division" id="division">
			<option value="select">select</option>
			<option value="Barishal">Barishal</option>
			<option value="Chattogram">Chattogram</option>
			<option value="Dhaka">Dhaka</option>
			<option value="Khulna">Khulna</option>
			<option value="Rajshahi">Rajshahi</option>
			<option value="Rangpur">Rangpur</option>
			<option value="Mymensingh ">Mymensingh </option>
			<option value="Sylhet">Sylhet</option>	
		</select><br><br>
		<label for="center">Training Center:</label>
		<select name="center" id="center">
			<option value="select">select</option>
			<option value="DHIT - Mohammdapur,Dhaka">DHIT - Mohammdapur,Dhaka</option>
			<option value="DHIT - Kaligonj, Jhinaidah">DHIT - Kaligonj, Jhinaidah</option>
			<option value="DHIT - Monirampur, Jessore">DHIT - Monirampur, Jessore</option>
			<option value="DHIT - Kishorgonj, Nilphamari">DHIT - Kishorgonj, Nilphamari</option>
		</select>
		<p>Center Code:</p> <input id="text" type="number" name="c_code" value="<?php echo $row['c_code']; ?>"><br><br>
		<p>Roll Number:</p> <input id="text" type="number" name="roll" value="<?php echo $row['roll']; ?>"><br><br>
		<p>Regisraton Number:</p> <input id="text" type="number" name="reg" value="<?php echo $row['reg']; ?>"><br><br>
		<label for="course">Course:</label>
		<select name="course" id="course">
			<option value="select">select</option>
			<option value="DMA">DMA</option>
			<option value="DMS">DMS</option>
			<option value="DMP">DMP</option>
			<option value="LMAFP">LMAFP</option>
		</select>
		<label for="season">Season:</label>
		<select name="season" id="season">
			<option value="select">select</option>
			<option value="2021/22">2021/22</option>
			<option value="2022">2022</option>
			<option value="2022/23">2022/23</option>
		</select><br><br>
        <label for="file">Upload New Picture:</label>
		<input id="file" type="file" name="picture"><br><br>
					
		   <input id="button" type="submit" value="Submit"><br><br>

		  <a  href="/dsms/login.php">Login</a><br><br>	
	  </form>
  </div>
    <?php // include('footer.php'); ?> 

	99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999
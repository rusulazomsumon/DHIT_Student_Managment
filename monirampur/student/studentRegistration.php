<?php 
	include("..\dashboard\dHeader.php");

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
	  
	  $picture = $_FILES['picture']['name'];
	  $tmpname = $_FILES['picture']['tmp_name'];
	  

	  

	  $serial = random_num(20);

	  if(!empty($serial))
	  {
		  //picture upload 
		  $destinationFile = '../img/'.$picture;
		  move_uploaded_file($tmpname,$destinationFile);
		  //save to database
		 
		  $action = 'NO';
		  $query = "insert into student (serial,s_name,sex,blood,mobile,f_name,
		  m_name,village,post,upozila,district,division,center,c_code,roll,reg,course,season,picture,action) 
		  values ('$serial','$s_name','$sex','$blood','$mobile','$f_name','$m_name','$village','$post','$upozila','$district',
		  '$division','$center','$c_code','$roll','$reg','$course','$season','$destinationFile','$action')";

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
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Registration Form </div>  
  <!-- Registration Form -->
	  <form method="post" enctype="multipart/form-data">
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
		<p>Center Code:</p> <input id="text" type="number" name="c_code"><br><br>
		<p>Roll Number:</p> <input id="text" type="number" name="roll"><br><br>
		<p>Regisraton Number:</p> <input id="text" type="number" name="reg"><br><br>
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

		<label for="file">Upload Your Picture:</label>
		<input id="file" type="file" name="picture"><br><br>
					
		   <input id="button" type="submit" value="Submit"><br><br>

	  </form>
  </div>
<?php // include('footer.php'); ?> 
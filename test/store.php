<?php 
session_start();

	include("../connection.php");
  	//include('../header.php');

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
	  



	  if(!empty($student_id))
	  {
		  //Update  to database
          $edit_query = " UPDATE student SET s_name = '$s_name', sex = '$sex', blood = '$blood', mobile = $mobile,
           f_name = '$f_name', m_name = '$m_name', village = '$village', post = '$post', upozila = '$upozila',
            district = '$district', division = '$division', center = '$center', c_code = $c_code, roll = $roll, reg = $reg,
           course = '$course', season = $season WHERE id = $student_id";
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
      $conn = mysqli_connect("localhost", "root", "", "dsms");
      if($conn-> connect_error){
          die("Connection failed:".$conn-> connect_error);
      }
     $sql = "SELECT s_name, blood, mobile, f_name, m_name, village, post, upozila, district, c_code, roll ,reg, id  
     FROM student WHERE id = $student_id";

     $result = $conn-> query($sql);
      
     /* Strorin Value */
     $row = $result-> fetch_assoc();
  ?>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Registration Form </div>  
	  <form method="post">
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
					
		   <input id="button" type="submit" value="Submit"><br><br>

		  <a  href="/dsms/login.php">Login</a><br><br>	
	  </form>
  </div>
    <?php // include('footer.php'); ?> 



	********************************addfee.php 2/2/22*********************
	<?php 
session_start();

	include("../connection.php");
  	//include('../header.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //Geting id value by link form dashbord
      $student_id = $_GET['id'];

	  //something was posted
	  $name = $_POST['name'];
	  $reg = $_POST['reg'];
	  $fee_type = $_POST['fee_type'];
	  $ammount = $_POST['ammount'];
	

	  if(!empty($student_id))
	  {
		  //Update  to database
		  $query = "insert into fee (name,reg,fee_type,ammount) values ('$name','$reg','$fee_type','$ammount')";
          mysqli_query($con, $query);

		  header("Location: ../dashboard/branch_admin.php");");
		  die;
	  }else{
		  echo " Value Problem	 ";
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
      $conn = mysqli_connect("localhost", "root", "", "dsms");
      if($conn-> connect_error){
          die("Connection failed:".$conn-> connect_error);
      }
     $sql = "SELECT s_name,reg, id FROM student WHERE id = $student_id";

     $result = $conn-> query($sql);
      
     /* Strorin Value */
     $row = $result-> fetch_assoc();
  ?>

  <div id="box">
  <div style="font-size: 20px;margin: 10px;color: white; ">Student Registration Form </div>  
	  <form method="post">
		<p>Student Name</p><input id="text" type="text" name="name" value="<?php echo $row['s_name']; ?>"><br><br> 
		<p>Regisraton Number:</p> <input id="text" type="number" name="reg" value="<?php echo $row['reg']; ?>"><br><br>
		<label for="fee_type">Fee Type:</label>
		<select name="fee_type" id="fee_type">
			<option value="Addmision Fee">addmision</option>
			<option value="Registration Fee">registration</option>
			<option value="Exam Fee">exam</option>
			<option value="Certificate Fee">certificate</option>
			<option value="Others Fee">others</option>
		</select><br><br>
		<p>Ammount:</p> <input id="text" type="number" name="ammount"><br><br>
					
		   <input id="button" type="submit" value="Submit"><br><br>

	  </form>
  </div>
    <?php // include('footer.php'); ?> 

	88888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
	
	<?php 
  include('../header.php');
  include("../connection.php");
  include("../functions.php");
?>

<div class="content">
  <h2>Student Result</h2>
 
  <div>

          <style>
              #box{

                  background-color: ;
                  margin: auto;
                  width: 300px;
                  padding: 20px;
              }
              #HeadText{
                  text-align: center;   
                  font-size: 24px;    
                  width: 100%;
              }
              #input{
                  width: 40%;
                  height: 5%;
                  border: 1px;
                  border-radius: 5px;
                  border-color: ;
                  padding: 8px, 15px, 8px, 15px;
                  margin: 10px, 0px, 15px, 0px;
                  box-shadow: 1px, 1px, 2px, 1px;
                  background: ;
              }
              #search{
                  background: #FF8080;
              }
          </style>
          <center>
          <div id="search">
                <t1 id="HeadText">Student Result</t1>
                    <form action="" method="POST">
                        <input id="input" type="text" name="reg" placeholder="Enter Student Registration No"><br>
                        <input id="input" type="submit" name="search" value="Find Result"><br><br>
                    </form>
          </div>
          </center>
          
          
          <t1 id="HeadText">Student Result</t1>
          <table id="box">
              <tr style="text-align: left">
              <th>SI</th>
                  <th>Name</th>
                  <th>Roll</th>
                  <th>Registration</th>
                  <th>Course</th>
                  <th>Center</th>
                  <th>Grade Point</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              if(isset($_POST['search'])){
                $reg = $_POST['reg'];
                $no=0;

                   /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
                $sql = "SELECT s_roll,reg,course,grade FROM result WHERE reg = '$reg'";
                $result = $con-> query($sql);
                  while($row = $result-> fetch_assoc()){ 
                      $no++;
          ?>        
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['s_roll']; ?></td>
                                <td><?php echo $row['reg']; ?></td>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['grade']; ?></td>
                              </tr>             
          <?php            
                     

                    }
                  
                  echo "</table>";
              }else{
                  echo "0 result";
              }
              $con-> close();
          ?>
          </table>
  </div>   

</div>

</body>
</html>

<?php include('../footer.php'); ?>




	
	
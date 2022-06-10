
 <?php 
    /* ***************** Student List For Aproval ************************** */
    session_start();
    include("../functions.php");
    include("../connection.php");

    $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dhit Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #4863A0;
  overflow-x: hidden;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  margin-left: 200px;
  padding-left: 20px;
}
</style>
<!-- ************************************************* HTML ************************************ -->
</head>
<body>

<div class="sidenav">
  <a href="/dsms/">Main Website</a>
  <a href="/dsms/student/studentRegistration.php">Add Student</a>
  <a href="/dsms/student/studentList.php">Active Student List</a>
  <a href="/dsms/student/allstudentList.php">All Student List</a>
  <a href="/dsms/accounts/addfee.php">Add Fee</a>
  <a href="/dsms/accounts/addresult.php">Add Result</a>
  <li><a href="/dsms/logout.php">Log Out</a></li>

</div>

<div class="content">
  <h2>DHIT Dashboard</h2>
 
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
          </style>
          
          <t1 id="HeadText">Newly Admited Student</t1>
          <table id="box">
              <tr style="text-align: left">
                  <th>SI. No</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Mobile</th>
                  <th>Center</th>
                  <th>Course</th>
                  <th>Edit</th>
                  <th>Hold</th>
                  <th> Approve</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
              $sql = "SELECT picture, s_name, sex, mobile, center, course, id  FROM student WHERE action='NO'";
              $result = $con-> query($sql);

              if($result-> num_rows > 0){
                $no=0;
                  while($row = $result-> fetch_assoc()){ 
                      $no++;
          ?>        
                      	    <tr>
                                <td><?php echo $no; ?></td>
                                <td><img src="<?php echo $row['picture']; ?>" alt="abc.jpg" height="50px" weidth="50px"></td>
                                <td><?php echo $row['s_name']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['center']; ?></td>
                                <td><?php echo $row['course']; ?></td>
                                <td><a href="/dsms/student/edit.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
                                <td><a href="/dsms/student/hold.php?id=<?php echo $row['id']; ?>" >HOLD</a></td>
                                <td><td><a href="/dsms/student/approve.php?id=<?php echo $row['id']; ?>">Approve</a></td></td>
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
  <a href="/dsms/student/allstudentlist.php"><h2>All Student List</h2></a>
   

</div>

</body>
</html>


 <?php 
    /* ***************** Student Result Find ************************** */
    session_start();
    include("../functions.php");
    include("../connection.php");

    $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dhit Ltd</title>
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
  <a href="/dsms/student/dashboard.php">Main Dashboard</a>
  <a href="/dsms/accounts/addfee.php">Add Fee</a>
  <a href="/dsms/student/studentList.php">Active Student List</a>
  <li><a href="/dsms/logout.php">Log Out</a></li>

</div>

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


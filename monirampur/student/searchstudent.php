
 <?php 
    /* ***************** Student Fee Collection ************************** */
    session_start();
    include("../functions.php");
    include("../connection.php");

    $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dhit Sub Dashboard</title>
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
  <h2>DHIT Branch Dashboard</h2>
 
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
                <t1 id="HeadText">Find Student For Payment</t1>
                    <form action="" method="POST">
                        <input id="input" type="text" name="reg" placeholder="Enter Student Registration No"><br>
                        <input id="input" type="submit" name="search" value="Find Student"><br><br>
                    </form>
          </div>
          </center>
          
          
          <t1 id="HeadText">Leatest Collection</t1>
          <table id="box">
              <tr style="text-align: left">
              <th>SI</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Mobile</th>
                  <th>Center</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Pay</th>
                  <th>payslip</th>
                  <th>History</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              if(isset($_POST['search'])){
                $reg = $_POST['reg'];
                $no=0;

                   /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
                $sql = "SELECT picture, s_name, sex, mobile, center, reg, course,action, id  FROM student WHERE reg = '$reg'";
                $result = $con-> query($sql);
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
                                <td><?php echo $row['action']; ?></td>

                                <td><a href="/dsms/accounts/addfee.php?id=<?php echo $row['reg']; ?>">Pay Now</a></td>
                                <td><a href="#" >Payslip</a></td>
                                <td><td><a href="#">Payment History</a></td></td>
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


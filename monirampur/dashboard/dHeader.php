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
  <a href="/dsms/monirampur/dashboard/branch_admin.php">Monirampur Dashboard</a>
  <a href="/dsms/monirampur/student/studentRegistration.php">Add Student</a>
  <a href="/dsms/monirampur">Active Student List</a>
  <a href="/dsms/monirampur/student/addfee.php">Add Fee</a>
  <a href="/dsms/monirampur/student/addresult.php">Add Result</a>
  <a href="\dsms\monirampur\student\findresult.php">Search Result</a>
  <a href="\dsms\monirampur\student\searchstudent.php">Search Student</a>
  <a href="\dsms\monirampur\website\webcontrol.php">Website Control</a>
  <a href="\dsms\monirampur\dashboard\setting.php">Setting</a>
  <a href="/dsms/monirampur">Main Website</a>   
  <li><a href="/dsms/monirampur/logout.php">Log Out</a></li>

</div>
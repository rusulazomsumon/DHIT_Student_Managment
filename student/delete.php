<?php
    session_start();
	include("../connection.php");



    $student_id = $_GET['id'];
    $del_query = "DELETE FROM `student` WHERE id = $student_id";
    $result = mysqli_query($con, $del_query);
    if ($result) {
        header('location:allstudentlist.php');
    }
?>
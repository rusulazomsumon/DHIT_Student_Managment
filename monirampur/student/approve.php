<?php
    session_start();
	include("../connection.php");



    $student_id = $_GET['id'];
    $action = 'YES';
    $approve_query = " UPDATE student SET action = '$action' WHERE id = $student_id";
    $result = mysqli_query($con, $approve_query);
    if ($result) {
        header('location:studentList.php');
    }
?>
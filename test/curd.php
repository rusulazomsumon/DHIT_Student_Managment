https://www.youtube.com/watch?v=SAMbNqkDLLA
********************************************ADD*********************************************
<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    // require the db connection
    require_once 'db.php';

    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $email = (!empty($_POST['email'])) ? $_POST['email'] : '';
    $course = (!empty($_POST['course'])) ? $_POST['course'] : '';
    $id = (!empty($_POST['student_id'])) ? $_POST['student_id'] : '';

    if (!empty($id)) {
        // update the record
        $stu_query = "UPDATE `students` SET first_name='" . $first_name . "', last_name='" . $last_name . "',gender='" . $gender . "',email= '" . $email . "', course='" . $course . "' WHERE id ='" . $id . "'";
        $msg = "update";
    } else {
        // insert the new record
        $stu_query = "INSERT INTO `students` (first_name, last_name, gender,email, course) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $gender . "', '" . $email . "', '" . $course . "' )";
        $msg = "add";
    }

    $result = mysqli_query($conn, $stu_query);

    if ($result) {
        header('location:index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {
    // require the db connection
    require_once 'db.php';

    $stu_id = $_GET['id'];
    $stu_query = "SELECT * FROM `students` WHERE id='" . $stu_id . "'";
    $stu_res = mysqli_query($conn, $stu_query);
    $results = mysqli_fetch_row($stu_res);
    $first_name = $results[1];
    $last_name = $results[2];
    $gender = $results[3];
    $email = $results[4];
    $course = $results[5];

} else {
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $course = "";
    $stu_id = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body>
   <?php include 'nav.php';?>

    <div class="container">
        <div class="formdiv">
        <div class="info"></div>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-7">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
                <select class="form-control" name="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="Male" <?php if ($gender == 'Male') {echo "selected";}?> >Male</option>
                <option value="Female" <?php if ($gender == 'Female') {echo "selected";}?>>Female</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
            <label for="course" class="col-sm-3 col-form-label">Course</label>
            <div class="col-sm-7">
                <select class="form-control" name="course" id="course">
                <option value="">Select Course</option>
                <option value="BCA" <?php if ($course == 'BCA') {echo "selected";}?>>BCA</option>
                <option value="MCA" <?php if ($course == 'MCA') {echo "selected";}?>>MCA</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                <input type="hidden" name="student_id" value="<?php echo $stu_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html> 
************************************************db.php************************************************
<?php
// MySQL connection
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$database = "rasumon";

$conn = mysqli_connect($dbServer, $dbUser, $dbPassword, $database) or 
die('Mysql Connection Error:' . mysqli_connect_error());
************************************************Delete.php***********************************************
<?php
if (!empty($_GET['id'])) {
    // require connection
    require_once 'db.php';

    $student_id = $_GET['id'];
    $del_query = "DELETE FROM `students` WHERE id = '" . $student_id . "'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:index.php?msg=del');
    }
}
*********************************************head.php******************************************************
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD OPERATIONS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    .formdiv { margin:0 auto; width:40% }
    .info { height: 20px;}
    </style>
</head>
*************************************************Index.php**********************************************
<?php
// mysql connection
require_once 'db.php';
$query = "SELECT * FROM `students`";

$results = mysqli_query($conn, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];    
    $alert_msg = ($msg == "add") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body>
   <?php include 'nav.php';?>
    <div class="container">
<?php if (!empty($alert_msg)) {?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
    <div class="info"></div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Course</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td>
                                        <a href="add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">EDIT</a>
                                        <a href="   delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Do you really want to delete?');" >DELETE</a>
                                    </td>
                                </tr>

                            <?php
         }
    }
?>



            </tbody>
        </table>
    </div>
</body>
</html> 
***************************************************nav.php*****************************************************
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">CRUD OPERATIONS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="">List<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Add New</a>
            </li>
        </ul>
        </div>
      </nav>
      
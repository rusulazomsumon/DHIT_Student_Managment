<?php 
    /* *****************  ************************** */
    session_start();
    include('../header.php');
    include("../functions.php");
    include("../connection.php");

    #$user_data = check_login($con);
 ?>

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
    }
</style>

<t1 id="HeadText">Newly Admited Student All Dhit Brunch</t1>
<table id="box">
<tr style="text-align: left">
        <th>SI. No</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Mobile</th>
        <th>Center</th>
        <th>Course</th>
    </tr>
<!-- PHP Sqli Qurary for faching data  -->  
<?php
    /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
    $sql = "SELECT picture, s_name, sex, mobile, center, course, id  FROM student WHERE action='YES'";
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
    <button onclick="window.print()">Print List</button>
    <?php include('../footer.php'); ?> 
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
                  <th>Roll</th>
                  <th>Name</th>
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
                    //quory from two table ........... with inner join
                $sql = "SELECT result.s_roll, student.s_name, student.reg, result.course, student.center, result.grade FROM result INNER JOIN student ON result.reg = student.reg WHERE result.reg = '$reg'";
                $result = $con-> query($sql);
                  while($row = $result-> fetch_assoc()){ 
                      $no++;
          ?>        
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['s_roll']; ?></td>
                                <td><?php echo $row['s_name']; ?></td>
                                <td><?php echo $row['reg']; ?></td>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['center']; ?></td>
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




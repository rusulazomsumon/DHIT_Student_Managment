<?php 
	include("..\superAdmin\dHeader.php");
?>

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
          </style>
          
          <t1 id="HeadText">DHIT All Branch Student List</t1>
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
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Approve</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
              $sql = "SELECT picture, s_name, sex, mobile, center, course,action, id  FROM student";
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
                                <td><?php echo $row['action']; ?></td>

                                <td><a href="/dsms/student/edit.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
                                <td><a href="/dsms/student/delete.php?id=<?php echo $row['id']; ?>" >Delete</a></td>
                                <td><td><a href="/dsms/student/approve.php?id=<?php echo $row['id']; ?>">Done</a></td></td>
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

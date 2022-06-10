
<?php  include("dHeader.php");  ?>

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
                  <th>Payment</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
              $sql = "SELECT picture, s_name, sex, mobile, center, course, reg,id  FROM student WHERE action='NO' && center='DHIT - Monirampur, Jessore'";
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
                                <td><a href="/dsms/monirampur/student/edit.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
                                <td><a href="/dsms/monirampur/student/addfee.php?id=<?php echo $row['reg']; ?>">Pay Now</a></td>
                                
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

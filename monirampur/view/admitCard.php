<?php 
  include('../header.php');
  include("../connection.php");
  include("../functions.php");
?>

<div class="content">
  <h2>Student Admit Card</h2>
 
  <div>

          <style>
              #box{

                  background-color: gray;
                  margin: auto;
                  width: 600px;
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

              #admit{
                  text-align: center;   
                  font-size: 24px;    
                  width: 100%;
              }
          </style>
          <center>
          <div id="search">
                <t1 id="HeadText">Student Admit Card</t1>
                    <form action="" method="POST">
                        <input id="input" type="text" name="reg" placeholder="Enter Student Registration No"><br>
                        <input id="input" type="submit" name="search" value="Find Result"><br><br>
                    </form>
          </div>
          </center>
          
          
         
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              if(isset($_POST['search'])){
                $reg = $_POST['reg'];    // Receving the Student Registration NO.
                $no=0;
                    //quory from two table ........... with inner join
                $sql = "SELECT result.s_roll, student.s_name, student.reg, result.course, student.center, student.picture FROM result INNER JOIN student ON result.reg = student.reg WHERE result.reg = '$reg'";
                $result = $con-> query($sql);
                  while($row = $result-> fetch_assoc()){ 
                      $no++;
          ?>        
                        <!-- Admid Card  -->  
                        <div id="box" >
                            <h2>Admid Card</h2>
                            <p style="text-align:center;"><img src="<?php echo $row['picture']; ?>" alt="abc.jpg" height="80px" weidth="80px"></p> 
                            <p ><b>&emsp; &emsp;Roll&emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp; &nbsp;: </b> <?php echo $row['s_roll']; ?> </p>
                            <p><b>&emsp; &emsp;Regisraton&emsp; &emsp;&emsp; &emsp; &ensp;:</b> <?php echo $row['reg']; ?></p>
                            <p><b>&emsp; &emsp;Student Name &emsp;&emsp; &emsp;:</b>  <?php echo $row['s_name']; ?></p>
                            <p><b>&emsp; &emsp;Training Course&ensp;&emsp; &emsp;&nbsp;:</b> <?php echo $row['course']; ?></p>
                            <p><b>&emsp; &emsp;Training Center&ensp;&emsp; &emsp;&nbsp;: </b> <?php echo $row['center']; ?></p>
                            <button onclick="window.print()">Print Admid Card</button>
                        </div>

                    
          <?php            
                     

                    }
                  
              }else{
                  echo "0 result";
              }
              $con-> close();
          ?>
          
  </div>   

</div>

</body>

</html>

<?php include('../footer.php'); ?>




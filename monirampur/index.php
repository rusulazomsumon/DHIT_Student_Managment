<?php 
  include("functions.php");
  include("connection.php");
  include('header.php');
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <img src="img\dhitMoniMohsin.jpg" alt="আধুনিক ক্লাসরুম" class="d-block" style="width:100%; height: 300px;">
      <p class="p bg-primary text-white text-center">মহসিন আলম, DHIT-Monirampur কেন্দ্র পরিচালক <br> Contact: 01743 916 116</p>
      <div class="p-5 bg-primary text-white text-center">
        <p> <b> কেন্দ্র পরিচালকের বানীঃ</b> <br> আমাদের বাংলাদেশে শিক্ষিত হারের সংখ্যা বাড়লেও চাকুরির বাজার খুবই মন্দা। 
          জনসংখ্যা বৃদ্ধির সাথে সাথে বাড়ছে বেকারত্ব। তৃণমূলে অপ্রতুল চিকিৎসা সেবা, পল্লি চিকিৎসা খাতের প্রয়জনিয়তা সৃষ্টি করেছে।
          DHIT থেকে প্রশিক্ষণ নিন, বেকারত্ব থেকে মুক্তি পান, দেশ সেবায় এগিয়ে আসুন। </p> 
      </div>
      <hr class="d-sm-none">
    </div>


      <!--**************************** Body Start Here ****************** -->

    <div class="col-sm-8 ">

      <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">
<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="img\dhitClassddfls.jpg" alt="আধুনিক ক্লাসরুম" class="d-block" style="width:100%; height: 300px;">
    <div class="carousel-caption">
      <h3>আধুনিক ক্লাসরুম</h3>
      <p>নিয়মিত অভিজ্ঞ MBBS ডাক্তার দিয়ে ক্লাস</p>
    </div>
  </div>
  <div class="carousel-item">
    <img src="img\pvds-banner.jpg" alt="আধুনিক ক্লাসরুম" class="d-block" style="width:100%; height: 300px;">
    <div class="carousel-caption">
      <h3>আধুনিক ক্লাসরুম</h3>
      <p>নিয়মিত অভিজ্ঞ MBBS ডাক্তার দিয়ে ক্লাস</p>
    </div> 
  </div>
  <div class="carousel-item">
    <img src="img\dhitClasssdf.jpg" alt="আধুনিক ক্লাসরুম" class="d-block" style="width:100%; height: 300px;">
    <div class="carousel-caption">
      <h3>আধুনিক ক্লাসরুম</h3>
      <p>নিয়মিত অভিজ্ঞ MBBS ডাক্তার দিয়ে ক্লাস</p>
    </div>  
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

    <div class="container">
        <div  class="row">
          <div class=" p-3 col-12 font-family: 'AponaLohit', sans-serif !important;">
             <h3>বর্তমান শিক্ষার্থীদের তালিকা ও তথ্য</h3>
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

<table id="box">
    <tr style="text-align: left">
        <th>SI</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Course</th>
        <th>Season</th>      
    </tr>
<!-- PHP Sqli Qurary for faching data  -->  
<?php
    /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
    $sql = "SELECT picture, s_name, roll, course, season  FROM student WHERE center='DHIT - Monirampur, Jessore'";
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
                      <td><?php echo $row['roll']; ?></td>
                      <td><?php echo $row['course']; ?></td>
                      <td><?php echo $row['season']; ?></td>
                    </tr>             
  <?php            
            
              
            }
          
          echo "</table>";
      }else{
          echo "0 result";
      }
  ?>
  </table>
           </div>       
        </div>
    </div>


</div>   
  </div>
</div>


      

<?php 
  include('footer.php');
?>

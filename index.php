<!-- Start Including header -->
<?php
  include('./mainInclude/header.php');
  include('./dbConnection.php');
?>
<!-- End Including header -->

  
  <!--Start Video background-->
  <div class="container-fluid remove-vid-mar">
      <div class="vid-parent">
          <video playsinline autoplay muted loop>
              <source src ="video/Covervid.mp4">
          </video>
          <div class="vid-hover"></div>
      </div>
      <div class="vid-content">
          <h1 class="my-content">Welcome to EduSapiens</h1>
          <h5 class="my-content">A Community for Learners</h5>

          <?php
            if(!isset($_SESSION['is_login'])){
              echo ' <a href="studentRegistration.php" class="btn btn-danger mt-4" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
            }else{
              echo '<a href="student/studentProfile.php" class="btn btn-primary mt-4">My Profile</a>';
            }
          ?>
      </div>
  </div>
  <!--End Video background-->

  <!--Text-banner Starts-->
  <div class="container-fluid bg-danger txt-banner">
      <div class="row bottom-banner">
          <div class="col-sm">
              <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
          </div>
          <div class="col-sm">
              <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
          </div>
          <div class="col-sm">
              <h5><i class="fas fa-keyboard mr-3"></i>Life-Time Access</h5>
          </div>
          <div class="col-sm">
              <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee</h5>
          </div>
      </div>
  </div>
  <!--Text-banner Ends-->

  <!--Most Popular Course Start-->
  <div class="container mt-5">
      <h1 class="text-center">Popular Courses</h1>
      <!--Popular Courses 1st card Start-->
      <div class="card-deck mt-4">
      <?php
      $sql = "SELECT * FROM course LIMIT 3";
      $result = $conn->query($sql);
      if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
           $course_id = $row['course_id'];
           echo '
           <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding=0px; margin=0px;">
           <div class="card">
               <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Python"/>
               <div class="card-body">
                   <h5 class="card-title">'.$row['course_name'].'</h5>
                   <p class="card-text">'.$row['course_desc'].'</p>
               </div>
               <div class="card-footer">
                   <p class=" card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].' </del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].' </span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
               </div>
           </div>
              </a>';
        }
      }
      
      ?>
         
    
    <!-- Popular Course 1st card ends-->
    
</div> 
    <!-- Popular Course 3rd card ends-->
    <!-- Popular Course 4th card starts-->
    <div class="card-deck mt-4">
    <?php
      $sql = "SELECT * FROM course LIMIT 3,3";
      $result = $conn->query($sql);
      if($result->num_rows > 0 ){
        while($row = $result->fetch_assoc()){
           $course_id = $row['course_id'];
           echo '
           <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding=0px; margin=0px;">
           <div class="card">
               <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top" alt="Python"/>
               <div class="card-body">
                   <h5 class="card-title">'.$row['course_name'].'</h5>
                   <p class="card-text">'.$row['course_desc'].'</p>
               </div>
               <div class="card-footer">
                   <p class=" card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].' </del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].' </span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
               </div>
           </div>
              </a>';
        }
      }
      
      ?>
   
</div>
    <!-- Popular Course 6th card ends-->
    <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="courses.php">View All Courses</a>
    </div>
</div>
  <!--Most Popular Course End-->

  <!--Start Contact Us-->
  <?php
  include('./contact.php');
  ?>
  <!--End Contact Us-->
  
  <!--Testimonal starts-->
  <div class="container-fluid" style="background-color:#4B7289" id="Feedback">
   <h1 class="text-center text-white testyheading ">Student's Feedback</h1>
    <div class="row">
      <div class="col-md-9">
        <div id="testimonial-slider" class="owl-carousel">
        <?php
          $sql = "SELECT s.stu_name,s.stu_occ,s.stu_img,f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               

       echo '<div class="testimonial">
         <span class="icon fa fa-quote-left"></span>
         <p class="description">'.$row['f_content'].'</p>
       <div class="testimonial-content">
        <div class="pic">
          <img src="'. str_replace('..','.',$row['stu_img']).'" alt="">
        </div>
          <h4 class="title">'.$row['stu_name'].'</h4>
          <span class="post">'.$row['stu_occ'].'</span>
        </div>
      </div>';
    }
          }?>
      </div>
      </div>
    </div>
  </div>
  <!--Testimonal Ends-->

<!--Start Social Follow links-->
<div class="container-fluid bg-danger">
  <div class="row text-white text-center p-1">
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-facebook"></i>Facebook</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-linkedin"></i>Linkedin</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i>Whatsapp</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i>Instagram</a>
    </div>
  </div>
</div> <!--Social Links End-->

<!--About Section Start-->
<div class="container-fluid p-4" style="background-color:white">
  <div class="container" style="background-color:white">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
          <p>EduSapien provides universal access to the world's best online-education, partnering with top universities and organization to provide quality education virtually.</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a class="text-dark" href="#">Web Development</a><br>
        <a class="text-dark" href="#">Web Designing</a><br>
        <a class="text-dark" href="#">Data Analysis</a><br>
        <a class="text-dark" href="#">Data Structure and Algorithms</a><br>
        <a class="text-dark" href="#">App Development</a><br>
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>Edu organization <br> Near Modi Hospital <br> Manjunathnagar, <br> Bengaluru <br>Ph. 080234567  </p>
      </div>
    </div>
  </div>
</div> <!--End About Us-->

<!-- Start Including footer -->
<?php
  include('./mainInclude/footer.php');
?>
<!-- End Including footer -->

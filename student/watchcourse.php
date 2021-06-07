<?php
if(!isset($_SESSION)){
    session_start();
}
  include('../dbConnection.php');

  if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}else {
    echo "<script> location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch Course</title>
     <!--BootStrap CSS-->
     <link rel="stylesheet" href="../css/bootstrap.min.css">

     <!-- Font Awesome CSS -->
     <link rel="stylesheet" href="../css/all.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

     <!--Google Font-->
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

     <!--CSS Files-->
     <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="container-fluid bg-info p-2">
       <h3 class="text-white">Welcome to I-Educate</h3>
       <a class="btn btn-danger" href="./myCourse.php">My Courses</a>
    </div>
    <div class="container-fluid">
      <div class="row">
         <div class="col-sm-3 border-right">
            <h4 class="text-center">Lessons </h4>
              <ul id="playlist" class="nav flex-column">
              <?php
                if(isset($_GET['course_id'])){
                    $course_id = $_GET['course_id'];
                    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                        }
                    }
                }
              ?>
              </ul>
         </div>
         <div class="col-sm-8">
             <video  id="videoarea"  src="" class="mt-5 w-75 ml-2" controls></video>
         </div>
      </div>
    </div>

     <!-- Jquery and Bootstrap JavaScript -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>  
  <script type="text/javascript" src="../js/popper.min.js"></script>  
  <script type="text/javascript" src="../js/bootstrap.min.js"></script> 

  <!-- Font Awesome JS  -->
  <script type="text/javascript" src="../js/all.min.js"></script> 


  <script type="text/javascript" src="../js/custom.js"></script> 

</body>
</html>
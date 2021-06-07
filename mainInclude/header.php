<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BootStrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!--Testimonal CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--CSS Files-->
    <link rel="stylesheet" href="css/style.css">

    <title>EduSapiens</title>
</head>
<body>
  <!-- Navigation Starts-->
  <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
  <img src="images/Elogo.png" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-nav pl-5">
     <li class="navbar-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
     <li class="navbar-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
     <li class="navbar-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
     <?php
        if(!isset($_SESSION)){
        session_start();
        }
        if(isset($_SESSION['is_login'])){
          echo '<li class="navbar-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link">My Profile</a></li>
          <li class="navbar-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        } else {
          echo ' <li class="navbar-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
          <li class="navbar-item custom-nav-item"><a href="studentRegistration.php" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">SignUp</a></li>';
        }
      ?>
     <li class="navbar-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
     <li class="navbar-item custom-nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
    </ul>
  </div>
</nav>
  <!--Navigation Ends -->
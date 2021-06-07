<?php
  if(!isset($_SESSION)){
    session_start();
}
  include('./adminInclude/header.php');
  include('../dbConnection.php');

  if(isset($_SESSION['is_admin_login'])){
      $adminEmail = $_SESSION['adminLogEmail'];
  }else {
      echo "<script> location.href='../index.php';</script>";
  }


// update
if(isset($_REQUEST['requpdate'])){
    //   checking for empty fields
      if(($_REQUEST['course_id']=="")||($_REQUEST['course_name']=="")||($_REQUEST['course_desc']=="")||($_REQUEST['course_author']=="")||($_REQUEST['course_duration']=="")||($_REQUEST['course_price']=="")||($_REQUEST['course_original_price']=="")){
         $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> "All Fields Required !!"</div>';
      } else {
          $cid = $_REQUEST['course_id'];
          $cname = $_REQUEST['course_name'];
          $cdesc = $_REQUEST['course_desc'];
          $cauthor = $_REQUEST['course_author'];
          $cduration = $_REQUEST['course_duration'];
          $cprice = $_REQUEST['course_price'];
          $coriginal_price = $_REQUEST['course_original_price'];
          $cimg= '../images/courses/'. $_FILES['course_img']['name'];

          $sql = "UPDATE course SET course_id = '$cid', course_name='$cname',course_desc='$cdesc',course_author='$cauthor',course_duration='$cduration',course_price='$cprice',course_original_price='$coriginal_price',course_img='$cimg' WHERE course_id = '$cid'";

          if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> "Course Updated Successfully !!"</div>';
          } else{
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> "Unable to Update Course !!"</div>';
          }
        }
    }

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Edit Course Details</h3>

  <?php
    if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM course WHERE course_id={$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }
  ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control" name="course_id" id="course_id" value="<?php if(isset($row['course_id'])) {echo $row['course_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" name="course_name" id="course_name" value="<?php if(isset($row['course_name'])) {echo $row['course_name']; }?>">
    </div>
    <div class="form-group">
      <label for="course_desc">Course Description</label>
      <textarea class="form-control" name="course_desc" id="course_desc" row=2>"<?php if(isset($row['course_desc'])) {echo $row['course_desc']; }?>"</textarea>
    </div>
    <div class="form-group">
      <label for="course_author">Author</label>
      <input type="text" class="form-control" name="course_author" id="course_author" row=2 value="<?php if(isset($row['course_author'])) {echo $row['course_author']; }?>">
    </div>
    <div class="form-group">
      <label for="course_duration">Course Duration</label>
      <input type="text" class="form-control" name="course_duration" id="course_duration" value="<?php if(isset($row['course_duration'])) {echo $row['course_duration']; }?>">
    </div>
    <div class="form-group">
      <label for="course_original_price">Course Original Price</label>
      <input type="text" class="form-control" name="course_original_price" id="course_original_price" value="<?php if(isset($row['course_original_price'])) {echo $row['course_original_price']; }?>">
    </div>
    <div class="form-group">
      <label for="course_price">Course Selling Price</label>
      <input type="text" class="form-control" name="course_price" id="course_price" value="<?php if(isset($row['course_price'])) {echo $row['course_price']; }?>">
    </div>
    <div class="form-group">
      <label for="course_img">Course Image</label>
      <img src="<?php if(isset($row['course_img'])) {echo $row['course_img']; } ?>" alt="" class="img-thumbnail">
      <input type="file" class="form-control-file" name="course_img" id="course_img">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
      <a href="courses.php" class="btn btn-secondary">Close</a>
    </div>
    <?php
    if(isset($msg)){
      echo $msg;
    }
    ?>
  </form>
</div>

</div>  <!--div Row close from header-->
</div>  <!--div Container-fluid close from header-->

<?php
  include('./adminInclude/footer.php');
?>
<?php
  if(!isset($_SESSION)){
    session_start();
}
  include('./stuInclude/header.php');
  include('../dbConnection.php');

  if(isset($_SESSION['is_login'])){
      $stuEmail = $_SESSION['stuLogEmail'];
  }else {
      echo "<script> location.href='../index.php';</script>";
  }
// update
if(isset($_REQUEST['stuPassUpdation'])){
    //   checking for empty fields
      if(($_REQUEST['stuNewPass']=="")){
         $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> "All Fields Required !!"</div>';
      } else {
          $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
          $result = $conn->query($sql);
          if($result->num_rows==1){
              $stuPass = $_REQUEST['stuNewPass'];
              $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email= '$stuEmail'";
              if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> "Updated Successfully !!"</div>';
              }else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> "Unable to Update !!"</div>';
              }
          }
        }
}
?>

<div class="col-sm-9 col-md-10">
   <div class="row">
     <div class="col-sm-6">
       <form method="POST" class="mt-5 mx-5">
       <div class="form-group">
         <label for="inputEmail">Email</label>
         <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
         </div>
       <div class="form-group">
         <label for="inputnewpassword">New Password</label>
         <input type="text" class="form-control" name="stuNewPass" id="inputnewpassword" placeholder="New Password">
       </div>
       <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdation">Update</button>
       <button type="Reset" class="btn btn-secondary mt-4">Reset</button>
       <?php if(isset($passmsg)){
           echo $passmsg;
       }
       ?>
       </form>
     </div>
   </div>
</div>

</div>  <!--div Row close from header-->
</div>  <!--div Container-fluid close from header-->

<?php
  include('./stuInclude/footer.php');
?>          
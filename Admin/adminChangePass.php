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
if(isset($_REQUEST['adminPassUpdation'])){
    //   checking for empty fields
      if(($_REQUEST['adminPass']=="")){
         $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> "All Fields Required !!"</div>';
      } else {
          $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
          $result = $conn->query($sql);
          if($result->num_rows==1){
              $adminPass = $_REQUEST['adminPass'];
              $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email= '$adminEmail'";
              if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> "Updated Successfully !!"</div>';
              }else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> "Unable to Update !!"</div>';
              }
          }
        }
}
?>

<div class="col-sm-9 mt-5">
   <div class="row">
     <div class="col-sm-6">
       <form action="" class="mt-5 mx-5">
       <div class="form-group">
         <label for="inputEmail">Email</label>
         <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail ?>" readonly>
         </div>
       <div class="form-group">
         <label for="inputnewpassword">New Password</label>
         <input type="text" class="form-control" name="adminPass" id="inputnewpassword" placeholder="New Password">
       </div>
       <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdation">Update</button>
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
  include('./adminInclude/footer.php');
?>          
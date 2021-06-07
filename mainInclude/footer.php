<!--Start Footer-->
<footer class="container-fluid bg-dark text-center p-2">
  <small class="text-white">Copyright &copy; 2020 || Designed By Shilpashree || <a href="#login"  data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a></small>
</footer> <!--end footer-->

<!-- Start Student Registration Modal -->
<?php
  include('./studentRegistration.php');
?>
<!-- End Student Registration Modal -->

<!-- Start Student login Modal -->
<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start student login form -->
      <form id="stuLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">E-mail</label><input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
</div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
</div>
</form>
<!-- end student Login form -->
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary"  id="stuLoginBtn" onclick="checkstuLogin()" >Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Login Modal -->

<!-- Start adminin login Modal -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start admin login form -->
      <form id="adminLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">E-mail</label><input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
</div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label><input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
</div>
</form>
<!-- end admin Login form -->
      </div>
      <div class="modal-footer">
        <small id="statusAdminLogMsg"></small>
        <button type="button" class="btn btn-primary adminLoginBtn" onclick="checkadminLogin()">Login</button>
        <button type="button" class="btn btn-secondary adminLOginBtn" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End admin Login Modal -->

  <!-- Jquery and Bootstrap JavaScript -->
  <script src="js/jquery.min.js"></script>  
  <script src="js/popper.min.js"></script>  
  <script src="js/bootstrap.min.js"></script> 

  <!-- Font Awesome JS  -->
  <script src="js/all.min.js"></script> 

  <!--Testimonal js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
 <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        autoPlay:true
    });
});
</script>

<!-- Student Ajax Call Javascript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<!-- Admin Ajax Call Javascript -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
  
</body>
</html>
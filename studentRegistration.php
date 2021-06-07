
<!-- Start Student Registration Modal -->
<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start student registration form -->
      <form id=stuRegForm>
  <div class="form-group">
    <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small id="statusMsg1"></small><input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
</div>
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">E-mail</label><small id="statusMsg2"></small><input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
    <small class="form-text">We'll never share your email with anyone else.</small>
</div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><small id="statusMsg3"></small><input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
</div>
</form>
<!-- end student registration form -->
</div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary"  onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End Student Registration Modal -->

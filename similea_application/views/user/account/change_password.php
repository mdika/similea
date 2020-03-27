<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Type your password</h4>
        </div>
        
        <form action="<?php base_url('user/account/change_password_user/index') ?>" method="post">
        
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="oldpassword" id="oldpassword" class="form-control" placeholder="OldPassword" required="required" autofocus="autofocus">
              <label for="oldpassword">Enter Old Password</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="newpassword1" id="newpassword1" class="form-control" placeholder="NewPassword" required="required" autofocus="autofocus">
              <label for="newpassword1">Enter New Password</label>
            </div>
            <div class="form-label-group">
              <input type="text" name="newpassword2" id="newpassword2" class="form-control" placeholder="NewPassword" required="required" autofocus="autofocus">
              <label for="newpassword2">Repeat New Password</label>
            </div>
          </div>
          
          <button class="btn btn-primary btn-user btn-block" type="submit" name="insert" value="Change">Change Password</button>
        </form>
      </div>
    </div>
  </div>
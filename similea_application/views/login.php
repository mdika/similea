<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('ui/img/logo.ico') ?>">

    <title>SI MILEA - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('ui/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('ui/signin.css') ?>" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo base_url('login/login_validation'); ?>" method="post">
    
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      
      <img class="mb-4" src="<?php echo base_url('ui/img/logo.png') ?>" alt="" width="164" height="164">
      <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <span class="text-danger"><?php echo form_error('username'); ?></span>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <span class="text-danger"><?php echo form_error('password'); ?></span>
<!--  <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
-->   <button class="btn btn-lg btn-primary btn-block" type="submit" name="insert" value="Login">Log In</button>
      <?php echo $this->session->flashdata("error"); ?>
      <p class="mt-5 mb-3 text-muted">Copyright &copy; 2019</p>
    </form>
    
    
  </body>
</html>

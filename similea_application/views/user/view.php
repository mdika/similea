<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("user/_view/header.php") ?>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('user/home') ?>"><?php echo SITE_NAME ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <?php $this->load->view("user/_view/navbar.php") ?>

  </nav>

  <div id="wrapper">

    <?php $this->load->view("user/_view/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        
        <?php $this->load->view("user/_view/flashdata.php") ?>

        <?php $this->load->view("user/$view") ?>

      </div>
      <!-- /.container-fluid -->

      <?php $this->load->view("user/_view/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php $this->load->view("user/_view/scrolltotop.php") ?>

  <?php $this->load->view("user/_view/logoutmodal.php") ?>

  <?php $this->load->view("user/_view/js.php") ?>

</body>

</html>

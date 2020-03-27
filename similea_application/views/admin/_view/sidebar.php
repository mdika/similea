    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <?php $this->load->view("admin/_view/_sidebar/brand.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php $this->load->view("admin/_view/_sidebar/dashboard.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      
      <?php $this->load->view("admin/_view/_sidebar/nav_data_hasil_monev.php") ?>

      <?php $this->load->view("admin/_view/_sidebar/nav_monev_beasiswa.php") ?>

      <?php $this->load->view("admin/_view/_sidebar/nav_mahasiswa.php") ?>
      
      <?php $this->load->view("admin/_view/_sidebar/nav_beasiswa.php") ?>
      
      <?php $this->load->view("admin/_view/_sidebar/nav_account.php") ?>
      
      <?php //$this->load->view("admin/_view/_sidebar/nav_import_data.php") ?>
      
      <?php //$this->load->view("admin/_view/_sidebar/nav_export_data.php") ?>

      <?php //$this->load->view("admin/_view/_sidebar/navutilities.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <?php $this->load->view("admin/_view/_sidebar/toggler.php") ?>

    </ul>
    <!-- End of Sidebar -->
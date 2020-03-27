    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <?php $this->load->view("admin/_overview/sbrand.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php $this->load->view("admin/_overview/snavdashboard.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <?php $this->load->view("admin/_overview/snavcomponents.php") ?>

      <?php $this->load->view("admin/_overview/snavutilities.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <?php $this->load->view("admin/_overview/snavpages.php") ?>

      <?php $this->load->view("admin/_overview/snavcharts.php") ?>

      <?php $this->load->view("admin/_overview/snavtables.php") ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <?php $this->load->view("admin/_overview/ssidebartoggle.php") ?>

    </ul>
    <!-- End of Sidebar -->
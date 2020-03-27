<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("admin/_view/header.php") ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view("admin/_view/sidebar.php") ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view("admin/_view/topbar.php") ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Fungsi Controller Export -->
          <?php $this->load->view("admin/_view/_export/data_hasil_monev.php") ?>
          
          <!-- Fungsi Controller View -->

          <div class="row">

            <?php $this->load->view("admin/$view") ?>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view("admin/_view/footer.php") ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php $this->load->view("admin/_view/scrolltotop.php") ?>

  <?php $this->load->view("admin/_view/logoutmodal.php") ?>

  <?php $this->load->view("admin/_view/script.php") ?>

</body>

</html>

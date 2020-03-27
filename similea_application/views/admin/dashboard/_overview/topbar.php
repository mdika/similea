        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

		  <?php $this->load->view("admin/_overview/tsidebartoggle.php") ?>

		  <?php $this->load->view("admin/_overview/tsearch.php") ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

			<?php $this->load->view("admin/_overview/tnavsearch.php") ?>

			<?php $this->load->view("admin/_overview/tnavalerts.php") ?>

            <?php $this->load->view("admin/_overview/tnavmessages.php") ?>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <?php $this->load->view("admin/_overview/tnavui.php") ?>

          </ul>

        </nav>
        <!-- End of Topbar -->
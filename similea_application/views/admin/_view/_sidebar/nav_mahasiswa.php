      <!-- Nav Item - Mahasiswa Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Mahasiswa</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">       
            <h6 class="collapse-header">Overview:</h6>            
            <a class="collapse-item" href="<?php echo site_url('admin/mahasiswa/data_mahasiswa') ?>">Data Mahasiswa</a>          
            <h6 class="collapse-header">Detail:</h6>                      
            <a class="collapse-item" href="<?php echo site_url('admin/mahasiswa/mahasiswa') ?>">Mahasiswa</a>
            <a class="collapse-item" href="<?php echo site_url('admin/mahasiswa/mahasiswa_akademik') ?>">Mahasiswa - Akademik</a>
            <a class="collapse-item" href="<?php echo site_url('admin/mahasiswa/mahasiswa_beasiswa') ?>">Mahasiswa - Beasiswa</a>
            <a class="collapse-item" href="<?php echo site_url('admin/mahasiswa/mahasiswa_biodata') ?>">Mahasiswa - Biodata</a>            
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIM</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($mahasiswa as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->nik ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_panggilan ?>
                    </td>
                    <td>
                                        <?php echo $m->email ?>
                    </td>
                    <td>
                                        <?php echo $m->no_hp ?>
                    </td>
                    <td width="250">
                                        <a href="<?php echo site_url('admin/monev/ip/edit/'.$m->nim) ?>"
										 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
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
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Provinsi</th>
                    <th>Alamat Tinggal</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Provinsi</th>
                    <th>Alamat Tinggal</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($mahasiswa_biodata as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->nik ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_jk ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_provinsi ?>
                    </td>
                    <td>
                                        <?php echo $m->alamat_tinggal ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
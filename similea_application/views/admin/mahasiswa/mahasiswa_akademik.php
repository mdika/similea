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
                    <th>Nama Lengkap</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($mahasiswa_akademik as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_fakultas ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_prodi ?>
                    </td>
                    <td>
                                        <?php echo $m->angkatan ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
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
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($mahasiswa_beasiswa as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_beasiswa ?>
                    </td>
                    <td>
                                        <?php echo $m->no_rek ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
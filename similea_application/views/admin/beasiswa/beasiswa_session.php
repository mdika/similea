        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                                        <?php if($session->monev_session==1){
                                                echo "Sesi Monev Telah Dibuka";
                                              } else {
                                                echo "Sesi Monev Telah Ditutup";
                                              }
                                        ?>
                    </td>
                    <td width="250">
											<a href="<?php echo site_url('admin/beasiswa/beasiswa_session/verifikasi_valid/') ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Buka Sesi</a>
											<a href="<?php echo site_url('admin/beasiswa/beasiswa_session/verifikasi_tidak_valid/') ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Tutup Sesi</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
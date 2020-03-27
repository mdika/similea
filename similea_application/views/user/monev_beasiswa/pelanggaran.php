        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Pelanggaran</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;">Pelanggaran</th>
                    <th style="text-align: center; vertical-align: middle;">Skor Pelanggaran</th>
                    <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                    <th style="text-align: center; vertical-align: middle;">Verifikasi</th>
                    <th style="text-align: center; vertical-align: middle;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td >
                                        <?php echo $monev->ket_nilai_pelanggaran?>
                    </td>
                    <td >
                                        <?php echo $monev->skor_pelanggaran?>
                    </td>
                    <td class="small" style="text-align: center; vertical-align: middle;">
                                        <?php echo substr($monev->ket_pelanggaran, 0, 120) ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_ver_pelanggaran ?>
                    </td>
                    <td width="250" style="text-align: center; vertical-align: middle;">
											<a href="<?php echo site_url('user/monev_beasiswa/pelanggaran/edit/'.$monev->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
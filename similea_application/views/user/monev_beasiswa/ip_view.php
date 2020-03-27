        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data IP</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;">IP</th>
                    <th style="text-align: center; vertical-align: middle;">File KHS</th>
                    <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                    <th style="text-align: center; vertical-align: middle;">Verifikasi</th>
                    <th style="text-align: center; vertical-align: middle;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nilai_khs ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="<?php echo base_url('uploads/file_khs/'.$monev->file_khs) ?>"><?php if($monev->file_khs != null) echo "khs"; ?></a>
                    </td>
                    <td class="small" vvstyle="text-align: center; vertical-align: middle;">
                                        <?php echo substr($monev->ket_khs, 0, 120) ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_ver_khs ?>
                    </td>
                    <td width="250" style="text-align: center; vertical-align: middle;">
											<a href="<?php echo site_url('user/monev_beasiswa/ip/edit/'.$monev->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
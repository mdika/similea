        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Organisasi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;">Organisasi</th>
                    <th style="text-align: center; vertical-align: middle;">Nama Organisasi</th>
                    <th style="text-align: center; vertical-align: middle;">Jabatan</th>
                    <th style="text-align: center; vertical-align: middle;">File SKAO</th>
                    <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                    <th style="text-align: center; vertical-align: middle;">Verifikasi</th>
                    <th style="text-align: center; vertical-align: middle;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_nilai_skao ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nama_ormawa ?>											
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nama_jabatan ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="<?php echo base_url('uploads/file_skao/'.$monev->file_skao) ?>"><?php if($monev->file_skao != null) echo "skao"; ?></a>
                    </td>
                    <td class="small" style="text-align: center; vertical-align: middle;">
                                        <?php echo substr($monev->ket_skao, 0, 120) ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_ver_skao ?>
                    </td>
                    <td width="250" style="text-align: center; vertical-align: middle;">
											<a href="<?php echo site_url('user/monev_beasiswa/organisasi/edit/'.$monev->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Prestasi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;">Prestasi</th>
                    <th style="text-align: center; vertical-align: middle;">Tingkat Internasional</th>
                    <th style="text-align: center; vertical-align: middle;">Tingkat Nasional</th>
                    <th style="text-align: center; vertical-align: middle;">Tingkat Provinsi</th>
                    <th style="text-align: center; vertical-align: middle;">Tingkat Kabupaten</th>
                    <th style="text-align: center; vertical-align: middle;">File Sertifikat</th>
                    <th style="text-align: center; vertical-align: middle;">Keterangan</th>
                    <th style="text-align: center; vertical-align: middle;">Verifikasi</th>
                    <th style="text-align: center; vertical-align: middle;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_nilai_sert ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->internasional ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nasional ?>
                    </td>
					<td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->provinsi ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->kabupaten ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <a href="<?php echo base_url('uploads/file_sert/'.$monev->file_sert) ?>"><?php if($monev->file_sert != null) echo "sertifikat"; ?></a>
                    </td>                    
                    <td class="small" style="text-align: center; vertical-align: middle;">
                                        <?php echo substr($monev->ket_sert, 0, 120) ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_ver_sert ?>
                    </td>
                    <td width="250" style="text-align: center; vertical-align: middle;">
											<a href="<?php echo site_url('user/monev_beasiswa/prestasi/edit/'.$monev->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
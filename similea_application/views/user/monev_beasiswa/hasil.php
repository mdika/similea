        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Hasil Monev</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">NIM</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Lengkap</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">IP</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Organisasi</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Mentoring</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Prestasi</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Pelanggaran</th>
                    <th colspan="5" style="text-align: center; vertical-align: middle;">Nilai</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Total Nilai</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Status</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">SPP</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Verifikasi</th>
                  </tr>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;">IP</th>
                    <th style="text-align: center; vertical-align: middle;">Organisasi</th>
                    <th style="text-align: center; vertical-align: middle;">Mentoring</th>
                    <th style="text-align: center; vertical-align: middle;">Prestasi</th>
                    <th style="text-align: center; vertical-align: middle;">Pelanggaran</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nim ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nama_lengkap ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nilai_khs ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nilai_jabatan ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nilai_skam ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $sert = $monev->internasional + $monev->nasional + $monev->provinsi + $monev->kabupaten ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->nilai_pelanggaran ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->khs_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->skao_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->skam_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->sert_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->pelanggaran_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->total_hasil ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->keterangan_status ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->keterangan_sanksi ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $monev->ket_ver_hasil ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
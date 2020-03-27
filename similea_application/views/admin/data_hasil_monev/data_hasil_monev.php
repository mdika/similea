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
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Program Studi</th>
                    <th>Jenis Beasiswa</th>
                    <th>Angkatan</th>
                    <th>IP</th>
                    <th>Nilai</th>
                    <th>Organisasi</th>
                    <th>Nilai</th>
                    <th>Mentoring</th>
                    <th>Nilai</th>
                    <th>Prestasi</th>
                    <th>Nilai</th>
                    <th>Pelanggaran</th>
                    <th>Nilai</th>
                    <th>Total Nilai</th>
                    <th>Status</th>
                    <th>SPP</th>
                    <th>Verifikasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; foreach ($monev as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $nomor ?>
                    </td>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_prodi ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_beasiswa ?>
                    </td>
                    <td>
                                        <?php echo $m->angkatan ?>
                    </td>
                    <td>
                                        <?php echo $m->nilai_khs ?>
                    </td>
                    <td>
                                        <?php echo $m->khs_hasil ?>
                    </td>
                    <td>
                                        <?php echo $m->nilai_jabatan ?>
                    </td>
                    <td>
                                        <?php echo $m->skao_hasil ?>
                    </td>
                    <td>
                                        <?php echo $m->nilai_skam ?>
                    </td>
                    <td>
                                        <?php echo $m->skam_hasil ?>
                    </td>
                    <td>
                                        <?php echo $sert = $m->internasional + $m->nasional + $m->provinsi + $m->kabupaten ?>
                    </td>
                    <td>
                                        <?php echo $m->sert_hasil ?>
                    </td>
                    <td>
                                        <?php echo $m->nilai_pelanggaran ?>
                    </td>
                    <td>
                                        <?php echo $m->pelanggaran_hasil ?>
                    </td>
                    <td>
                                        <?php echo $m->total_hasil ?>
                    </td>
                    <td>
                                        <?php echo $m->keterangan_status ?>
                    </td>
                    <td>
                                        <?php echo $m->keterangan_sanksi ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_ver_hasil ?>
                    </td>
                  </tr>
                <?php $nomor++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
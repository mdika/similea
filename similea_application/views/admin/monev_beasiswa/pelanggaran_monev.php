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
                    <th>Pelanggaran</th>
                    <th>Skor Pelanggaran</th>
                    <th>Keterangan</th>
                    <th>Verifikasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; foreach ($monev_pelanggaran as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $nomor ?>
                    </td>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td >
                                        <?php echo $m->ket_nilai_pelanggaran?>
                    </td>
                    <td >
                                        <?php echo $m->skor_pelanggaran?>
                    </td>
                    <td class="small">
                                        <?php echo substr($m->ket_pelanggaran, 0, 120) ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_ver_pelanggaran ?>
                    </td>
                    
                    <td width="250">
                    <!--
											<a href="<?php echo site_url('admin/monev_beasiswa/pelanggaran_monev/verifikasi_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Valid</a>
											<a href="<?php echo site_url('admin/monev_beasiswa/pelanggaran_monev/verifikasi_tidak_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Tidak Valid</a>
                    -->
                                            <a href="<?php echo site_url('admin/monev_beasiswa/pelanggaran_monev/edit/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                    
                  </tr>
                  <?php $nomor++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
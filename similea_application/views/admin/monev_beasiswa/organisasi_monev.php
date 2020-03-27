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
                    <th>Organisasi</th>
                    <th>Nama Organisasi</th>
                    <th>Jabatan</th>
                    <th>File SKAO</th>
                    <th>Keterangan</th>
                    <th>Verifikasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; foreach ($monev_skao as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $nomor ?>
                    </td>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_nilai_skao ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_ormawa ?>											
                    </td>
                    <td>
                                        <?php echo $m->nama_jabatan ?>
                    </td>
                    <td>
                                        <a href="<?php echo base_url('uploads/file_skao/'.$m->file_skao) ?>"><?php if($m->file_skao != null) echo $m->nim."_skao"; ?></a>
                    </td>
                    <td class="small">
                                        <?php echo substr($m->ket_skao, 0, 120) ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_ver_skao ?>
                    </td>
                    <td width="250">
											<a href="<?php echo site_url('admin/monev_beasiswa/organisasi_monev/verifikasi_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Valid</a>
											<a href="<?php echo site_url('admin/monev_beasiswa/organisasi_monev/verifikasi_tidak_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Tidak Valid</a>
                    </td>
                  </tr>
                  <?php $nomor++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
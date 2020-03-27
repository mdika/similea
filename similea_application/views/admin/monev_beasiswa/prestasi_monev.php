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
                    <th>Prestasi</th>
                    <th>Tingkat Internasional</th>
                    <th>Tingkat Nasional</th>
                    <th>Tingkat Provinsi</th>
                    <th>Tingkat Kabupaten</th>
                    <th>File Sertifikat</th>
                    <th>Keterangan</th>
                    <th>Verifikasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $nomor = 1; foreach ($monev_sert as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $nomor ?>
                    </td>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_nilai_sert ?>
                    </td>
                    <td>
                                        <?php echo $m->internasional ?>
                    </td>
                    <td>
                                        <?php echo $m->nasional ?>
                    </td>
					<td>
                                        <?php echo $m->provinsi ?>
                    </td>
                    <td>
                                        <?php echo $m->kabupaten ?>
                    </td>
                    <td>
                                        <a href="<?php echo base_url('uploads/file_sert/'.$m->file_sert) ?>"><?php if($m->file_sert != null) echo $m->nim."_sert"; ?></a>
                    </td>                    
                    <td class="small">
                                        <?php echo substr($m->ket_sert, 0, 120) ?>
                    </td>
                    <td>
                                        <?php echo $m->ket_ver_sert ?>
                    </td>
                    <td width="250">
											<a href="<?php echo site_url('admin/monev_beasiswa/prestasi_monev/verifikasi_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Valid</a>
											<a href="<?php echo site_url('admin/monev_beasiswa/prestasi_monev/verifikasi_tidak_valid/'.$m->id_monev) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Tidak Valid</a>
                    </td>
                  </tr>
                <?php $nomor++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
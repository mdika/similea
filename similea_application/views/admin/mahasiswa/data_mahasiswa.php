        <!-- DataTables Example -->
        <div class="col-lg-13 card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Provinsi</th>
                    <th>Alamat Tinggal</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>IP Terakhir</th>
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                    <th>Email</th>
                    <th>No. HP</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIM</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Panggilan</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Provinsi</th>
                    <th>Alamat Tinggal</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>IP Terakhir</th>
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                    <th>Email</th>
                    <th>No. HP</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($data_mahasiswa as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->nim ?>
                    </td>
                    <td>
                                        <?php echo $m->nik ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_panggilan ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_jk ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_provinsi ?>
                    </td>
                    <td>
                                        <?php echo $m->alamat_tinggal ?>
                    </td>           
                    <td>
                                        <?php echo $m->nama_fakultas ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_prodi ?>
                    </td>
                    <td>
                                        <?php echo $m->angkatan ?>
                    </td>
                    <td>
                                        <?php echo $m->ip_terakhir ?>
                    </td>
                    <td>
                                        <?php echo $m->nama_beasiswa ?>
                    </td>
                    <td>
                                        <?php echo $m->no_rek ?>
                    </td>
                    <td>
                                        <?php echo $m->email ?>
                    </td>
                    <td>
                                        <?php echo $m->no_hp ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
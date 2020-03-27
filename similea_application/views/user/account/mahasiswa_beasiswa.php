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
                    <th>Nama Lengkap</th>
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Beasiswa</th>
                    <th>No. Rekening</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody
                  <tr>
                    <td>
                                        <?php echo $mahasiswa_beasiswa->nim ?>
                    </td>
                    <td>
                                        <?php echo $mahasiswa_beasiswa->nama_lengkap ?>
                    </td>
                    <td>
                                        <?php echo $mahasiswa_beasiswa->nama_beasiswa ?>
                    </td>
                    <td>
                                        <?php echo $mahasiswa_beasiswa->no_rek ?>
                    </td>
                    <td width="250">
                                        <a href="<?php echo site_url('user/account/profil_beasiswa_user/edit/'.$mahasiswa_beasiswa->nim) ?>"
										 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>          
        </div>
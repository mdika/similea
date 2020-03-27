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
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($admins as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->username_admins ?>
                    </td>
                    <td>
                                        <?php echo $m->password_admins ?>
                    </td>
                    <td width="250">
                                        <a href="<?php echo site_url('admin/account/list_admin/reset_password_admin/'.$m->username_admins) ?>"
										class="btn btn-small"><i class="fas fa-edit"></i> Reset Password</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
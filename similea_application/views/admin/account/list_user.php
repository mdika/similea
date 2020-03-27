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
                  <?php foreach ($users as $m): ?>
                  <tr>
                    <td>
                                        <?php echo $m->username_users ?>
                    </td>
                    <td>
                                        <?php echo $m->password_users ?>
                    </td>
                    <td width="250">
                                        <a href="<?php echo site_url('admin/account/list_user/reset_password_user/'.$m->username_users) ?>"
										class="btn btn-small"><i class="fas fa-edit"></i> Reset Password</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
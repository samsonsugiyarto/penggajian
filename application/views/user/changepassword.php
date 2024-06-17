  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1><?= $title; ?></h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">User</a></li>
                          <li class="breadcrumb-item active">Change Password</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="flash-gagal" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">
                      <div class="card card-primary">
                          <form id="validation" action="<?= base_url('user/changepassword'); ?>" method="post">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="current_password">Current Password</label>
                                      <input type="password" name="current_password" class="form-control" id="current_password" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="new_password1">New Password</label>
                                      <input type="password" name="new_password1" class="form-control" id="new_password1" required minlength="5">
                                  </div>
                                  <div class="form-group">
                                      <label for="new_password2">Repeat Password</label>
                                      <input type="password" name="new_password2" class="form-control" id="new_password2" required equalTo="#new_password1">
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                      </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
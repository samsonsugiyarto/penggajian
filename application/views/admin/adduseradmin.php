  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Add User</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/useradmin'); ?>">User</a></li>
                          <li class="breadcrumb-item active">Add User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <div class="flash-gagal" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <form id="validation" action="<?= base_url('admin/adduseradmin'); ?>" method="post" enctype="multipart/form-data">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="text" class="form-control" name="email" id="email" placeholder="email">
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Full name</label>
                                      <input type="text" class="form-control" name="name" id="name" placeholder="full name" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Password</label>
                                      <input type="password" class="form-control" name="password1" id="password1" placeholder="password" minlength="5" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Repeat Password</label>
                                      <input type="password" class="form-control" name="password2" id="password2" placeholder="repeat password" minlength="5" required equalTo="#password1">
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Role</label>
                                      <select name="role_id" id="role_id" class="form-control select2" style="width: 100%;" required>
                                          <option value="">--Select Role--</option>
                                          <?php foreach ($role as $r) : ?>
                                              <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-check">
                                          <input type="hidden" name="is_active" value="0" />
                                          <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                          <label class="form-check-label" for="is_active">
                                              Active ?
                                          </label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="row">
                                          <div class="col-2">
                                              <label for="image">Picture</label>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-10">
                                              <div class="row">
                                                  <div class="col-3">
                                                      <img id="image_load" src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-thumbnail">
                                                  </div>
                                                  <div class="col-9">
                                                      <div class="input-group">
                                                          <div class="custom-file">
                                                              <input type="file" class="custom-file-input" id="image" name="image">
                                                              <label class="custom-file-label" for="image" name="image">Choose file</label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Add</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
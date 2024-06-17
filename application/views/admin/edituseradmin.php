  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit User</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/useradmin'); ?>">User</a></li>
                          <li class="breadcrumb-item active">Edit User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-8">
                      <div class="card card-primary">
                          <form id="validation" action="<?= base_url('admin/edituseradmin/' . $useradmin['id']); ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="email" id="email" value="<?= $useradmin['email']; ?>">
                              <div class="card-body">
                                  <div class="flash-gagal" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
                                  <div class="form-group">
                                      <label for="email2">Email</label>
                                      <input type="text" class="form-control" name="email2" id="email2" value="<?= $useradmin['email']; ?>" placeholder="email">
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Full name</label>
                                      <input type="text" class="form-control" name="name" id="name" placeholder="full name" value="<?= $useradmin['name']; ?>" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Password</label>
                                      <input type="password" class="form-control" name="password1" id="password1" placeholder="password" minlength="5">
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Repeat Password</label>
                                      <input type="password" class="form-control" name="password2" id="password2" placeholder="repeat password" equalTo="#password1">
                                  </div>
                                  <div class="form-group">
                                      <select name="role_id" id="role_id" class="form-control select2" style="width: 100%;">
                                          <?php foreach ($role as $r) : ?>
                                              <?php if ($r['id'] == $useradmin['role_id']) : ?>
                                                  <option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
                                              <?php else : ?>
                                                  <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                              <?php endif; ?>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="form-group row">
                                      <?php
                                        $aktif = $useradmin['is_active']; ?>
                                      <div class="form-check form-check-inline pl-2">
                                          <?php if ($aktif == '1') : ?>
                                              <input type="hidden" name="is_active" id="is_active" value="0" />
                                              <input type="checkbox" name="is_active" id="is_active" value="1" checked />
                                          <?php elseif ($aktif == '0') : ?>
                                              <input type="hidden" name="is_active" id="is_active" value="0" />
                                              <input type="checkbox" name="is_active" id="is_active" value="1" />
                                          <?php endif; ?>

                                          <label class="form-check-label" for="is_active">&nbsp;Active ?</label>
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
                                                      <img id="image_load" src="<?= base_url('assets/img/profile/' . $useradmin['image']); ?>" class="img-thumbnail">
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
                                  <button type="submit" class="btn btn-primary">Edit</button>
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
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
                          <li class="breadcrumb-item active">Edit Profile</li>
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
                  <div class="col-lg-6">
                      <div class="card card-primary">
                          <form id="validation" action="<?= base_url('user/edit'); ?>" method="post" enctype="multipart/form-data">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="email2">Email</label>
                                      <input type="text" class="form-control" name="email2" id="email2" value="<?= $user['email']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="name">Full name</label>
                                      <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>" required>
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
                                                      <img id="image_load" src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail">
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
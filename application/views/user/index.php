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
                          <li class="breadcrumb-item active">User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

          <div class="row">
              <div class="col-lg-3">
                  <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                          <div class="text-center">
                              <img style=" width:110px !important;
            height: 110px !important;" class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture">
                          </div>
                          <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
                          <p class="text-muted text-center"><?= $user['email']; ?></p>
                          <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                  <b>Status</b>
                                  <?php if ($user['is_active'] == 1) : ?>

                                      <div class="float-right"> <span class="badge badge-success "> Active </span> </div>
                                  <?php else : ?>
                                      <div class="float-right"> <span class="badge badge-danger "> Non Active </span> </div>

                                  <?php endif; ?>
                              </li>
                              <li class="list-group-item">
                                  <b>Role</b>
                                  <div class="float-right"><?= $user['role']; ?></div>
                              </li>
                              <li class="list-group-item">
                                  <b>Member Since</b>
                                  <div class="float-right"><?= date('d F Y ', $user['date_created']); ?></div>
                              </li>
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
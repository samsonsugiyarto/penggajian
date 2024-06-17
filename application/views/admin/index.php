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
                          <li class="breadcrumb-item active">Admin</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-lg-3 col-6">

                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3><?= $admin; ?></h3>
                          <p>Administrator</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-user"></i>
                      </div>
                      <a href="<?= base_url('admin/useradmin'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3><?= $pegawai; ?></h3>
                          <p>Pegawai</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-users"></i>
                      </div>
                      <a href="<?= base_url('admin/useradmin'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          </div>


      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
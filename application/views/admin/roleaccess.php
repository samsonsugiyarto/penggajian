  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Role Access</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('admin/role'); ?>">Role</a></li>
                          <li class="breadcrumb-item active">Role Access</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body">
                              <!-- notif sukses -->
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              <h5>Role : <?= $role['role']; ?></h5>
                              <table id="datatable2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Menu</th>
                                          <th class="text-center">Access</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($menu as $m) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td class="text-center"><?= $m['menu']; ?></td>
                                              <td class="text-center">
                                                  <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">



                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">menu</th>
                                          <th class="text-center">Access</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>User</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
                          <li class="breadcrumb-item active">User</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg">
                      <div class="card">
                          <div class="card-body">
                              <a class="btn btn btn-primary mb-3" href="<?= base_url('admin/adduseradmin'); ?>">
                                  <i class="fas fa-plus"></i> Add New User
                              </a>
                              <!-- notif sukses -->
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              <table id="datatable2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Name</th>
                                          <th class="text-center">Email</th>
                                          <th class="text-center">Role</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Date Created</th>
                                          <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($useradmin as $ua) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td><?= $ua['name']; ?></td>
                                              <td><?= $ua['email']; ?></td>
                                              <td class="text-center"><?= $ua['role']; ?></td>
                                              <?php if ($ua['is_active'] == 1) : ?>

                                                  <td class="text-center"> <span class="badge badge-success "> Active </span> </td>

                                              <?php else : ?>
                                                  <td class="text-center"> <span class="badge badge-danger "> Non Active </span> </td>

                                              <?php endif; ?>
                                              <td class="text-center"><?= date('d F Y', $ua['date_created']);  ?></td>
                                              <td class="text-center">
                                                  <a href="<?= base_url('admin/viewuseradmin/' . $ua['id']); ?>" class="btn btn-sm btn-info">
                                                      <i class="fas fa-eye"></i> View
                                                  </a>
                                                  <a href="<?= base_url('admin/edituseradmin/' . $ua['id']); ?>" class="btn btn-sm btn-warning">
                                                      <i class="fas fa-edit"></i> Edit
                                                  </a>
                                                  <a href="<?= base_url('admin/deleteuseradmin/' . $ua['id']); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Name</th>
                                          <th class="text-center">Email</th>
                                          <th class="text-center">Role</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Date Created</th>
                                          <th class="text-center">Action</th>
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
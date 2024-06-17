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
                          <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Admin</a></li>
                          <li class="breadcrumb-item active">Role</li>
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
                      <div class="card">
                          <div class="card-body">
                              <a class="btn btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">
                                  <i class="fas fa-plus"></i> Add New Role
                              </a>
                              <!-- notif sukses -->
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              <table id="datatable2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Role</th>
                                          <th class="text-center">Access Menu</th>
                                          <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($role as $r) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td><?= $r['role']; ?></td>

                                              <?php
                                                $role_id = $r['id'];
                                                $query = "SELECT menu
                                                FROM user_menu JOIN user_access_menu
                                                ON user_menu.id = user_access_menu.menu_id
                                                WHERE user_access_menu.role_id = $role_id
                                                ORDER BY user_menu.sort ASC ";
                                                $access = $this->db->query($query)->result_array(); ?>
                                              <td class="text-center">
                                                  <?php foreach ($access as $acc) : ?>
                                                      <span class="badge badge-info "> <?= $acc['menu']; ?> </span>
                                                  <?php endforeach; ?>
                                              </td>
                                              <td class="text-center">
                                                  <a href="<?= base_url('admin/roleaccess/' . $r['id']); ?>" class="btn btn-sm btn-success">
                                                      <i class="fas fa-wrench"></i> Access
                                                  </a>
                                                  <a data-toggle="modal" data-target="#editRoleModal<?= $r['id']; ?>" class="btn btn-sm btn-warning">
                                                      <i class="fas fa-edit"></i> Edit
                                                  </a>
                                                  <a href="<?= base_url('admin/delete/' . $r['id']); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Role</th>
                                          <th class="text-center">Access Menu</th>
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
  <!-- /.content-wrapper -->
  <div class="modal fade" id="newRoleModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Add New Role</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="validation" action="<?= base_url('admin/role'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="role" name="role" placeholder="Role name" required>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <?php foreach ($role as $r) : ?>

      <div class="modal fade" id="editRoleModal<?= $r['id']; ?>">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Role <?= $r['role']; ?> </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('admin/edit/' . $r['id']); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" placeholder="role name" required>
                          </div>

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Edit Role</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
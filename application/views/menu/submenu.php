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
                          <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu</a></li>
                          <li class="breadcrumb-item active">Submenu</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card">
                          <div class="card-body">
                              <a class="btn btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                                  <i class="fas fa-plus"></i> Add New Submenu
                              </a>
                              <!-- notif sukses -->
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              <table id="datatable2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Title</th>
                                          <th class="text-center">Menu</th>
                                          <th class="text-center">URL</th>
                                          <th class="text-center">Icon</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($submenu as $sm) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td><?= $sm['title']; ?></td>
                                              <td class="text-center"><?= $sm['menu']; ?></td>
                                              <td><?= $sm['url']; ?></td>
                                              <td class="text-center"><i class="<?= $sm['icon']; ?>"></i></td>
                                              <?php if ($sm['is_active'] == 1) : ?>

                                                  <td class="text-center"> <span class="badge badge-success "> Active </span> </td>

                                              <?php else : ?>
                                                  <td class="text-center"> <span class="badge badge-danger "> Non Active </span> </td>

                                              <?php endif; ?>
                                              <td class="text-center">
                                                  <a data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id']; ?>" class="btn btn-sm btn-warning">
                                                      <i class="fas fa-edit"></i> Edit
                                                  </a>
                                                  <a href="<?= base_url('menu/deletesubmenu/' . $sm['id']); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Title</th>
                                          <th class="text-center">Menu</th>
                                          <th class="text-center">URL</th>
                                          <th class="text-center">Icon</th>
                                          <th class="text-center">Status</th>
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
  <div class="modal fade" id="newSubMenuModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Add New Submenu</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="validation" action="<?= base_url('menu/submenu'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="title" name="title" placeholder="Submenu name" required>
                      </div>
                      <div class="form-group">
                          <select name="menu_id" id="menu_id" class="form-control select2" style="width: 100%;" required>
                              <option value="">--Select Menu--</option>
                              <?php foreach ($menu as $m) : ?>
                                  <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" required>
                      </div>
                      <div class="form-group ">
                          <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" required>
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

                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <?php foreach ($submenu as $sm) : ?>

      <div class="modal fade" id="editSubMenuModal<?= $sm['id']; ?>">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Submenu <?= $sm['title']; ?> </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form id="validation" action="<?= base_url('menu/editsubmenu/' . $sm['id']); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="text" class="form-control" id="title" name="title" placeholder="Submenu name" value="<?= $sm['title']; ?>" required>
                          </div>
                          <div class="form-group">
                              <select name="menu_id" id="menu_id" class="form-control select2" style="width: 100%;">
                                  <?php foreach ($menu as $m) : ?>
                                      <?php if ($m['menu'] == $sm['menu']) : ?>
                                          <option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
                                      <?php else : ?>
                                          <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $sm['url']; ?>" required>
                          </div>
                          <div class="form-group ">
                              <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $sm['icon']; ?>" required>
                          </div>
                          <div class="form-group row">
                              <?php
                                $aktif = $sm['is_active']; ?>
                              <div class="form-check form-check-inline pl-3">
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

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Edit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
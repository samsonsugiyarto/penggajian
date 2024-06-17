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
                          <li class="breadcrumb-item active">Menu</li>
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
                              <a class="btn btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">
                                  <i class="fas fa-plus"></i> Add New Menu
                              </a>
                              <!-- notif sukses -->
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              <table id="datatable2" class="table table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Menu</th>
                                          <th class="text-center">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($menu as $m) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td class="text-center"><?= $m['menu']; ?></td>
                                              <td class="text-center">
                                                  <a data-toggle="modal" data-target="#editMenuModal<?= $m['id']; ?>" class="btn btn-sm btn-warning">
                                                      <i class="fas fa-edit"></i> Edit
                                                  </a>
                                                  <a href="<?= base_url('menu/delete/' . $m['id']); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Menu</th>
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
  <div class="modal fade" id="newMenuModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Add New Menu</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="validation" action="<?= base_url('menu'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                      </div>
                      <div class="form-group">
                          <select name="sort" id="sort" class="form-control select2" style="width: 100%;" required>
                              <option value="">--Select Sort--</option>
                              <option value="0">Begining</option>
                              <?php foreach ($menu as $m) : ?>
                                  <option value="<?= $m['sort']; ?>">After <?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                          </select>
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


  <?php foreach ($menu as $m) : ?>

      <div class="modal fade" id="editMenuModal<?= $m['id']; ?>">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Menu <?= $m['menu']; ?> </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('menu/edit/' . $m['id']); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>" placeholder="Menu name" readonly>
                          </div>
                          <div class="form-group">
                              <select name="sort" id="sort" class="form-control select2" style="width: 100%;">
                                  <option value="">--Select Sort--</option>
                                  <option value="0">Begining</option>
                                  <?php foreach ($menu as $mm) : ?>
                                      <?php if ($mm['menu'] != $m['menu']) : ?>
                                          <option value="<?= $mm['sort']; ?>">After <?= $mm['menu']; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Edit Menu</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
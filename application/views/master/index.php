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
                          <li class="breadcrumb-item active">Master</li>
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
                              <a class="btn btn btn-primary mb-3" data-toggle="modal" data-target="#newPekerjaanModal">
                                  <i class="fas fa-plus"></i> Tambahkan Pekerjaan Baru
                                  <!-- notif sukses -->
                                  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                              </a>
                              <table class="table datatable table-sm table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Pekerjaan</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      <?php foreach ($pekerjaan as $p) : ?>
                                          <tr>
                                              <td class="text-center"><?= $i++; ?></td>
                                              <td class="text-center"><?= $p['pekerjaan']; ?></td>
                                              <td class="text-center">
                                                  <a data-toggle="modal" data-target="#editPekerjaanModal<?= $p['id']; ?>" class="btn btn-sm btn-warning">
                                                      <i class="fas fa-edit"></i> Edit
                                                  </a>
                                                  <a href="<?= base_url('master/deletepekerjaan/' . $p['id']); ?>" class="btn btn-sm btn-danger tombol-hapus">
                                                      <i class="fas fa-trash"></i> Delete
                                                  </a>
                                              </td>

                                          </tr>
                                      <?php endforeach; ?>

                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">Perkerjaan</th>
                                          <th class="text-center">Aksi</th>
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



  <div class="modal fade" id="newPekerjaanModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Tambahkan Pekerjaan Baru</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="validation" action="<?= base_url('master/tambahpekerjaan'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="nama pekerjaan" required>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <?php foreach ($pekerjaan as $p) : ?>

      <div class="modal fade" id="editPekerjaanModal<?= $p['id']; ?>">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Pekerjaan <?= $p['pekerjaan']; ?> </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="<?= base_url('master/editpekerjaan/' . $p['id']); ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $p['pekerjaan']; ?>" placeholder="nama pekerjaan" required>
                          </div>

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Ubah Pekerjaan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php endforeach; ?>
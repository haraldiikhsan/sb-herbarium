		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Menu Famili</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <button data-toggle="modal" data-target="#addFamili" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Famili</button>
              </div>
            </div>
            <!-- Add Famili Modal-->
            <div class="modal fade" id="addFamili" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Famili</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form class="user" action="<?= base_url('Famili/addFamili') ;?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="familia" name="familia" placeholder="Nama Famili">
                          <?= form_error('familia', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Add Famili Modal-->
            <div class="modal fade" id="editFamiliaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Famili</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form class="user" action="<?= base_url('Famili/editFamilia') ;?>" method="post">
                    <input type="hidden" id="for-id_familia" name="id_familia" value="">
                    <div class="modal-body">
                      <div class="form-group">
                          <label class="lbl-edit">Nama Famili</label>
                          <input type="text" class="form-control form-control-user" id="for-familia" name="familia" value="">
                          <?= form_error('familia', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Nama Famili</th>
                      <th class="text-center">Jumlah Famili</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">Nama Famili</th>
                      <th class="text-center">Jumlah Famili</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($familia as $nama_famili) { ?>
  		                <tr>
		                    <td><?= $nama_famili['familia'] ?></td>
		                    <td class="text-center"><?= $nama_famili['total_herbarium'] ?></td>
		                    <td class="text-center">
		                      <button onclick="editFamilia('<?= $nama_famili['id_familia'] ?>','<?= $nama_famili['familia'] ?>')" class="btn btn-primary">
                            <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Ubah"></i>
                          </button>
		                    </td>
		                  </tr>
		                <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
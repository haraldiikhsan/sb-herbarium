		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Menu Herbarium</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <a href="<?= base_url('Herbarium/addHerbarium') ;?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah Herbarium</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Spesies</th>
                      <th class="text-center">Famili</th>
                      <th class="text-center">Morfologi</th>
                      <th class="text-center">Tanggal koleksi</th>
                      <th class="text-center">Kolektor</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">Spesies</th>
                      <th class="text-center">Famili</th>
                      <th class="text-center">Morfologi</th>
                      <th class="text-center">Tanggal koleksi</th>
                      <th class="text-center">Kolektor</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($herbarium as $nama_herbarium) { ?>
                        <tr>
                          <td>
                            <?php $nama_herbarium['species'] = explode(' ', $nama_herbarium['species'], 3);
                              foreach ($nama_herbarium['species'] as $key => $value){
                                if($key<2){
                            ?>
                                <i><?= $value ?></i>
                              <?php } 
                                else{
                              ?>
                                <?= $value ?>
                            <?php } 
                              }
                            ?> 
                          </td>
                          <td><?= $nama_herbarium['familia'] ?></td>
                          <td><?= $nama_herbarium['leaf_morphology'] ?></td>
                          <td class="text-center"><?= $nama_herbarium['collection_date'] ?></td>
                          <td><?= $nama_herbarium['collector'] ?></td>
                          <td class="text-center">
                              <button data-toggle="modal" data-target="#viewHerbModal" id="<?= $nama_herbarium['id_herbarium'] ?>" class="btn btn-info view_data">
                                <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Lihat"></i>
                              </button>
                              <a href="<?= base_url('Herbarium/editHerbarium/'.$nama_herbarium['id_herbarium']) ;?>" class="btn btn-primary">
                                <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Ubah"></i>
                              </a>
                              <button onclick="deleteHerbariumConfirm('<?php echo site_url('Herbarium/deleteHerbarium/'.$nama_herbarium['id_herbarium'].'/'.$nama_herbarium['id_familia']) ?>')" class="btn btn-danger">
                                <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
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

        <!-- View Modal-->
        <div class="modal fade" id="viewHerbModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Herbarium</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="viewHerbById"></div> 
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>              
              </div>
            </div>
          </div>
        </div>

        <!-- Delete Herbarium Modal-->
        <div class="modal fade" id="deleteHerbariumModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Data yang dihapus tidak dapat dikembalikan. Klik tombol "Hapus" jika anda yakin untuk menghapus Herbarium ini.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="delete-herbarium" class="btn btn-primary" href="#">Hapus</a>
              </div>
            </div>
          </div>
        </div>
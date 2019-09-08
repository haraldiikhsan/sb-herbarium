        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hasil Pencarian</h1>
          </div>
            <!-- Foreach Data Herbarium -->
            <?php
              if(count($herbarium)>0){
            ?>
                <!-- Content Row -->
                <div class="row">
            <?php
                  foreach ($herbarium as $data) { 
            ?>
                    <!-- Content Column -->
                    <div class="col-lg-4 mb-4">
                      <!-- Illustrations -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">
                            <?php $data['species'] = explode(' ', $data['species'], 3);
                              foreach ($data['species'] as $key => $value){
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
                          </h6>
                        </div>
                        <div class="card-body">
                          <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem; height: 20rem; object-fit: cover;" src="<?php echo base_url('assets/images/herbarium/'.$data['herbarium_pic']) ?>" alt="">
                          </div>
                          <table class="">
                            <tr>
                              <td>Genus</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td><i><?= $data['genus'] ?></i></td>
                            </tr>
                            <tr>
                              <td>Famili</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td><?= $data['familia'] ?></td>
                            </tr>
                            <tr>
                              <td>Nama Lokal</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td><?= $data['local_name'] ?></td>
                            </tr>
                            <tr>
                              <td>Tipe Habitat</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td class="text-dot"><?= $data['habitat_type'] ?></td>
                            </tr>
                            <tr>
                              <td>Morfologi</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td><?= $data['leaf_morphology'] ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal Koleksi</td>
                              <td class="px-3 px-sm-4">:</td>
                              <td><?= $data['collection_date'] ?></td>
                            </tr>
                          </table>
                          <button class="btn btn-primary btn-user btn-block mt-2 view_data" data-toggle="modal" data-target="#viewHerb" id="<?= $data['id_herbarium'] ?>" class="mt-3 btn btn-primary btn-user btn-block">
                            Lihat &rarr;
                          </button>
                        </div>
                      </div>
                    </div>
            <?php   
                  }
            ?>
                </div>
                <div class="text-center">
                  <?php 
                    echo $pagination;
                  ?>
                </div>
            <?php
              }
              else{
            ?>
                <!-- 404 Error Text -->
                <div class="text-center mb-5">
                  <div class="error mx-auto" data-text="404">404</div>
                  <p class="lead text-gray-800 mb-5">Data Tidak Ditemukan</p>
                  <a href="<?= base_url('') ?>">&larr; Kembali ke Halaman Utama</a>
                </div>
            <?php
              }
            ?>

        </div>
        <!-- /.container-fluid -->

        <!-- View Modal-->
        <div class="modal fade" id="viewHerb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
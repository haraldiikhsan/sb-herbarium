		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Menu Herbarium</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Herbarium</h6>
              </div>
            </div>
            <div class="card-body">
              <!-- Form Add Herbarium -->
              <form class="user" action="<?= base_url('Herbarium/saveHerbarium') ;?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user font-italic" id="species" name="species" placeholder="Nama Spesies">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user font-italic" id="genus" name="genus" placeholder="Nama Genus">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                      <i class="fas fa-caret-down fa-sm dropdown-icon mr-2"></i>
                      <select name="id_familia" class="form-control form-select" id="id_familia">
                        <option selected disabled>Nama Famili</option>
                        
                        <?php foreach ($familia as $nama_famili) { ?>

                        <option value="<?= $nama_famili['id_familia'] ?>"> <?= $nama_famili['familia'] ?> </option>

                        <?php } ?>

                      </select>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="local_name" name="local_name" placeholder="Nama Lokal">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <textarea type="text" rows=3 id="leaf_morphology" name="leaf_morphology" class="form-control form-control-user form-area" placeholder="Morfologi"></textarea>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="habitat_type" name="habitat_type" placeholder="Tipe Habitat">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="collection_num" name="collection_num" placeholder="No Koleksi">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input class="form-control form-control-user" id="collection_date" name="collection_date" placeholder="Tanggal Koleksi">
                        <label class="lbl-info mb-0 mt-1 ml-1">Contoh : 17 Agustus 1945</label>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xl-6 col-md-12">
                          <div class="text-center">
                            <label style="display: block;">Gambar Herbarium</label>
                            <img class="img-input" id="preview_herbarium_image" src="<?= base_url('assets/images/default.jpg') ?>">
                            <input type="file" name="herbarium_image" class="img-btn mt-2" id="herbarium_image" onchange="previewImage(1);">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                          <div class="text-center">
                            <label style="display: block;">Gambar Tegakan Pohon</label>
                            <img class="img-input" id="preview_real_image" src="<?= base_url('assets/images/default.jpg') ?>"> 
                            <input type="file" name="real_image" class="img-btn mt-2" id="real_image" onchange="previewImage(2);">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <textarea type="text" rows=3 id="location" name="location" class="form-control form-control-user form-area" placeholder="Lokasi"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-user" id="coordinate" name="coordinate" placeholder="Titik Koordinat">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="collector" name="collector" placeholder="Kolektor">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="identifier" name="identifier" placeholder="Identifikator">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-12">
                    <div class="form-group">
                        <textarea type="text" rows="3" id="notes" name="notes" class="form-control form-control-user form-area" placeholder="Catatan Lain"></textarea>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12">

                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
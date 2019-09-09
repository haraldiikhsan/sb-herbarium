		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Menu Herbarium</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Herbarium</h6>
              </div>
            </div>
            <div class="card-body">
              <!-- Form Add Herbarium -->
              <form class="user" action="<?= base_url('Herbarium/updateHerbarium') ;?>" method="post" enctype="multipart/form-data">
                <?php foreach ($herbarium as $nama_herbarium) { ?>
                  <div class="row">
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                        <label class="lbl-edit">Nama Spesies</label>
                          <input type="text" class="form-control form-select font-italic" id="species" name="species" placeholder="Nama Spesies" value="<?= $nama_herbarium['species'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Nama Genus</label>
                          <input type="text" class="form-control form-control-user font-italic" id="genus" name="genus" placeholder="Nama Genus" value="<?= $nama_herbarium['genus'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                        <label class="lbl-edit">Nama Famili</label>
                        <i class="fas fa-caret-down fa-sm dropdown-icon mr-2 mt-4"></i>
                        <select name="id_familia" class="form-control form-select" id="id_familia">
                          <option disabled>Nama Famili</option>
                          
                          <?php foreach ($familia as $nama_famili) { ?>

                          <option <?= $nama_famili['id_familia'] == $nama_herbarium['id_familia'] ? 'selected' : '' ?> value="<?= $nama_famili['id_familia'] ?>"> <?= $nama_famili['familia'] ?> </option>

                          <?php } ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Nama Lokal</label>
                          <input type="text" class="form-control form-control-user" id="local_name" name="local_name" placeholder="Nama Lokal" value="<?= $nama_herbarium['local_name'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Morfologi</label>
                          <textarea type="text" rows=3 id="leaf_morphology" name="leaf_morphology" class="form-control form-control-user form-area" placeholder="Morfologi"><?= $nama_herbarium['leaf_morphology'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Tipe Habitat</label>
                          <input type="text" class="form-control form-control-user" id="habitat_type" name="habitat_type" placeholder="Tipe Habitat" value="<?= $nama_herbarium['habitat_type'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">No Koleksi</label>
                          <input type="text" class="form-control form-control-user" id="collection_num" name="collection_num" placeholder="No Koleksi" value="<?= $nama_herbarium['collection_num'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Tanggal Koleksi</label>
                          <input class="form-control form-control-user" id="collection_date" name="collection_date" placeholder="Tanggal Koleksi" value="<?= $nama_herbarium['collection_date'] ?>">
                          <label class="lbl-info mb-0 mt-1 ml-1">Contoh : 17 Agustus 1945</label>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-xl-6 col-md-12">
                            <div class="text-center">
                              <label style="display: block;">Gambar Herbarium</label>
                              <img class="img-input" id="preview_herbarium_image" src="<?= base_url('assets/images/herbarium/'.$nama_herbarium['herbarium_pic']) ?>">
                              <input type="file" name="herbarium_image" class="img-btn mt-2" id="herbarium_image" onchange="previewImage(1);">
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-12">
                            <div class="text-center">
                              <label style="display: block;">Gambar Tegakan Pohon</label>
                              <img class="img-input" id="preview_real_image" src="<?= base_url('assets/images/real/'.$nama_herbarium['real_pic']) ?>"> 
                              <input type="file" name="real_image" value="<?= $nama_herbarium['real_pic'] ?>" class="img-btn mt-2" id="real_image" onchange="previewImage(2);">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Lokasi</label>
                          <textarea type="text" rows=3 id="location" name="location" class="form-control form-control-user form-area" placeholder="Lokasi"><?= $nama_herbarium['location'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label class="lbl-edit">Titik Koordinat</label>
                        <input class="form-control form-control-user" id="coordinate" name="coordinate" placeholder="Titik Koordinat" value="<?= $nama_herbarium['coordinate'] ?>">
                    </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Kolektor</label>
                          <input type="text" class="form-control form-control-user" id="collector" name="collector" placeholder="Kolektor" value="<?= $nama_herbarium['collector'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Identifikator</label>
                          <input type="text" class="form-control form-control-user" id="identifier" name="identifier" placeholder="Identifikator" value="<?= $nama_herbarium['identifier'] ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <div class="form-group">
                          <label class="lbl-edit">Catatan Lain</label>
                          <textarea type="text" rows="3" id="notes" name="notes" class="form-control form-control-user form-area" placeholder="Catatan Lain"><?= $nama_herbarium['notes'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                      <input type="hidden" name="id_herbarium" value="<?= $nama_herbarium['id_herbarium'] ?>">
                      <input type="hidden" name="old_herbariumPic" value="<?= $nama_herbarium['herbarium_pic'] ?>">
                      <input type="hidden" name="old_realPic" value="<?= $nama_herbarium['real_pic'] ?>">
                      <input type="hidden" name="old_idFamilia" value="<?= $nama_herbarium['id_familia'] ?>">
                    </div>
                  <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
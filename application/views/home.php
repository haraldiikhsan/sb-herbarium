        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Herbarium Collection</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('img/undraw_posting_photo.svg') ?>" alt="">
                  </div>
                  <h5 class="font-weight-bold mb-2 text-gray-800">Welcome to the Herbarium Collection Database of the Department of Silviculture IPB</h5>
                  <p class="align-justify">The Herbarium collection at Department of Silviculture, Faculty of Forestry, IPB University (Bogor Agricultural University) approximately 500 specimens, collected from all around Indonesia. Specimens are pressed and dried. Department of Silviculture is committed to making this important collection more accessible to botanists and others, wherever they may be, for use in their own projects: particularly in biodiversity, conservation, sustainable development and systematics. To this end we are building an electronic Herbarium Database containing images of the specimens and information taken from their collection labels.</p>
                  <p class="align-justify">The herbarium collection room is located in the 3<sup>rd</sup> Floor of Department of Silviculture, but since 2018, the room is undergoing renovation and the collections are being reorganized. During this period, we would however, gratefully accept gifts (specimen) as usual.</p>
                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Cari Herbarium</h6>
                </div>
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="<?= base_url('Cari') ;?>" method="post">
                    <div class="form-group position-relative">
                      <i class="fas fa-caret-down fa-sm dropdown-icon"></i>
                      <select name="id_familia" class="form-control form-select" id="id_familia">
                        <option selected disabled>Nama Famili</option>
                        
                        <?php foreach ($familia as $nama_famili) { ?>

                        <option value="<?= $nama_famili['id_familia'] ?>"> <?= $nama_famili['familia'] ?> </option>

                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="genus" id="genus" placeholder="Nama Genus">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="species" id="species" placeholder="Nama Species">
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      Cari
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Menu User</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <button data-toggle="modal" data-target="#addUser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Tambah User</button>
              </div>
            </div>
            <!-- Add User Modal-->
            <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form class="user" action="<?= base_url('User/addUser') ;?>" method="post">
                    <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                          <?= form_error('familia', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama">
                          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
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
            <!-- Edit User Modal-->
            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form class="user" action="<?= base_url('User/editUser') ;?>" method="post">
                    <div class="modal-body">
                      <div id="viewUserById"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
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
                      <th class="text-center">Nama Admin</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">Nama Admin</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($user as $nama_user) { ?>
                      <tr>
                        <td><?= $nama_user['name'] ?></td>
                        <td><?= $nama_user['username'] ?></td>
                        <td class="text-center active"><?= $nama_user['is_active'] == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>
                        <td class="text-center">
                          <button data-toggle="modal" data-target="#editUser" id="<?= $nama_user['id_user'] ?>" class="btn btn-primary view_user">
                            <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="top" title="Ubah"></i>
                          </button>
                          <?php if ($nama_user['is_active'] == '1'): ?>
                            <button onclick="banUserConfirm('<?php echo site_url('User/banUser/'.$nama_user['id_user']) ?>')" class="btn btn-danger">
                              <i class="fas fa-ban" data-toggle="tooltip" data-placement="top" title="Blokir"></i>
                            </button>
                          <?php else: ?>
                            <button onclick="activeUserConfirm('<?php echo site_url('User/activeUser/'.$nama_user['id_user']) ?>')" class="btn btn-success">
                              <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="Aktifkan"></i>
                            </button>
                          <?php endif; ?>
                          <button onclick="deleteUserConfirm('<?php echo site_url('User/deleteUser/'.$nama_user['id_user']) ?>')" class="btn btn-danger">
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
        <!-- Ban User Modal-->
        <div class="modal fade" id="banUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Klik tombol "Blokir" jika anda yakin untuk mem-blokir user ini.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="ban-user" class="btn btn-primary" href="#">Blokir</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Active User Modal-->
        <div class="modal fade" id="activeUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Klik tombol "Aktifkan" jika anda yakin untuk mengaktifkan user ini.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="active-user" class="btn btn-primary" href="#">Aktifkan</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete User Modal-->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Klik tombol "Hapus" jika anda yakin untuk menghapus user ini.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="delete-user" class="btn btn-primary" href="#">Hapus</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
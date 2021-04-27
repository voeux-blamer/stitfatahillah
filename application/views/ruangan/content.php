        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Ruangan</h1>
          <!-- DataTales Example -->
          <br>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p align="center">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <p align="center"><a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Tambah Data</a>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Ruangan</th>
                          <th>Keterangan </th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $start = 0;
                      foreach ($data->result_array() as $i) : ?>
                        <tr>
                          <td>
                            <?= ++$start  ?>
                          </td>
                          <td>
                            <?= $i['kode_ruangan'] ?>
                          </td>
                          <td>
                            <?= $i['keterangan'] ?>
                          </td>
                          <td style="text-align:center" width="200px">
                            <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_hapus<?= $i['id'] ?>">Hapus</a>
                            <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_edit<?= $i['id'] ?>">Update</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
            </div>

            <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- ============ MODAL ADD Ruangan =============== -->

          <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newMenuModalLabel">Add Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo base_url(); ?>Pegawai/addRuangan">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Kode Ruangan :</label>
                        <input type="hidden" class="form-control" name="id">
                        <input type="text" class="form-control" name="kode_ruangan" placeholder="Masukan Kode Ruangan " required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Keterangan :</label>
                        <input type="text" class="form-control" name="keterangan" " placeholder=" Masukan Keterangan" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-info">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--END MODAL ADD Ruangan -->



          <!-- ============ MODAL EDIT Ruangan =============== -->
          <?php
          foreach ($data->result_array() as $i) :
            $id = $i['id'];
            $kode = $i['kode_ruangan'];
            $ket = $i['keterangan'];
          ?>
            <div class="modal fade" id="modal_edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="post" action="<?php echo base_url(); ?>Pegawai/updateRuangan">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault02">Kode Ruangan :</label>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                          <input type="text" class="form-control" name="kode_ruangan" value="<?php echo $kode ?>" placeholder="Masukan Kode Ruangan " required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">Keterangan :</label>
                          <input type="text" class="form-control" name="keterangan" value="<?php echo $ket ?>" placeholder="Masukan Keterangan" required>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary" type="submit">Update Form</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
          <!--END MODAL EDIT Ruangan-->

          <!-- ============ MODAL HAPUS Ruangan =============== -->
          <?php
          foreach ($data->result_array() as $i) :
            $id = $i['id'];
            $kode = $i['kode_ruangan'];
            $ket = $i['keterangan'];
          ?>
            <div class="modal fade" id="modal_hapus<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?php echo base_url() . 'Pegawai/deleteRuangan' ?>">
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus Data <b><?php echo $ket; ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!--END MODAL HAPUS Ruangan-->
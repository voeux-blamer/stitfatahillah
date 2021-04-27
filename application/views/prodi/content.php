        <!-- BAGIAN TABLE -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Prodi</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <p align="center"> <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Tambah Data </a>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>No Izin</th>
                        <th>Nama Prodi </th>
                        <th>Ketua Prodi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <?php
                    $start = 0;
                    foreach ($data->result_array() as $i) : ?>
                      <tr>
                        <td>
                          <?= ++$start ?>
                        </td>
                        <td>
                          <?= $i['no_izin'] ?>
                        </td>
                        <td>
                          <?= $i['nama_prodi'] ?>
                        </td>
                        <td>
                          <?= $i['ketua'] ?>
                        </td>
                        <td style="text-align:center" width="200px">
                          <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_hapus<?= $i['prodi_id'] ?>"> Hapus</a>
                          <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_edit<?= $i['prodi_id'] ?>">Update</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>

          <!-- ============ MODAL ADD BARANG =============== -->
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
                  <form method="post" action="<?php echo base_url(); ?>Pegawai/addProdi">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Nama Prodi :</label>
                        <input type="text" class="form-control" name="nama_prodi" placeholder="Masukan Nama Prodi " required>
                        <input type="hidden" class="form-control" name="prodi_id" placeholder="Masukan Prodi Id">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Ketua Prodi :</label>
                        <input type="text" class="form-control" name="ketua" placeholder="Masukan Nama Ketua Prodi" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault04">No Izin :</label>
                        <input type="text" class="form-control" name="no_izin" placeholder="Masukan No Izin" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-info">Submit Form</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--END MODAL ADD BARANG-->



          <!-- ============ MODAL EDIT BARANG =============== -->
          <?php
          foreach ($data->result_array() as $i) :
            $prodi_id = $i['prodi_id'];
            $nama = $i['nama_prodi'];
            $ketua = $i['ketua'];
            $no = $i['no_izin'];
          ?>
            <div class="modal fade" id="modal_edit<?= $prodi_id ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="post" action="<?php echo base_url(); ?>Pegawai/updateProdi">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault02">Nama Prodi:</label>
                          <input type="hidden" class="form-control" name="prodi_id" placeholder="Perbaiki Kode Dosen" value="<?php echo $prodi_id ?>" required>
                          <input type="text" class="form-control" name="nama_prodi" placeholder="Perbaiki NIDN" value="<?php echo $nama ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">Ketua Prodi :</label>
                          <input type="text" class="form-control" name="ketua" placeholder="Masukan Nama Ketua Prodi" value="<?php echo $ketua ?>" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 mb-3">
                          <label for="validationDefault04">No Izin :</label>
                          <input type="text" class="form-control" name="no_izin" placeholder="Masukan No Izin" value="<?php echo $no ?>" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Submit Form</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
          <!--END MODAL EDIT BARANG-->


          <!-- ============ MODAL HAPUS BARANG =============== -->
          <?php
          foreach ($data->result_array() as $i) :
            $prodi_id = $i['prodi_id'];
            $nama = $i['nama_prodi'];
            $ketua = $i['ketua'];
            $no = $i['no_izin'];
          ?>
            <div class="modal fade" id="modal_hapus<?php echo $prodi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?php echo base_url() . 'Pegawai/deleteProdi' ?>">
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus Program Studi <b><?php echo $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="prodi_id" value="<?php echo $prodi_id; ?>">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!--END MODAL HAPUS BARANG-->
    <!-- ============ MODAL ADD MATKUL =============== -->
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
            <form method="post" action="<?php echo base_url(); ?>Pegawai/addMatkul">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="validationDefault02">Kode Matkul :</label>
                  <input type="hidden" name="makul_id">
                  <input type="text" class="form-control" name="kode_makul" id="validationDefault02" placeholder="Masukan Kode Mata Kuliah " required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault01">Nama Matkul :</label>
                  <input type="text" class="form-control" name="nama_makul" id="validationDefault01" placeholder="Masukan Nama Mata Kuliah" required>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6 mb-3">
                  <label for="validationDefault05"> Dosen :</label>
                  <select class="form-control form-control" name="nidn" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach ($tbl_dosen as $row) : ?>
                      <option value="<?php echo $row->nidn ?>"> <?php echo $row->nama_dosen ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault01">SKS :</label>
                  <input type="number" class="form-control" name="sks" id="validationDefault01" placeholder="Masukan SKS" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault02">Semester :</label>
                  <select class="form-control" name="nama_semester" required>
                    <option value="">-- Pilih Semester --</option>
                    <?php foreach ($tbl_semester as $row) : ?>
                      <option value="<?php echo $row->nama_semester ?>"> <?php echo $row->nama_semester ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationDefault05"> Program Studi :</label>
                  <select class="form-control form-control" name="nama_prodi" required>
                    <option value="">-- Pilih Progam Studi --</option>
                    <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                      <option value="<?php echo $row['prodi_id'] ?>"> <?php echo $row['nama_prodi'] ?> </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL ADD MATKUL-->


    <!-- ============ MODAL EDIT MATKUL =============== -->

    <?php
    foreach ($data->result_array() as $i) :
      $id = $i['makul_id'];
      $kode = $i['kode_makul'];
      $nama = $i['nama_makul'];
      $nidn = $i['nidn'];
      $dosen = $i['nama_dosen'];
      $sks = $i['sks'];
      $semester = $i['nama_semester'];
      $prodi = $i['prodi_id'];
      $name_prodi = $i['nama_prodi'];
    ?>
      <div class="modal fade" id="modal_edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newMenuModalLabel">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url(); ?>Pegawai/updateMatkul">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Kode :</label>
                    <input type="hidden" class="form-control" name="makul_id" id="validationDefault01" value="<?php echo $id ?>" required>
                    <input type="text" class="form-control" name="kode_makul" id="validationDefault01" placeholder="Perbaiki Kode " value="<?php echo $kode ?>" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault02">Nama :</label>
                    <input type="text" class="form-control" name="nama_makul" id="validationDefault02" placeholder="Perbaiki Nama " value="<?php echo $nama ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault03">SKS :</label>
                    <input type="number" class="form-control" name="sks" id="validationDefault03" placeholder="Perbaiki SKS" value="<?php echo $sks ?>" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault04">Semester :</label>
                    <select class="form-control form-control" name="nama_semester" required>
                      <option value="semester 1" <?php if ($semester == 'semester 1') {
                                                    echo 'selected';
                                                  } ?>>semester 1 </option>
                      <option value="semester 2" <?php if ($semester == 'semester 2') {
                                                    echo 'selected';
                                                  } ?>>semester 2</option>
                      <option value="semester 3" <?php if ($semester == 'semester 3') {
                                                    echo 'selected';
                                                  } ?>>semester 3</option>
                      <option value="semester 4" <?php if ($semester == 'semester 4') {
                                                    echo 'selected';
                                                  } ?>>semester 4</option>
                      <option value="semester 5" <?php if ($semester == 'semester 5') {
                                                    echo 'selected';
                                                  } ?>>semester 5</option>
                      <option value="semester 6" <?php if ($semester == 'semester 6') {
                                                    echo 'selected';
                                                  } ?>>semester 6</option>
                      <option value="semester 7" <?php if ($semester == 'semester 7') {
                                                    echo 'selected';
                                                  } ?>>semester 7</option>
                      <option value="semester 8" <?php if ($semester == 'semester 8') {
                                                    echo 'selected';
                                                  } ?>>semester 8</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault05">Program Studi : </label>
                    <select class="form-control form-control" name="prodi_id">
                      <option value="<?php echo $prodi ?>"><?php echo $prodi ?> | <?php echo $name_prodi ?> </option>
                      <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                        <option value="<?php echo $row['prodi_id'] ?>"> <?php echo $row['nama_prodi'] ?> </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault03">NIDN Dosen :</label>
                    <select class="form-control form-control" name="nidn">
                      <option><?php echo $nidn ?> | <?php echo $dosen ?></option>
                      <?php foreach ($tbl_dosen as $row) : ?>
                        <option value="<?php echo $row->nidn ?>">
                          <?php echo $row->nidn ?> | <?php echo $row->nama_dosen ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-primary" type="submit">Update form</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

    <!--END MODAL EDIT MATKUL-->

    <!-- ============ MODAL HAPUS MATKUL =============== -->
    <?php
    foreach ($data->result_array() as $i) :
      $id = $i['makul_id'];
      $kode = $i['kode_makul'];
      $nama = $i['nama_makul'];
      $nidn = $i['nidn'];
      $sks = $i['sks'];
      $semester = $i['nama_semester'];
      $prodi = $i['prodi_id'];
    ?>
      <div class="modal fade" id="modal_hapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newMenuModalLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url() . 'Pegawai/deleteMatkul' ?>">
              <div class="modal-body">
                <p>Anda yakin ingin menghapus Matakuliah <b><?php echo $nama; ?></b></p>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="makul_id" value="<?php echo $id; ?>">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-danger" type="submit">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!--END MODAL HAPUS BARANG-->



    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah</h1>
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
                      <th>Kode</th>
                      <th>Nama Matakuliah</th>
                      <th>Program Studi</th>
                      <th>Semester</th>
                      <th>Dosen</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($data->result_array() as $i) : ?>
                    <tr>
                      <td>
                        <?= $i['kode_makul'] ?>
                      </td>
                      <td>
                        <?= $i['nama_makul'] ?>
                      </td>
                      <td>
                        <?= $i['nama_prodi'] ?>
                      </td>
                      <td>
                        <?= $i['nama_semester'] ?>
                      </td>
                      <td>
                        <?= $i['nama_dosen'] ?>
                      </td>
                      <td style="text-align:center" width="200px">
                        <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_hapus<?= $i['makul_id'] ?>">Hapus</a>
                        <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_edit<?= $i['makul_id'] ?>">Update</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
            </div>
        </div>
      </div>

      <!-- End of Main Content -->
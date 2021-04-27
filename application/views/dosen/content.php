        <!-- BAGIAN TABLE -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Dosen</h1>
          <!-- DataTales Example -->
					<?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p align="center"> <a href="<?= base_url('Pegawai/addDosen'); ?>" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Tambah Data</a>
								<div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <thead>
                      <tr>
                        <th width="2%;">No</th>
                        <th>Foto</th>
                        <th>NIY</th>
                        <th>Nama Lengkap</th>
                        <th>Program Studi</th>
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
                          <img src="<?= base_url() ?>./uploads/profile_dosen/<?= $i['image'] ?>" style="height:100px; width:100px;">
                        </td>
                        <td>
                          <?= $i['nidn'] ?>
                        </td>
                        <td>
                          <?= $i['nama_dosen'] ?>
                        </td>
                        <td>
                          <?= $i['nama_prodi'] ?>
                        </td>
                        <td style="text-align:center" width="200px">
                          <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_hapus<?= $i['nidn'] ?>"> Hapus</a>
                          <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_edit<?= $i['nidn'] ?>">Update</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>




          <!-- ============ MODAL ADD DOSEN =============== -->
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
                  <form method="post" action="<?php echo base_url(); ?>Pegawai/addDosen"  enctype="multipart/form-data">
									<div class="text-center">
										<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
										<h6>Upload a different photo...</h6>
										<input type="file" name="profile" class="text-center center-block file-upload">
									</div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault02">NIY :</label>
                        <input type="hidden" class="form-control" name="kd_dosen">
                        <input type="text" class="form-control" name="nidn" id="validationDefault02" placeholder="Masukan NIY " required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Nama Lengkap : </label>
                        <input type="text" class="form-control" name="nama_dosen" id="validationDefault03" placeholder="Masukan Nama Lengkap" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault03">TMT : </label>
                        <input type="date" class="form-control" name="tmt" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="validationDefault04">Program Studi :</label>
                        <select class="form-control form-control" name="prodi_id" required>
                          <option value="">-- Pilih Progam Studi --</option>
                          <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                            <option value="<?php echo $row['prodi_id'] ?>"> <?php echo $row['nama_prodi'] ?> </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
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
          <!--END MODAL ADD DOSEN-->



          <!-- ============ MODAL EDIT DOSEN =============== -->

          <?php
          foreach ($data->result_array() as $i) :
            $kd_dosen = $i['kd_dosen'];
            $nidn = $i['nidn'];
            $nama_dosen = $i['nama_dosen'];
            $tmt = $i['TMT'];
            $img = $i['image'];
            $prodi = $i['prodi_id'];
            $nama_prodi = $i['nama_prodi'];
          ?>
            <div class="modal fade" id="modal_edit<?php echo $nidn; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="post" action="<?php echo base_url(); ?>Pegawai/updateDosen" enctype="multipart/form-data">
										<div class="text-center">
											<img src="<?= base_url() ?>./uploads/profile_dosen/<?= $img ?>" class="avatar img-circle img-thumbnail" alt="avatar">
											<input type="hidden" class="form-control"  name="old_profile" value="<?= $img ?>">
										<h6>Upload a different photo...</h6>
										<input type="file" name="profile" class="text-center center-block file-upload">
									</div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault02">NIY :</label>
                          <input type="hidden" class="form-control" value="<?= $kd_dosen ?>" name="kd_dosen">
                          <input type="text" class="form-control" name="nidn" value="<?= $nidn ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">Nama Lengkap : </label>
                          <input type="text" class="form-control" name="nama_dosen" value="<?= $nama_dosen ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault03">TMT : </label>
                          <input type="date" class="form-control" value="<?= $tmt ?>" name="tmt" required>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationDefault04">Program Studi :</label>
                          <select class="form-control form-control" name="prodi_id" required>
                            <option value="<?= $prodi ?>"><?= $prodi ?> | <?= $nama_prodi ?></option>
                            <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                              <option value="<?php echo $row['prodi_id'] ?>"> <?php echo $row['nama_prodi'] ?> </option>
                            <?php endforeach; ?>
                          </select>
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
          <!--END MODAL EDIT DOSEN-->
          <!-- ============ MODAL HAPUS DOSEN =============== -->
          <?php
          foreach ($data->result_array() as $i) :
            $kd_dosen = $i['kd_dosen'];
            $nidn = $i['nidn'];
            $nama_dosen = $i['nama_dosen'];
          ?>
            <div class="modal fade" id="modal_hapus<?php echo $nidn; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?php echo base_url() . 'Pegawai/hapusDosen' ?>">
                    <div class="modal-body">
                      <p>Anda yakin ingin menghapus Dosen <b><?php echo $nama_dosen; ?></b></p>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="nidn" value="<?php echo $nidn; ?>">
                      <input type="hidden" name="nama_dosen" value="<?php echo $nama_dosen; ?>" >
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!--END MODAL HAPUS DOSEN -->
 							<script>
						$(document).ready(function() {
									var readURL = function(input) {
											if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
															$('.avatar').attr('src', e.target.result);
													}
									
													reader.readAsDataURL(input.files[0]);
											}
									}
									

									$(".file-upload").on('change', function(){
											readURL(this);
									});
							});
							</script>

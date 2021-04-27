    <!-- ============ MODAL ADD Mahasiswa =============== -->
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
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Biodata Mahasiswa</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
    </div>
    <div class="row">
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link active" role="tab" data-toggle="tab" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#messages">Data Orang Tua</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#doc">Document</a></li>
              </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form method="post" action="<?php echo base_url(); ?>Pegawai/savemhs" enctype="multipart/form-data">
									<div class="text-center">
										<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
										<h6>Upload a different photo...</h6>
										<input type="file" name="profile" class="text-center center-block file-upload" >
									</div></hr><br>  
									<div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nim </h4></label>
                              <input type="text" class="form-control" name="nim" placeholder="Nama Lengkap"  required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama Mahasiswa </h4></label>
														 <input type="hidden" class="form-control" name="id_mahasiswa">
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"  required>
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
													<label for="last_name"><h4>Tempat / Tanggal Lahir </h4></label>
													 <div class="row">
														<div class="col">
															<input type="text" name="tempat" class="form-control" placeholder="Tempat" required>
														</div>/
														<div class="col">
															<input type="date" name="date" class="form-control" required>
														</div>
													</div>   
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Jenis Kelamin </h4></label><br>
                            <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" value="laki-laki" required>
																<label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" id="inlineRadio2" value="perempuan" required>
																<label class="form-check-label" for="inlineRadio2">Perempuan</label>
															</div>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Alamat</h4></label>
                              <textarea name="alamat" class="form-control" id="" style="height:100px;" cols="30" rows="10"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label><h4>Asal Sekolah</h4></label>
                              <input type="text" class="form-control" name="asal_sekolah"  placeholder="Asal Sekolah">
                          </div>
                      </div>
											<div class="row">
											<div class="col-md-6 mb-3">
												<label for="validationDefault03">Angkatan :</label>
												<input type="text" class="form-control" name="angkatan" id="validationDefault03" placeholder="Masukan Angkatan" required>
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
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="far fa-check-circle"></i> Save</button>
                               	<button class="btn btn-lg btn-warning" type="reset"><i class="fas fa-undo"></i> Reset</button>
                            </div>
                      </div>
              <hr>  
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">    
               <h2></h2> 
               <hr>
                      <div class="form-group">    
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nama Orang Tua Bapak / Ibu</h4></label>
                              <input type="text" class="form-control" name="nama_ortu" id="first_name" placeholder="Nama Orang Tua" required>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="far fa-check-circle"></i> Save</button>
                               	<button class="btn btn-lg btn-warning" type="reset"><i class="fas fa-undo"></i> Reset</button>
																 <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              </div>
							<div class="tab-pane" id="doc">    
               <h2></h2> 
               <hr>
                      <div class="form-group">    
                          <div class="text-center">
													<h1>Ijazah</h1>
										<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="doc img-circle img-thumbnail" alt="avatar">
										<h6>Upload a different photo...</h6>
										<input type="file" name="doc" class="text-center center-block file-upload-doc">
									</div></hr><br> 
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="far fa-check-circle"></i> Save</button>
                               	<button class="btn btn-lg btn-warning" type="reset"><i class="fas fa-undo"></i> Reset</button>
																 <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>

              	</form>
              </div>
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
							$(document).ready(function() {
									var readURL = function(input) {
											if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
															$('.doc').attr('src', e.target.result);
													}
									
													reader.readAsDataURL(input.files[0]);
											}
									}
									

									$(".file-upload-doc").on('change', function(){
											readURL(this);
									});
							});
				 </script>
              </div><!--/tab-pane-->
						</div>
						</div>
						</div>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL ADD MAHASISWA-->

    <?php
    foreach ($data->result_array() as $i) :
      $nim = $i['nim'];
      $id = $i['id_mahasiswa'];
      $nama = $i['nama_mahasiswa'];
      $tempat = $i['tempat'];
      $jk = $i['jk'];
      $ijazah = $i['ijazah'];
      $asal = $i['asal_sekolah'];
      $ortu = $i['nama_ortu'];
      $alamat = $i['alamat'];
      $angkatan = $i['angkatan'];
      $date = $i['date'];
      $email = $i['email'];
      $angkatan = $i['angkatan'];
      $prodi = $i['nama_prodi'];
      $prodi_id = $i['prodi_id'];
      $img = $i['image'];
    ?>
     <div class="modal fade" id="modal_edit<?php echo $nim ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newMenuModalLabel">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="card-body">
            <div class="container bootstrap snippet">
						<div class="row">
							<div class="col-sm-10"><h1>Biodata Mahasiswa</h1></div>
							<div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
						</div>
						<div class="row">
							<div class="col-sm-9">
									<div class="tab-content">
										<div class="tab-pane active" id="home">
												<hr>
													<form method="post" action="<?php echo base_url(); ?>Pegawai/updateMhs" enctype="multipart/form-data">
													<div class="text-center">
														<img src="<?= base_url() ?>./uploads/profile_mhs/<?= $img ?>" class="avatar img-circle img-thumbnail" alt="avatar">
														<input type="hidden" class="form-control"  name="old_profile" value="<?= $img ?>">
														<h6>Upload a different photo...</h6>
														<input type="file" name="profile" class="text-center center-block file-upload" >
													</div>
													</hr><br>
													<div class="form-group">    
                          <div class="text-center">
													<h1>Ijazah</h1>
														<img src="<?= base_url() ?>./uploads/profile_mhs/<?= $ijazah ?>" class="doc img-circle img-thumbnail" alt="avatar">
														<input type="hidden" class="form-control"  name="old_doc" value="<?= $ijazah ?>">
														<h6>Upload a different photo...</h6>
														<input type="file" name="doc" class="text-center center-block file-upload-doc">
													</div>  
													<div class="form-group">
                          <div class="col-xs-6">
													<br>
                          
                              <input type="hidden" class="form-control" name="nim" placeholder="Nama Lengkap" value="<?php echo $nim ?>" required>
                          </div>
                      </div>
											
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama Mahasiswa </h4></label>
														 <input type="hidden" class="form-control" name="id_mahasiswa" value="<?php echo $id ?>">
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama ?>" required>
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
													<label for="last_name"><h4>Tempat / Tanggal Lahir </h4></label>
													 <div class="row">
														<div class="col">
															<input type="text" name="tempat" value="<?php echo $tempat ?>" class="form-control" placeholder="Tempat">
														</div>/
														<div class="col">
															<input type="date" name="date" value="<?php echo $date ?>" class="form-control">
														</div>
													</div>   
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Jenis Kelamin </h4></label><br>
                            <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" value="laki-laki" <?php if($jk =='laki-laki'){ echo 'checked';} ?> required>
																<label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" id="inlineRadio2" value="perempuan" <?php if($jk =='perempuan'){ echo 'checked';} ?> required>
																<label class="form-check-label" for="inlineRadio2">Perempuan</label>
															</div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $email ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Alamat</h4></label>
                              <textarea name="alamat" class="form-control" id="" style="height:100px;" cols="30" rows="10"><?php echo $alamat ?></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label><h4>Asal Sekolah</h4></label>
                              <input type="text" class="form-control" name="asal_sekolah"  placeholder="Asal Sekolah" value="<?php echo $asal?>">
                          </div>
                      </div>
											<div class="row">
											<div class="col-md-6 mb-3">
												<label for="validationDefault03">Angkatan :</label>
												<input type="text" class="form-control" name="angkatan" id="validationDefault03" placeholder="Masukan Angkatan" value="<?php echo $angkatan ?>" required>
											</div>
											<div class="col-md-6 mb-3">
												<label for="validationDefault04">Program Studi :</label>
												<select class="form-control form-control" name="prodi_id" required>
													<option value="<?php echo $prodi_id ?>"><?php echo $prodi ?> | <?php echo $prodi_id ?></option>
													<?php foreach ($tbl_prodi->result_array() as $row) : ?>
														<option value="<?php echo $row['prodi_id'] ?>"><?php echo $row['prodi_id'] ?> | <?php echo $row['nama_prodi'] ?> </option>
													<?php endforeach; ?>
												</select>
											</div>
											</div> 
             </div><!--/tab-pane--> 
                      <div class="form-group">    
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nama Orang Tua Bapak / Ibu</h4></label>
                              <input type="text" class="form-control" name="nama_ortu" id="first_name" value="<?= $ortu ?>" placeholder="Nama Orang Tua" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="far fa-check-circle"></i> Save</button>
                               	<button class="btn btn-lg btn-warning" type="reset"><i class="fas fa-undo"></i> Reset</button>
																 <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>
							</div>
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
							$(document).ready(function() {
									var readURL = function(input) {
											if (input.files && input.files[0]) {
													var reader = new FileReader();

													reader.onload = function (e) {
															$('.doc').attr('src', e.target.result);
													}
									
													reader.readAsDataURL(input.files[0]);
											}
									}
									

									$(".file-upload-doc").on('change', function(){
											readURL(this);
									});
							});
				 </script>
           </div><!--/tab-pane-->
						</div>
						</div>
						</div>
          </div>
        </div>
      </div>
     
				
    <?php endforeach; ?>

    <!--END MODAL EDIT MAHASISWA-->

    <!-- ============ MODAL HAPUS MAHASISWA =============== -->
    <?php
    foreach ($data->result_array() as $i) :
      $nim = $i['nim'];
      $nama = $i['nama_mahasiswa'];
      $angkatan = $i['angkatan'];
      $prodi = $i['prodi_id'];
      $img = $i['image'];
    ?>
      <div class="modal fade" id="modal_hapus<?php echo $nim; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newMenuModalLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo base_url() . 'Pegawai/deleteMahas' ?>">
              <div class="modal-body">
                <p>Anda yakin ingin menghapus Mahasiswa <b><?php echo $nama; ?></b></p>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="nim" value="<?php echo $nim; ?>">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-danger" type="submit">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>




    <!--END MODAL HAPUS MAHASISWA-->
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
      <!-- DataTales Example -->
			<?= $this->session->flashdata('message'); ?>
      <div class="card shadow mb-4">
        <div class="card-body">
          <p align="center"> <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus"></i> Tambah Data</a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Foto</th>
                    <th>Nama Mahasiswa</th>
                    <th>Angkatan</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php foreach ($data->result_array() as $i) : ?>
                  <tr>
                    <td>
                      <?= $i['nim'] ?>
                    </td>
                    <td>
                      <img src="<?= base_url() ?>./uploads/profile_mhs/<?= $i['image'] ?>" style="height:75px; width:75px;">
                    </td>
                    <td>
                      <?= $i['nama_mahasiswa'] ?>
                    </td>
                    <td>
                      <?= $i['angkatan'] ?>
                    </td>
                    <td>
                      <?= $i['nama_prodi'] ?>
                    </td>
                    <td>
                      <?php
                      $status = $i['status'];
                      if ($status == 1) { ?>
                        <a href="update_status?sid=<?php echo $i['id_mahasiswa']; ?>&sval=<?php echo $i['status']; ?>" class="btn btn-outline-success"> Lunas </a>
                      <?php
                      } else {
                      ?>
                        <a href="update_status?sid=<?php echo $i['id_mahasiswa']; ?>&sval=<?php echo $i['status']; ?>" class="btn btn-outline-danger"> Belum Lunas </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td style="text-align:center" width="200px">
                      <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_hapus<?= $i['nim']; ?>">Hapus</a>
                      <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_edit<?= $i['nim']; ?>">Update</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>

      <!-- End of Main Content -->

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
<hr>
<form method="post" action="<?php echo base_url(); ?>Mahasiswa/updateMhs" enctype="multipart/form-data">
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Biodata Mahasiswa</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
      <div class="text-center">
        <img src="<?= base_url() ?>./uploads/profile_mhs/<?= $img ?>" class="avatar img-circle img-thumbnail" alt="avatar">
				<input type="hidden" class="form-control"  name="old_profile" value="<?= $img ?>">
        <h6>Upload a different photo...</h6>
        <input type="file" name="profile" class="text-center center-block file-upload">
      </div></hr><br>  
          <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body"><a href="#"></a>
						 <div class="text-center">
						 <h1>Ijazah</h1>
							<img src="<?= base_url() ?>./uploads/profile_mhs/<?= $ijazah ?>" class="doc img-circle img-thumbnail" alt="avatar">
							<input type="hidden" class="form-control"  name="old_doc" value="<?= $ijazah ?>">
							<h6>Upload a different photo...</h6>
							<input type="file" name="doc" class="text-center center-block file-upload-doc">
						</div></hr><br>
						</div>
          </div>
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link active" role="tab" data-toggle="tab" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#messages">Data Orang Tua</a></li>
              </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
									 <div class="form-group">
                          <div class="col-xs-6">
                              <input type="hidden" class="form-control" name="nim" placeholder="Nama Lengkap" value="<?php echo $nim ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama Mahasiswa </h4></label>
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama?>">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
													<label for="last_name"><h4>Tempat / Tanggal Lahir </h4></label>
													 <div class="row">
														<div class="col">
															<input type="text" name="tempat" class="form-control" placeholder="Tempat" value="<?php echo $tempat ?>">
														</div>/
														<div class="col">
															<input type="date" name="date" class="form-control" value="<?php echo $date ?>">
														</div>
													</div>   
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Jenis Kelamin </h4></label><br>
                            <div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" value="laki-laki" <?php if($jk =='laki-laki'){ echo 'checked';} ?>>
																<label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio" name="jk[]" id="inlineRadio2" value="perempuan" <?php if($jk =='perempuan'){ echo 'checked';} ?>>
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
                              <input type="text" class="form-control" name="asal_sekolah"  placeholder="Asal Sekolah" value="<?php echo $asal ?>">
                          </div>
                      </div>
											<div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Alamat</h4></label>
                              <input type="text" class="form-control" name="angkatan" id="validationDefault03" placeholder="Masukan Angkatan" value="<?php echo $angkatan ?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label><h4>Asal Sekolah</h4></label>
                             <select class="form-control form-control" name="prodi_id" required>
															<option value="<?php echo $prodi_id ?>"><?php echo $prodi ?> | <?php echo $prodi_id ?></option>
															<?php foreach ($tbl_prodi->result_array() as $row) : ?>
																<option value="<?php echo $row['prodi_id'] ?>"><?php echo $row['prodi_id'] ?> | <?php echo $row['nama_prodi'] ?> </option>
															<?php endforeach; ?>

												</select>
                      </div>
											</div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"> Update</button>
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
                              <input type="text" class="form-control" name="nama_ortu" id="first_name" placeholder="Nama Orang Tua" value="<?php echo $ortu ?>">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit">Update</button>
																 <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div> 
              </div><!--/tab-pane-->
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
<?php endforeach; ?>

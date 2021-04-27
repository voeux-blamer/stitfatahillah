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
<hr>
<form method="post" action="<?php echo base_url(); ?>Mahasiswa/updateMhs" enctype="multipart/form-data">
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Biodata Dosen</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
      <div class="text-center">
        <img src="<?= base_url() ?>./uploads/profile_dosen/<?= $img ?>" class="avatar img-circle img-thumbnail" alt="avatar">
				<input type="hidden" class="form-control"  name="old_profile" value="<?= $img ?>">
        <h6>Upload a different photo...</h6>
        <input type="file" name="profile" class="text-center center-block file-upload">
      </div></hr><br>  
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="nav-item active"><a class="nav-link active" role="tab" data-toggle="tab" href="#home">Home</a></li>
              </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
									 <div class="form-group">
                          <div class="col-xs-6">
                              <input type="hidden" class="form-control" name="nim" placeholder="Nama Lengkap" value="<?php echo $kd_dosen ?>">
                          </div>
                      </div>
					  <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>NIY </h4></label>
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nidn?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama Dosen </h4></label>
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama_dosen?>">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
						  <label for="validationDefault03">TMT : </label>
                          <input type="date" class="form-control" value="<?= $tmt ?>" name="tmt">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                          <label for="validationDefault04">Program Studi :</label>
                          <select class="form-control form-control" name="prodi_id" required>
                            <option value="<?= $prodi ?>"><?= $prodi ?> | <?= $nama_prodi ?></option>
                            <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                              <option value="<?php echo $row['prodi_id'] ?>"> <?php echo $row['nama_prodi'] ?> </option>
                            <?php endforeach; ?>
                          </select>
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
				 </script>
<?php endforeach; ?>

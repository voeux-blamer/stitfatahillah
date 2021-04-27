<?php foreach($tbl_pmb as $s) {
  ?> 
<div class="card-header">
   Form Pendaftaran Online STIT FATAHILLAH
  </div>
<div class="card-body">
<ul class="nav nav-tabs" role="tablist" style="color:black">
<li class="nav-item"> <a class="nav-link active" role="tab" data-toggle="tab" href="#umum">Umum</a> </li>
<li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#mhs">Identitas Mahasiswa</a></li>
<li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#pendidikan">Pendidikan</a></li>
<li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#ortu">Orang Tua</a></li>
</ul>

<div class="tab-content">
<div role="tab-panel" class="tab-pane active" id="umum"> <br>
<form method="post" action="<?php echo base_url(); ?>Pegawai/updatePmb"  enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">No Registrasi :</label>
      <input type="hidden" class="form-control"  min="0" name="id_pmb" value="<?php echo $s->id_pmb ?>">
      <input type="number" class="form-control" placeholder="No Registrasi" name="no_regis" value="<?php echo $s->no_regis ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Program Studi :</label>
      <select class="form-control form-control" name="prodi_id" required>
      <option value="<?php echo $s->prodi_id ?>"><?php echo $s->prodi_id ?> | <?php echo $s->nama_prodi ?></option>
      <?php foreach($tbl_prodi->result_array() as $row):?>
				    	<option value="<?php echo $row['prodi_id']?>"><?php echo $row['nama_prodi']?></option>
			<?php endforeach;?>
      </select>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Pilihan Kelas :</label>
      <div class="form-check" >
      <label class="form-check-label">
       <input class="form-check-input position-static" type="checkbox" name="kelas[]" value="Reguler"<?php if($s->kelas == 'Reguler'){ echo 'checked';} ?>  >
       Reguler</label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-check-input position-static" type="checkbox" name="kelas[]" value="Esktensi" <?php if($s->kelas =='Esktensi'){ echo 'checked';} ?>   >
       Ekstensi</label>
    </div>
    </div>
    <div class="form-group">
    <label for="validationCustom02">Foto Pas 3x4 :</label>
    <div class="col-md-12 mb-3">
    
            <input type="file" name="foto" class="custom-file-input" id="InputFile">
            <input type="hidden" class="form-control"  name="old_foto" value="<?php echo $s->file ?>">
            <label class="custom-file-label" for="customFile"><?php echo $s->file ?></label>

    </div>
    </div>
    </div>
    </div>
    <!-- batas -->
    <div role="tab-panel" class="tab-pane fade" id="mhs"><br>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Nama Lengkap :</label>
      <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $s->nama ?>">
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tempat :</label>
      <input type="text" class="form-control" placeholder="Tempat" name="tempat" value="<?php echo $s->tempat ?>">
    </div>
    <div class="col-md-6 mb-3">
    <label for="validationCustom01">/ Tanggal Lahir "</label>
    <input type="date" class="form-control" name="date" value="<?php echo $s->date?>" >
    </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Jenis Kelamin :</label>
      <div class="form-check" >
      <label class="form-check-label">
       <input class="form-check-input position-static"  name="jk[]" type="radio"  value="Pria"  <?php if($jk =='Pria'){ echo 'checked';} ?>>
       Pria</label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-check-input position-static"  name="jk[]" type="radio"  value="Wanita" <?php if($jk =='Wanita'){ echo 'checked';}?>>
       Wanita</label>
  </div>
  </div>
  <div class="col-md-6 mb-3">
      <label for="validationCustom03">Status :</label>
      <div class="form-check">
      <label class="form-check-label">
       <input class="form-check-input position-static" name="status[]" type="checkbox"   value="Kawin" <?php if($s->status =='Kawin'){ echo 'checked';} ?>>
       Kawin</label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-check-input position-static" name="status[]" type="checkbox"   value="Belum Kawin" <?php if($s->status =='Belum Kawin'){ echo 'checked';} ?>>
       Belum Kawin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-check-input position-static" name="status[]" type="checkbox"  value="Janda"<?php if($s->status =='Janda'){ echo 'checked';} ?> >
       Janda </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input class="form-check-input position-static" name="status[]" type="checkbox"  value="Duda"<?php if($s->status =='Duda'){ echo 'checked';} ?>>
       Duda</label>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Agama :</label>
      <input type="text" class="form-control"  placeholder="Masukan Agama" name="agama" value="<?php echo $s->agama ?>" >
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Warga Negara :</label>
      <input type="text" class="form-control" placeholder="Masuka Warga Negara" name="warga_negara" value="<?php echo $s->agama ?>">
    </div>
    <div class="col-md-7 mb-3">
    <label for="exampleFormControlTextarea1">Alamat  : </label>
    <textarea class="form-control"  rows="3" name="alamat"><?php echo $s->tempat ?></textarea>
    </div>
    </div>
  </div>
  <!-- batas -->
  <div role="tab-panel" class="tab-pane fade" id="pendidikan"><br>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tingkat Dasar :</label>
      <input type="text" class="form-control" placeholder="Tingkat Dasar" name="sd" value="<?php echo $s->sd?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tahun Lulus :</label>
      <input type="number" class="form-control"  min="0" placeholder="Tahun Lulus" name="lulus_sd" value="<?php echo $s->lulus_sd?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tingkat Menengah :</label>
      <input type="text" class="form-control"  min="0" placeholder="Tingkat Menengah" name="smp"value="<?php echo $s->smp ?>" >
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tahun Lulus :</label>
      <input type="number" class="form-control"  min="0" placeholder="Tahun Lulus" name="lulus_smp" value="<?php echo $s->lulus_smp?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tingkat Atas :</label>
      <input type="text" class="form-control"  placeholder="Tingkat Atas" name="sma" value="<?php echo $s->sma ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tahun Lulus :</label>
      <input type="number" class="form-control"  min="0" placeholder="Tahun Lulus" name="lulus_sma" value="<?php echo $s->lulus_sma ?>" >
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tingkat Tinggi :</label>
      <input type="text" class="form-control"  placeholder="Tingkat Tinggi" name="kuliah" value="<?php echo $s->kuliah ?>" >
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tahun Lulus :</label>
      <input type="number" class="form-control"  min="0" placeholder="Tahun Lulus" name="lulus" value="<?php echo $s->lulus_kuliah ?>">
    </div>
    </div>
  </div>
  <!-- batas -->
  <div role="tab-panel" class="tab-pane fade" id="ortu"><br>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Nama Ayah :</label>
      <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="<?php echo $s->nama_ayah ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Nama Ibu :</label>
      <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" value="<?php echo $s->nama_ibu ?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Usia Ayah:</label>
      <input type="number" class="form-control" min="0" placeholder="Usia Ayah" name="usia_ayah" value="<?php echo $s->usia_ayah ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Usia Ibu :</label>
      <input type="number" class="form-control" min="0" placeholder="Usia Ibu" name="usia_ibu" value="<?php echo $s->usia_ibu ?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Pekerjaan Ayah :</label>
      <input type="text" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" value="<?php echo $s->pekerjaan_ayah ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Pekerjaan Ibu :</label>
      <input type="text" class="form-control"  placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" value="<?php echo $s->pekerjaan_ibu ?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Pendidikan Terakhir Ayah :</label>
      <input type="text" class="form-control"  placeholder="Pendidikan Terakhir Ayah" name="pd_ayah" value="<?php echo $s->pd_ayah ?>" >
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Pendidikan Terakhir Ibu:</label>
      <input type="text" class="form-control"  placeholder="Pendidikan Terakhir Ibu" name="pd_ibu" value="<?php echo $s->pd_ibu ?>">
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Warga Negara Ayah :</label>
      <input type="text" class="form-control"  placeholder="Warga Negara Ayah" name="stat_ayah" value="<?php echo $s->stat_ayah ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Warga Negara  Ibu:</label>
      <input type="text" class="form-control" placeholder="Warga Negara Ibu" name="stat_ibu" value="<?php echo $s->stat_ibu ?>">
    </div>
    <div class="col-md-7 mb-3">
    <label for="exampleFormControlTextarea1">Alamat Orang Tua : </label>
    <textarea class="form-control" rows="3" name="alamat_ortu"><?php echo $s->tempat ?></textarea>
    </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  <?php if(validation_errors() ) :?>
            <?= validation_errors();?>
            <?php endif; ?>
  </form>
 
</div>
  </div>
  <br><br><br><br>
  <?php } ?>

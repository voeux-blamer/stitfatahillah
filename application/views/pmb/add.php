<div class="card-header">
  Form Pendaftaran Online STIT FATAHILLAH
</div>
<div class="card-body">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item"> <a class="nav-link active" role="tab" data-toggle="tab" href="#umum">Umum</a> </li>
    <li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#mhs">Identitas Mahasiswa</a></li>
    <li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#pendidikan">Pendidikan</a></li>
    <li class="nav-item"> <a class="nav-link" role="tab" data-toggle="tab" href="#ortu">Orang Tua</a></li>
  </ul>
  <div class="tab-content">
    <div role="tab-panel" class="tab-pane active" id="umum"> <br>
      <form method="post" action="<?php echo base_url(); ?>Pegawai/saveData" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">No Registrasi :</label>
            <input type="hidden" class="form-control" name="id_pmb">
            <input type="number" class="form-control" placeholder="No Registrasi" min="0" name="no_regis" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom02">Program Studi :</label>
            <select class="form-control form-control" name="prodi_id" required>
              <option value="">-- Pilih Program Studi-- </option>
              <?php foreach ($tbl_prodi->result_array() as $row) : ?>
                <option value="<?php echo $row['prodi_id'] ?>"><?php echo $row['nama_prodi'] ?></option>
              <?php endforeach; ?>
            </select>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom03">Pilihan Kelas :</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input position-static" name="kelas[]" type="checkbox" value="Reguler">
                Reguler</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input class="form-check-input position-static" name="kelas[]" type="checkbox" value="Esktensi">
              Ekstensi</label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-9 mb-3">
              <label for="validationCustom02">Foto Pas 3x4 :</label>
              <div class="col-md-9 mb-3">
                <input type="file" name="foto" class="custom-file-input" id="InputFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- batas -->
    <div role="tab-panel" class="tab-pane fade" id="mhs"><br>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Nama Lengkap :</label>
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">Tempat :</label>
            <input type="text" class="form-control" placeholder="Tempat" name="tempat">
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">/ Tanggal Lahir "</label>
            <input type="date" class="form-control" name="date">
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Jenis Kelamin :</label>
          <div class="form-check" name="jk">
            <label class="form-check-label">
              <input class="form-check-input position-static" type="radio" name="jk[]" value="Pria">
              Pria</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input position-static" type="radio" name="jk[]" value="Wanita">
            Wanita</label>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Status :</label>
          <div class="form-check" name="status">
            <label class="form-check-label">
              <input class="form-check-input position-static" name="status[]" type="checkbox" value="Kawin">
              Kawin</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input position-static" name="status[]" type="checkbox" value="Belum Kawin">
            Belum Kawin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input position-static" name="status[]" type="checkbox" value="Janda">
            Janda </label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-check-input position-static" name="status[]" type="checkbox" value="Duda">
            Duda</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Agama :</label>
          <input type="text" class="form-control" placeholder="Masukan Agama" name="agama">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom02">Warga Negara :</label>
          <input type="text" class="form-control" placeholder="Masukan Warga Negara" name="warga_negara">
        </div>
        <div class="col-md-7 mb-3">
          <label for="exampleFormControlTextarea1">Alamat : </label>
          <textarea class="form-control" rows="3" name="alamat"></textarea>
        </div>
      </div>
    </div>
    <!-- batas -->
    <div role="tab-panel" class="tab-pane fade" id="pendidikan"><br>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tingkat Dasar :</label>
          <input type="text" class="form-control" placeholder="Tingkat Dasar" min="0" name="sd">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tahun Lulus :</label>
          <input type="number" class="form-control" placeholder="Tahun Lulus" min="0" name="lulus_sd">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tingkat Menengah :</label>
          <input type="text" class="form-control" placeholder="Tingkat Menengah" min="0" name="smp">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tahun Lulus :</label>
          <input type="number" class="form-control" placeholder="Tahun Lulus" min="0" name="lulus_smp">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tingkat Atas :</label>
          <input type="text" class="form-control" placeholder="Tingkat Atas" min="0" name="sma">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tahun Lulus :</label>
          <input type="number" class="form-control" placeholder="Tahun Lulus" min="0" name="lulus_sma">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tingkat Tinggi :</label>
          <input type="text" class="form-control" placeholder="Tingkat Tinggi" min="0" name="kuliah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Tahun Lulus :</label>
          <input type="number" class="form-control" placeholder="Tahun Lulus" min="0" name="lulus">
        </div>
      </div>
    </div>
    <!-- batas -->
    <div role="tab-panel" class="tab-pane fade" id="ortu"><br>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Nama Ayah :</label>
          <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Nama Ibu :</label>
          <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Usia Ayah:</label>
          <input type="number" class="form-control" placeholder="Usia Ayah" min="0" name="usia_ayah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Usia Ibu :</label>
          <input type="number" class="form-control" i placeholder="Usia Ibu" min="0" name="usia_ibu">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Pekerjaan Ayah :</label>
          <input type="text" class="form-control" placeholder="Pekerjaan Ayah" name="pekerjaan_ayah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Pekerjaan Ibu :</label>
          <input type="text" class="form-control" placeholder="Pekerjaan Ibu" name="pekerjaan_ibu">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Pendidikan Terakhir Ayah :</label>
          <input type="text" class="form-control" placeholder="Pendidikan Terakhir Ayah" name="pd_ayah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Pendidikan Terakhir Ibu:</label>
          <input type="text" class="form-control" placeholder="Pendidikan Terakhir Ibu" name="pd_ibu">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Warga Negara Ayah :</label>
          <input type="text" class="form-control" placeholder="Warga Negara Ayah" name="stat_ayah">
        </div>
        <div class="col-md-6 mb-3">
          <label for="validationCustom01">Warga Negara Ibu:</label>
          <input type="text" class="form-control" placeholder="Warga Negara Ibu" name="stat_ibu">
        </div>
        <div class="col-md-7 mb-3">
          <label for="exampleFormControlTextarea1">Alamat Orang Tua : </label>
          <textarea class="form-control" rows="3" name="alamat_ortu"></textarea>
        </div>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
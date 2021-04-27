<!-- Begin Page Content -->
<div class="container-fluid">
    <center>
        <legend class="mt-3 text-uppercase"><strong>absensi mahasiswa</strong></legend>
        <table>
            <tr>
                <td>Hari, Tanggal</td>
                <td>: <strong><?= $tanggal ?></strong></td>
            </tr>
            <tr>
                <td>Dosen</td>
                <td>: <?= $this->session->userdata('username') ?></td>
            </tr>
            <tr>
                <td>Mata Kuliah</td>
                <td>: <?= $mahasiswa[0]->nama_makul ?? '' ?></td>                
            </tr>
        </table>
    </center>    
    <!-- Page Heading -->  
    <div class="form-group mt-3">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('dosen/prosesAbsenMhs')?>">
              <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIM</th>
                            <th>Mahasiswa</th>
                            <th>Absen</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$mahasiswa): ?>
                            <tr><td colspan="5"><div class="alert alert-danger text-capitalize text-center">Tidak ada <strong class="text-uppercase">krs</strong> dengan mata kuliah yang dipilih</div></td></tr>
                        <?php endif ?>
                        <?php foreach ($mahasiswa as $m): ?>
                            <tr>
                                <input type="hidden" name="nim[]" value="<?= $m->nim ?>">
                                <input type="hidden" name="kode_makul[]" value="<?= $m->kode_makul ?>">
                                <td><?= $no++ ?></td>
                                <td><?= $m->nim  ?></td>
                                <td><?= $m->nama_mahasiswa  ?></td>                                
                                <td>
                                    <select name="absen[]" class="form-control text-capitalize" required>
                                        <option value="masuk">masuk</option>
                                        <option value="izin">izin</option>
                                        <option value="sakit">sakit</option>
                                        <option value="alfa">alfa</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="keterangan[]" cols="30" class="form-control text-capitalize"></textarea>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if ($mahasiswa): ?>
                    <button class="btn btn-primary" type="submit">Submit</button><br/> <br/>
                <?php endif ?>
            </div>
        </div>
    </form>
</div>

</div>
<!-- /.container-fluid -->

</div>
</div>
  <!-- End of Main Content -->

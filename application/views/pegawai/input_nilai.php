<!-- BAGIAN TABLE -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Input Nilai Matakuliah</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mt-4">
               <thead>
                  <tr>
                     <th width="2%;">No</th>
                     <th>Nama Mahasiswa</th>
                     <th>Nama Matakuliah</th>
                     <th>Nama Prodi</th>
                     <th>Nilai</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (!$matkul) : ?>
                     <tr>
                        <td colspan="5">
                           <div class="alert alert-warning text-center">
                              <small>Maaf! </small>KRS Dengan Kode : <strong><?= $kode_makul ?></strong> pada <strong><?= $semester ?></strong> tidak ada!
                           </div>
                        </td>
                     </tr>
                  <?php endif ?>
                  <?php
                  $start = 0;
                  foreach ($matkul as $m) : ?>
                     <form method="post" action="<?php echo base_url('pegawai/proses_input_nilai') ?>">
                        <tr>
                           <td>
                              <?= ++$start  ?>
                           </td>
                           <td>
                              <?= $m->nama_mahasiswa ?>
                           </td>
                           <td>
                              <?= $m->nama_makul ?>
                           </td>
                           <td>
                              <?= $m->nama_prodi ?>
                           </td>
                           <td width="25px">
                              <input type="hidden" name="krs_id[]" value="<?= $m->krs_id ?>">
                              <input type="text" name="nilai[]" class="form-control text-uppercase" value="<?= $m->nilai ?>">
                           </td>
                        </tr>

                     <?php endforeach; ?>
               </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </div>
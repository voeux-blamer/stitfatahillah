<div class="container-fluid">
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <center>
      <legend class="mt-3"><strong> KARTU HASIL STUDI
        </strong></legend>
      <table>
        <tr>
          <td><strong>NIM Mahasiswa</strong></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['nim']; ?> </td>
        </tr>
        <tr>
          <td><strong>Nama Mahasiswa</strong></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['nama_mahasiswa']; ?> </td>
        </tr>
        <tr>
          <td><strong>Program Studi </strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['nama_prodi']; ?> </td>
        </tr>
        <tr>
          <td><strong>Tahun Angkatan</strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['angkatan']; ?> </td>
        </tr>
        <tr>
          <td><strong>Semester</strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $semester; ?> </td>
        </tr>

      </table>
    </center>
    <br>
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- <p align="center"><a href="<?= base_url(); ?>Mahasiswa/addKrs/<?= $user['nama_mahasiswa']; ?>"  data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-info"><i class="fa fa-plus">
        </i> Tambah Data</a> -->
        <p align="center">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <br>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Nilai</th>
                  <th>Skor</th>
                </tr>
              </thead>
              <?php if (!$khs) : ?>
                <tr>
                  <td colspan="5">
                    <div class="alert alert-warning text-center">Nilai anda pada <strong class="text-capitalize"><?= $semester ?></strong> belum ada! </div>
                  </td>
                </tr>
              <?php endif ?>
              <?php
              $start = 0;
              $jumlahSks = 0;
              $jumlahNilai = 0;
              foreach ($khs as $data) : ?>
                <tr>
                  <td>
                    <?= ++$start  ?>
                  </td>

                  <td>
                    <?= $data->nama_makul ?>
                  </td>
                  <td>
                    <?= $data->sks; ?>
                  </td>
                  <td>
                    <?= $data->nilai ?>
                  </td>
                  <td>
                    <?= skorNilai($data->nilai, $data->sks) ?>
                  </td>
                  <?php
                  $jumlahSks += $data->sks;
                  $jumlahNilai += skorNilai($data->nilai, $data->sks);
                  ?>
                <?php endforeach; ?>
                </tr>
                </tbody>
                <tr>
                  <td colspan="2" align="center"><strong>Jumlah</strong></td>
                  <td><?= $jumlahSks ?></td>
                  <td></td>
                  <td><?= $jumlahNilai ?></td>
                  <?php
                  $max = 10;
                  if ($jumlahSks == 0) {
                  } elseif ($jumlahSks <= $max) {
                    echo $this->session->flashdata('message_success');
                  } else {
                    echo $this->session->flashdata('message_error');
                  }
                  ?>
                </tr>
                <tr>
                  <td colspan="2" align="center"><strong>Index Prestasi Semester (IPS)</strong></td>
                  <td colspan="3" class="text-center"><strong><?= @number_format($jumlahNilai / $jumlahSks, 2) ?></strong></td>
                </tr>
            </table>
            <div class="alert alert-info text-center text-uppercase">Index Prestasi Komulatif (IPK) : <strong><?= $ipk ?></strong></div>
          </div>
      </div>
<!-- End of Main Content -->

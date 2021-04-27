        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Jadwal Kuliah</h1>
          <!-- DataTales Example -->

          <br>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p align="center">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <p align="center"><a href="<?= base_url('Pegawai/addJadwal'); ?>" class="btn btn-outline-info"><i class="fa fa-plus"></i> Tambah Data</a>
                      <thead>
                        <tr>
                          <th>Hari</th>
                          <th>Kode Matkul </th>
                          <th>Mata Kuliah</th>
                          <th>Program Studi </th>
                          <th>Dosen </th>
                          <th>Ruangan </th>
                          <th>Jam Pelajaran</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      foreach ($tbl_jadwal as $data) : ?>
                        <tr>
                          <td>
                            <?= $data->hari ?>
                          </td>
                          <td>
                            <?= $data->kode_makul ?>
                          </td>
                          <td>
                            <?= $data->nama_makul ?>
                          </td>
                          <td>
                            <?= $data->nama_prodi ?>
                          </td>
                          <td>
                            <?= $data->nama_dosen ?>
                          </td>
                          <td>
                            <?= $data->keterangan ?>
                          </td>
                          <td>
                            <?= $data->jam_mulai ?> -
                            <?= $data->jam_selesai ?>
                          </td>

                          <td style="text-align:center" width="200px">
                            <a href="<?= base_url(); ?>Pegawai/deleteJadwal/<?= $data->id_jadwal ?>" class="btn btn-outline-danger" onclick="return confirm('Anda Ingin Menghapus ?');">Hapus</a>
														 <a href="<?= base_url(); ?>Pegawai/editJadwal/<?= $data->id_jadwal ?>" class="btn btn-outline-success">Update</a>
													</td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
          <!-- End of Main Content -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data PMB</h1>
          <!-- DataTales Example -->

          <br>
          <div class="card shadow mb-4">
            <div class="card-body">
              <p align="center">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <p align="center"><a href="<?= base_url('Pegawai/addPmb'); ?>" class="btn btn-outline-info"><i class="fa fa-plus"></i> Tambah Data</a>
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th>No Registrasi</th>
                          <th>Nama </th>
                          <th>Agama </th>
                          <th>Alamat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php foreach ($tbl_pmb as $data) : ?>
                        <tr>
                          <td>
                            <img src="<?= base_url() ?>./upload/profile_mhs/<?= $data['file'] ?>" style="height:75px; width:75px; 
                    border-radius:50%; overflow: hidden;margin: 0 auto;">
                          </td>
                          <td>
                            <?= $data['no_regis'] ?>
                          </td>
                          <td>
                            <?= $data['nama'] ?>
                          </td>
                          <td>
                            <?= $data['agama'] ?>
                          </td>
                          <td>
                            <?= $data['alamat'] ?>
                          </td>
                          <td style="text-align:center" width="200px">
                            <a href="<?= base_url(); ?>Pegawai/deletePmb/<?= $data['id_pmb']; ?>" class="btn btn-outline-danger" onclick="return confirm('Anda Ingin Menghapus ?');">Hapus</a>
                            <a href="<?= base_url(); ?>Pegawai/editPmb/<?= $data['id_pmb']; ?>" class="btn btn-outline-success">Update</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>


          <!-- End of Main Content -->
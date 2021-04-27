<!-- BAGIAN TABLE -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Input Nilai Matakuliah</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="<?php echo base_url('Dosen/input_nilai_aksi'); ?>">
                    <table class="table table-striped table-hover table-bordered mt-4">
                        <br>
                        <thead>
                            <tr>
                                <th width="2%;">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Matakuliah</th>
                                <th>Nama Prodi</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <?php
                        $start = 0;
                        foreach ($data->result_array() as $i) : ?>
                            <tr>
                                <td>
                                    <?= ++$start  ?>
                                </td>
                                <td>
                                    <?= $i['nama_mahasiswa'] ?>
                                </td>
                                <td>
                                    <?= $i['nama_makul'] ?>
                                </td>
                                <td>
                                    <?= $i['nama_prodi'] ?>
                                </td>
                                <td width="25px"><input type="text" name="nilai" class="form-control" value="<?= $i['nilai'] ?>"></td>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table><br />
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
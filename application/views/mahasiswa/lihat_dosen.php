<!-- BAGIAN TABLE -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Masuk Lihat <?= $lihat == 'Pilih Dosen' ? 'Pilih Dosen' : 'KRS' ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($lihat == 'Pilih Dosen') : ?>
                <form method="post" action="<?php echo base_url('mahasiswa/lihat_download') ?>">
                <?php else : ?>
                    <form method="post" action="<?php echo base_url('mahasiswa/lihat_download') ?>">
                    <?php endif ?>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Pilih lah Dosen</label>
                            <select name="semester" class="form-control text-capitalize" required="">
                                <option value="" selected="" disabled="">-- Pilih --</option>
                                <?php foreach ($dosen as $i) : ?>
                                    <option value="<?= $i->nidn ?>"><?= $i->nama_dosen ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
        </div>
    </div>
    </div>

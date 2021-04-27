<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pilih Mata Kuliah</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
            <?php endif ?>
            <form method="post" action="<?php echo base_url('dosen/absenMhs') ?>">
                <div class="form-group">
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                         <select class="selectpicker form-control" data-live-search="true" name="kode_makul" class="form-control text-capitalize" required="">
                            <option value="" selected="" disabled="">-- Pilih --</option>
                            <?php foreach ($matakuliah as $makul) : ?>
                                <option value="<?= $makul->kode_makul ?>"><?= $makul->nama_makul ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Absen Baru</button>
            </form>

            <div class="table-responsive mt-3">
                <table class="table table-responsive table-bordered table-striped table-hover table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>NIM</th>
                            <th>Mahasiswa</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Absen</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" action="<?php echo base_url('dosen/editAbsenMhs') ?>">
                            <?php foreach ($absen as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->tanggal ?></td>
                                    <td><?= $a->nim ?></td>
                                    <td><?= $a->nama_mahasiswa ?></td>
                                    <td><?= $a->kode_makul ?></td>
                                    <td><?= $a->nama_makul ?></td>
                                    <td>
                                        <select name="absen[]" class="form-control text-capitalize">
                                            <option selected value="<?= $a->absen ?>"><?= $a->absen ?></option>
                                            <option value="masuk">masuk</option>
                                            <option value="izin">izin</option>
                                            <option value="sakit">sakit</option>
                                            <option value="alfa">alfa</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan[]" cols="40" class="form-control"><?= $a->keterangan ?></textarea>
                                    </td>
                                    <input type="hidden" name="id[]" value="<?= $a->id_absensi ?>">
                                </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-warning">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>

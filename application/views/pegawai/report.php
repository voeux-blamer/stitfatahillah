<!-- BAGIAN TABLE -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Filter Laporan Absensi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
                <?php if ($this->session->flashdata('pesan')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('pesan') ?></div>
                <?php endif ?>         
            <form method="post" action="<?php echo base_url('pegawai/print') ?>">
                <div class="form-group">
                    <div class="form-group">
                        <label>Nama Dosen</label>                        
                        <select class="form-control text-capitalize" required="" id="dosen" data-url="<?= base_url() ?>pegawai/makulByDosen">
                            <option value="" selected="" disabled="">-- Pilih --</option>
                            <?php foreach ($dosen as $d): ?>
                                <option value="<?= $d->nidn ?>"><?= $d->nama_dosen ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>                        
                        <select name="kode_makul" class="form-control text-capitalize" id="makul" required="">
                            <option value="" selected="" disabled="">-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <label>Tanggal Mulai : </label>
                        &nbsp;<input type="date" name="awal" class="form-control">
                        <label>&nbsp;Tanggal Akhir : </label>
                        &nbsp;<input type="date" name="akhir" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" formtarget="_blank">Filter</button>
                    </div>
                    <small class="text-danger text-capitalize">* forrmat tanggal : bulan/tanggal/tahun</small>
            </form>
        </div>
    </div>
</div>

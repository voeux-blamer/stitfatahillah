<!-- BAGIAN TABLE -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Masuk Input Nilai Matakuliah</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
                <?php if ($this->session->flashdata('pesan')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('pesan') ?></div>
                <?php endif ?>            
            <form method="post" action="<?php echo base_url('pegawai/input_nilai') ?>">
                <div class="form-group">
                    <div class="form-group">
                        <label>Tahun Akademik (Semester)</label>                        
                        <select name="semester" class="form-control text-capitalize" required="">
                            <option value="" selected="" disabled="">-- Pilih --</option>
                            <?php foreach ($semester as $semester): ?>
                                <option value="<?= $semester->nama_semester ?>"><?= $semester->nama_semester ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Mata Kuliah</label>
                        <input type="text" name="kode_matkul" class="form-control" placeholder="Masukkan Kode Mata Kuliah" required="">
                    </div>

                    <button type="submit" class="btn btn-primary">Proses</button>
            </form>
        </div>
    </div>
</div>

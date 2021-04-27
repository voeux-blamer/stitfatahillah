<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Form Input
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo base_url(); ?>Pegawai/save_upload" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">

                        <label for="validationDefault02">NIDN :</label>
                        <input type="hidden" class="form-control" name="id">
                        <select class="form-control form-control" name="nidn" required>
                            <option value="">-- Dosen-- </option>
                            <?php foreach ($tbl_dosen as $row) : ?>
                                <option value="<?php echo $row->nidn ?>"><?php echo $row->nama_dosen ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Title : </label>
                        <input type="text" class="form-control" name="title" placeholder="Masukan Judul" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Upload File :</label>
                        <div class="col-md-9 mb-3">
                            <input type="file" name="file" class="custom-file-input" id="InputFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </div>
    </div>
    <!-- ============ MODAL ADD Mahasiswa =============== -->
    <div class="container">
   <h1> Change Password Account</h1>
          <div class="card-body">
          <?= $this->session->flashdata('message_password'); ?>
          <form action="change_password_mhs" method="POST">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username : </label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $user['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password Lama:</label>
                <div class="col-sm-10">
                <input type="password" name="old_password" class="form-control" id="inputPassword">
                <?= form_error('old_password','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru:</label>
                <div class="col-sm-10">
                <input type="password" name="new_password" class="form-control" id="inputPassword">
                <?= form_error('new_password','<small class="text-danger pl-3">','</small>');?>
                </div>
                
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ulangi Password :</label>
                <div class="col-sm-10">
                <input type="password" name="repeat_password" class="form-control" id="inputPassword">
                <?= form_error('repeat_password','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form_group">
            <button type="submit" class="btn btn-primary"> Change Password </button>
            </div>
            </form>
        </div>
    <!-- End of Main Content -->
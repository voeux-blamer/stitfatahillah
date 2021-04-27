<?php foreach($user_menu as $s){ ?>
<div class="container-fluid"><div class="card">
  <div class="card-header">
    Form Update
  </div>
  <div class="card-body">
  <form method="post" action="<?php echo base_url(); ?>Menu/updateMenu">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Nama Prodi:</label>
      <input type="hidden" class="form-control" name="id" value="<?php echo $s->id ?>">
      <input type="text" class="form-control" name="menu"  placeholder="Perbaiki Nama Menu" value="<?php echo $s->menu ?>" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Update Form</button>
  <?php if(validation_errors() ) :?>
            <?= validation_errors();?>
            <?php endif; ?>
  </form>
  </div>
</div>
<?php } ?>
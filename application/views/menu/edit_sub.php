 <?php foreach($user_sub_menu as $s){ ?>
<div class="container-fluid"><div class="card">
  <div class="card-header">
    Form Update
  </div>
  <div class="card-body">
  <form method="post" action="<?php echo base_url(); ?>Menu/updateSubMenu">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Menu :</label>
      <input type="hidden" class="form-control" name="id" value="<?php echo $s->id ?>">
      <select name="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Title :</label>
      <input type="text" class="form-control" name="title"  placeholder="Perbaiki Title" value="<?php echo $s->title ?>" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
    <label for="validationDefault03">Url :</label>
      <input type="text" class="form-control" name="url" placeholder="Perbaiki Sub Menu Url"  value="<?php echo $s->url ?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Icon :</label>
      <input type="text" class="form-control" name="icon"  placeholder="Perbaiki Kode Icon" value="<?php echo $s->icon ?>" required>
    </div>
  </div>
   <div class="row">
    <div class="col-md-6 mb-3">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" type="checkbox" value="1" <?php if($s->is_active == '1'){echo 'checked';} ?> name="is_active">
        <label class="form-check-label" for="is_active">
         Active?
        </label>
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
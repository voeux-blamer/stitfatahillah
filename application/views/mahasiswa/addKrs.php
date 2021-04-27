<script type="text/javascript">
  $(document).ready(function() {
    $('#semester').change(function() {
      var id = $('#semester').val();
      var prodi = $('#prodi').val();
      $.ajax({
        url: "<?php echo site_url('mahasiswa/getSemester'); ?>",
        method: "POST",
        data: {
          'id': id,
          'prodi': prodi
        },
        async: false,
        dataType: 'json',
        success: function(data) {

          var nama = '';

          var i;

          for (i = 0; i < data.length; i++) {

            nama += '<tr><td><input type="checkbox" data-exval=' + data.sks + ' value=' + data[i].makul_id + ' name="pilihan[]" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
              data[i].nama_makul + '</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data[i].kode_makul +
              '</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data[i].sks + '</td>'
          }
          $('#nama').html(nama);


        }
      });
      return false;
    });

  });
</script>
<script type="text/javascript">
  function do_this() {

    var checkboxes = document.getElementsByName('pilihan[]');
    var button = document.getElementById('toggle');
    if (button.value = 'select') {
      for (var i in checkboxes) {
        checkboxes[i].checked = 'FALSE';
      }
      button.value = 'Deselect'
    } else {
      for (var i in checkboxes) {
        checkboxes[i].checked = '';
      }
      button.value = 'Select'
    }
  }
</script>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Form Input
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo base_url(); ?>Mahasiswa/SaveKrs">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="validationDefault01">Nim Mahasiswa :</label>
            <input type="hidden" class="form-control" name="krs_id">
            <?php foreach ($tbl_mahasiswa as $data) : ?>
              <input type="text" class="form-control" name="nim" id="validationDefault01" value="<?= $data['nim'] ?> " readonly />
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault02">Program Studi :</label>
            <input type="text" class="form-control" id="prodi" name="nama_prodi" value="<?= $data['nama_prodi'] ?>" readonly />
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationDefault05">Semester :</label>
            <select class="form-control" name="nama_semester" id="semester" required>
              <option value="">-- Pilih Semester --</option>
              <?php foreach ($tbl_semester as $row) : ?>
                <option value="<?php echo $row->nama_semester ?>"> <?php echo $row->nama_semester ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table" id="list">
            <thead>
              <tr>
                <th>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Mata Kuliah
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;Kode
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;SKS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="nama"></td>
              </tr>
            </tbody>
          </table>
          <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
          <input type="button" class="btn btn-outline-success" id="toggle" value="Select All" onClick="do_this()" />
      </form>
    </div>
  </div>
</div>
</div> <br><br><br><br><br><br><br>
<?php endforeach ?>
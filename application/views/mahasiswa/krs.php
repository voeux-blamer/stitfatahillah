<div class="container-fluid">
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <?= $this->session->flashdata('message') ?>
    <center>
      <legend class="mt-3"><strong> KARTU RENCANA STUDI
        </strong></legend>
      <table>
        <tr>
          <td><strong>Nama Mahasiswa</strong></td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['nama_mahasiswa']; ?> </td>
        </tr>
        <tr>
          <td><strong>Program Studi </strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['nama_prodi']; ?> </td>
        </tr>
        <tr>
          <td><strong>Tahun Angkatan</strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $user['angkatan']; ?> </td>
        </tr>
        <tr>
          <td><strong>Status Administrasi</strong>
          </td>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            <?php
            $status = $user['status'];
            if ($status == 1) { ?>
              <a href="#" class="btn btn-outline-success"> Lunas </a>
            <?php
            } else {
            ?>
              <a href="#" class="btn btn-outline-danger"> Belum Lunas </a>
            <?php
            }
            ?>
          </td>
        </tr>
      </table>
    </center>
    <br>
    <!-- Page Heading -->
    <!-- DataTales Example -->
		<a class="btn btn-success" href="<?php echo base_url("Mahasiswa/exportKrs"); ?>"><i class="fas fa-print"></i>&nbsp;Export ke Excel</a><br><br>
    <div class="card shadow mb-4">
      <div class="card-body">
        <p align="center"><a href="<?= base_url(); ?>Mahasiswa/addKrs/<?= $user['nama_mahasiswa']; ?>" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-info"><i class="fa fa-plus">
            </i> Tambah Data</a>
          <p align="center">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button></th>
                  </tr>
                </thead>
                <?php
                $start = 0;
                $jumlahSks = 0;
                foreach ($tbl_krs as $data) : ?>
                  <tr>
                    <td>
                      <?= ++$start  ?>
                    </td>

                    <td>
                      <?= $data->nama_makul ?>
                    </td>
                    <td>
                      <?= $data->sks;
                      $jumlahSks += $data->sks; ?>
                    </td>
                    <td>
                      <input type="checkbox" class="delete_checkbox" value="<?= $data->krs_id ?>" />
                    </td>
                  <?php endforeach; ?>
                  </tr>
                  </tbody>
                  <tr>
                    <td colspan="3" align="center"><strong>Jumlah SKS</strong></td>
                    <td><?= $jumlahSks ?></td>
                    <?php
                    $max = 10;
                    if ($jumlahSks == 0) {
                    } elseif ($jumlahSks <= $max) {
                      echo $this->session->flashdata('message_success');
                    } else {
                      echo $this->session->flashdata('message_error');
                    }
                    ?>
                  </tr>
              </table>
            </div>

            <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <script>
        $(document).ready(function() {

          $('.delete_checkbox').click(function() {
            if ($(this).is(':checked')) {
              $(this).closest('tr').addClass('removeRow');
            } else {
              $(this).closest('tr').removeClass('removeRow');
            }
          });

          $('#delete_all').click(function() {
            var checkbox = $('.delete_checkbox:checked');
            if (checkbox.length > 0) {
              var checkbox_value = [];
              $(checkbox).each(function() {
                checkbox_value.push($(this).val());
              });
              $.ajax({
                url: "<?php echo base_url(); ?>Mahasiswa/deleteKrs",
                method: "POST",
                data: {
                  checkbox_value: checkbox_value
                },
                success: function() {
                  $('.removeRow').fadeOut(1500);
                }
              })
            } else {
              alert('Select atleast one records');
            }
          });
        });
      </script>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus">&nbsp;</i>Form Input Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#semester').change(function() {
                    var id = $('#semester').val();
                    var prodi = $('#prodi').val();
                    $.ajax({
                      url: "<?php echo site_url('Mahasiswa/getSemester'); ?>",
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
              <script>
                function do_this() {

                  var checkboxes = document.getElementsByName('pilihan[]');
                  var button = document.getElementById('toggle');

                  if (button.value == 'Select') {
                    for (var i in checkboxes) {
                      checkboxes[i].checked = 'FALSE';
                    }
                    button.value = 'Deselect'
                  } else {
                    for (var i in checkboxes) {
                      checkboxes[i].checked = '';
                    }
                    button.value = 'Select';
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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;Kode
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
                        <input type="button" class="btn btn-outline-success" id="toggle" value="Select" onClick="do_this()" />
                    </form>
                  </div>
                </div>
              </div>
            </div><br>
          <?php endforeach ?>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>
    </div>

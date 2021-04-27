<script type="text/javascript">
		$(document).ready(function(){

			$('#matkul').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('Pegawai/getMatkul');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        
                        var kode = '';
                        var nama = '';
                        var nidn = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            kode += '<option value='+data[i].kode_makul+'>'+data[i].kode_makul+'</option>'
                            nama +='<option value='+data[i].prodi_id+'>'+data[i].nama_prodi+'</option>'
                            nidn +='<option value='+data[i].nidn+'>'+data[i].nama_dosen+'</option>'
                        }
                        $('#kode').html(kode);
                        $('#nama').html(nama);
                        $('#nidn').html(nidn);

                    }
                });
                return false;
            }); 
            
		});
	</script>
<div class="container-fluid"><div class="card">
  <div class="card-header">
   Form Input
  </div>
  <div class="card-body">
  <form method="post" action="<?php echo base_url(); ?>Pegawai/addJadwal">
  <div class="row">
    <div class="col-md-6 mb-3">
    <label for="validationDefault01">Hari :</label>
    <input type="hidden" class="form-control" name="id_jadwal">
    <select class="form-control" name="hari" required>
			<option value="">-- Pilih Hari --</option>
            <option value="Senin">- Senin -</option>
            <option value="Selasa">- Selasa -</option>
            <option value="Rabu">- Rabu -</option>
            <option value="Kamis">- Kamis - </option>
            <option value="Jumat">- Jumat -</option>
            <option value="Sabtu">- Sabtu -</option>
            <option value="Minggu">- Minggu -</option>
	  </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Kode Matkul :</label>
      <select class="form-control" id="kode" name="kode_makul" required readonly>
				    	<option value="">No Selected</option>
				    </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
    <label for="validationDefault05">Nama Matkul :</label><br>
    <select class="selectpicker form-control" data-live-search="true" id="matkul" name="nama_makul">
    <?php foreach($tbl_matakuliah as $row):?>
      <option   value="<?php echo $row->nama_makul?>"><?php echo $row->nama_makul?></option>
    <?php endforeach;?>
    </select>
    </div>
    <div class="col-md-6 mb-3">
    <label for="validationDefault05"> Program Studi :</label>
				    <select class="form-control" id="nama" name="prodi_id" required readonly>
				    	<option value="">No Selected</option>
				    </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Ruangan :</label>
      <select class="form-control form-control" name="keterangan" required >
      <option value="">-- Pilih Ruangan -- </option>
      <?php foreach($tbl_ruangan as $row):?>
				    	<option value="<?php echo $row->keterangan?>"><?php echo $row->keterangan?></option>
			<?php endforeach;?>
      </select>
  </div>
    <div class="col-md-6 mb-3">
    <label for="validationDefault02">Dosen:</label>
    <select class="form-control" id="nidn" name="nidn" required  readonly>
				    	<option value="">No Selected</option>
				    </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault01">Mulai Jam :</label>
      <input type="time" class="form-control" name="jam_mulai" id="validationDefault01" placeholder="Masukan Mulai Jam" required>
  </div>
    <div class="col-md-6 mb-3">
    <label for="validationDefault05"> Selesai Jam :</label>
    <input type="time" class="form-control" name="jam_selesai" id="validationDefault01" placeholder="Masukan Selesai Jam" required>
  </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
  </form>
  </div>
</div>


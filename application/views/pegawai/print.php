<style>
.tabel-isi, td, th {
	border: 1px solid black;
	padding: 5px;
	border-collapse: collapse;
	width: 100%;
	text-align: center;
}

th{
	background-color: #00e6e6;						
}

td {
	height: 50px;
}

h1, h3, ul{
	text-align: center;			
}

.not {
	text-align: left;
	vertical-align: middle;	
}

.nama {
	text-align: left;
}

hr { 
	display: block;
	margin-top: 0.5em;
	margin-bottom: 0.5em;
	margin-left: auto;
	margin-right: auto;
	border-style: inset;
	border-width: 1px;
}

.no {
	width: 20%;	
}

.nim {
	width: 40%;	
}

.absen {
	width: 30%;	
}

.ket {
	text-align: left;
}

li {
	list-style-type: none;
}

.info {	
	padding: 1px;	
	width: 40%;
	text-align: left;
	margin: auto;	
}

.info td, .info th {	
	height: 10px;
	text-align: left;
}

.footer {
	color: gray;
	position: fixed;
	bottom: 50px;
	left: 0;
	right: 0;
	z-index: 1;
}

strong {
	display: inline-block;	
	margin-right: 125px;
	text-align: right;
}
</style>

<h1>STIT FATAHILLAH</h1>
<hr>
<h3>Laporan Absensi</h3>
<table class="info">
	<tr>
		<td>Kode Mata Kuliah</td>
		<td>: <?= $data[0]->kode_makul ?? '' ?></td>
	</tr>
	<tr>
		<td>Mata Kuliah</td>
		<td>: <?= $data[0]->nama_makul ?? '' ?></td>
	</tr>
	<tr>
		<td>Dosen</td>
		<td>: <?= $data[0]->nama_dosen ?? '' ?></td>
	</tr>
	<tr>
		<td>SKS</td>
		<td>: <?= $data[0]->sks ?? '' ?></td>
	</tr>
	<tr>
		<td>Semester</td>
		<td>: <?= $data[0]->nama_semester ?? '' ?></td>
	</tr>
</table>
<br>
<table class="tabel-isi">
	<thead>              
		<tr>
			<th class="no">#</th>				
			<th class="nim">NIM</th>				
			<th>Mahasiswa</th>				
			<th class="absen">Masuk</th>
			<th class="absen">Izin</th>
			<th class="absen">Sakit</th>
			<th class="absen">Alfa</th>
			<th class="absen">Pertemuan</th>			
		</tr>
	</thead>
	<tbody>
		<?php if (!$data): ?>
			<tr><td colspan="8"><strong class="not">Tidak Ada Absensi Untuk Mata Kuliah Yang Dipilih</strong></td></tr>
		<?php endif ?>
		<?php foreach ($data as $absen): ?>
			<tr>
				<td class="no"><?= $no++ ?></td>						
				<td class="nim"><?= $absen->nim ?></td>				
				<td class="nama"><?= $absen->nama_mahasiswa ?></td>				
				<td class="absen"><?= $absen->masuk ?></td>								
				<td class="absen"><?= $absen->izin ?></td>								
				<td class="absen"><?= $absen->sakit ?></td>								
				<td class="absen"><?= $absen->alfa ?></td>								
				<td class="absen"><?= $absen->total ?></td>						
			</tr>                  
		<?php endforeach ?>
	</tbody>			
</table>	
<div class="footer">
	<hr>
	<small>STIT FATAHILLAH</small>
	<strong><?= date('D, d M Y H:i:s') ?></strong>
</div>

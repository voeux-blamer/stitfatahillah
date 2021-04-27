<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pegawai extends CI_Model {

	public function getSemester()
	{
		return $this->db->get('tbl_semester');
	}

	public function getMatkul($param)
	{
		$this->db->select('*');
		$this->db->from('tbl_krs');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.makul_id = tbl_krs.makul_id', 'left');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_krs.nim', 'left');
		$this->db->where($param);
		return $this->db->get();
	}

	public function updateNilai($param)
	{
		return $this->db->update_batch('tbl_krs', $param, 'krs_id');
	}

	public function getDosen()
	{
		return $this->db->get('tbl_dosen');
	}

	public function getMatkulByDosen($nidn='')
	{
		return $this->db->get_where('tbl_matakuliah', ['nidn'=>$nidn]);
	}

	public function getReport($kode='',$awal=null,$akhir=null)
	{
		$get = "tbl_absensi.nim,tbl_absensi.kode_makul,tbl_matakuliah.nama_makul,
				tbl_mahasiswa.nama_mahasiswa,tbl_dosen.nama_dosen,
				tbl_matakuliah.nama_semester,tbl_matakuliah.sks,
				SUM(tbl_absensi.absen='masuk') AS masuk,
				SUM(tbl_absensi.absen='izin') AS izin,
				SUM(tbl_absensi.absen='sakit') AS sakit,
				SUM(tbl_absensi.absen='alfa') AS alfa,
				count(tbl_absensi.absen) AS total
		";
		$this->db->select($get);		
		$this->db->from('tbl_absensi');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_absensi.nim', 'left');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.kode_makul = tbl_absensi.kode_makul', 'left');
		$this->db->join('tbl_dosen', 'tbl_dosen.nidn = tbl_matakuliah.nidn', 'left');
		$this->db->group_by(['tbl_absensi.nim','tbl_mahasiswa.nama_mahasiswa',
							 'tbl_dosen.nama_dosen','tbl_matakuliah.nama_semester',
							 'tbl_matakuliah.nama_makul','tbl_matakuliah.sks'
		]);		
		$this->db->where('tbl_absensi.kode_makul', $kode);
		$awal != null ? $this->db->where('tbl_absensi.tanggal >=', $awal):'';
		$akhir != null ? $this->db->where('tbl_absensi.tanggal <=', $akhir):'';
		return $this->db->get();
	}

}

/* End of file M_Pegawai.php */
/* Location: ./application/models/M_Pegawai.php */

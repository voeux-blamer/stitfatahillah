<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Absen extends CI_Model
{

	public function getMakulToAbsen($nidn = '', $kodemakul = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_krs');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.makul_id = tbl_krs.makul_id', 'left');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_krs.nim', 'left');
		$this->db->join('tbl_dosen', 'tbl_dosen.nidn = tbl_matakuliah.nidn', 'left');
		$this->db->where('tbl_matakuliah.kode_makul', $kodemakul);
		$this->db->where('tbl_matakuliah.nidn', $nidn);
		return $this->db->get();
	}

	public function getAbsen($nidn = '')
	{
		$this->db->select('*');
		$this->db->from('tbl_absensi');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.kode_makul = tbl_absensi.kode_makul', 'left');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_absensi.nim', 'left');
		$this->db->join('tbl_dosen', 'tbl_dosen.nidn = tbl_matakuliah.nidn', 'left');
		$this->db->where('tbl_matakuliah.nidn', $nidn);
		return $this->db->get();
	}

	public function getMakul($nidn = '')
	{
		return $this->db->get_where('tbl_matakuliah', ['nidn' => $nidn]);
	}

	public function insertAbsen($data)
	{
		return $this->db->insert_batch('tbl_absensi', $data);
	}

	public function cekAbsen($date = '')
	{
		return $this->db->get_where('tbl_absensi', ['tanggal' => $date]);
	}

	public function cekInsert($param = null)
	{
		return $this->db->get_where('tbl_absensi', $param);
	}

	public function updateAbsen($param = '')
	{
		return $this->db->update_batch('tbl_absensi', $param, 'id_absensi');
	}
}
/* End of file M_Absen.php */
/* Location: ./application/models/M_Absen.php */

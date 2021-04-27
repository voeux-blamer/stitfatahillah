<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model {

	public function getKhs($param)
	{
		$this->db->select('*');
		$this->db->from('tbl_krs');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.makul_id = tbl_krs.makul_id', 'left');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_krs.nim', 'left');
		$this->db->where($param);
		return $this->db->get();
	}	

	public function getIPK($nim)
	{
		$this->db->select('*');
		$this->db->from('tbl_krs');
		$this->db->join('tbl_matakuliah', 'tbl_matakuliah.makul_id = tbl_krs.makul_id', 'left');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_krs.nim', 'left');
		$this->db->where('tbl_krs.nim',$nim);
		return $this->db->get();
	}	

}

/* End of file M_Mahasiswa.php */
/* Location: ./application/models/M_Mahasiswa.php */
<?php
class Main_model extends CI_model
{

    /*********************** START MODEL DOSEN *************************************/

    //Khusus Dosen
    public function getAll()
    {
        $query = "SELECT `tbl_dosen`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
            FROM `tbl_dosen` 
            JOIN `tbl_prodi`
            ON `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id`
        ";
        return $this->db->query($query);
	}
    public function getAllpgmi()
    {
        $query = "SELECT `tbl_dosen`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
            FROM `tbl_dosen` 
            JOIN `tbl_prodi`
            ON `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id`
            WHERE `tbl_dosen`.`prodi_id` = '2';
        ";
        return $this->db->query($query);
    }
    public function getAllmpi()
    {
        $query = "SELECT `tbl_dosen`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
            FROM `tbl_dosen` 
            JOIN `tbl_prodi`
            ON `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id`
            WHERE `tbl_dosen`.`prodi_id` = '1';
        ";
        return $this->db->query($query);
    }

    public function getAllMatkulDosen($nidn)
    {
        $query = "SELECT `tbl_krs`.*,`tbl_dosen`.`nidn`, `nama_makul`,`tbl_matakuliah`.`makul_id`,`nama_dosen`,`tbl_dosen`.`nidn`,`tbl_mahasiswa`.*,`tbl_mahasiswa`.`nim`,`tbl_prodi`.*,`tbl_prodi`.`prodi_id`
            FROM `tbl_krs` 
            JOIN `tbl_matakuliah` 
            JOIN `tbl_mahasiswa` 
            JOIN `tbl_dosen` 
            JOIN `tbl_prodi` 
            ON `tbl_krs`.`nim` = `tbl_mahasiswa`.`nim` 
            AND `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id` 
            AND `tbl_matakuliah`.`makul_id` = `tbl_krs`.`makul_id` 
            AND `tbl_matakuliah`.`nidn` = `tbl_dosen`.`nidn` 
            WHERE `tbl_dosen`.`nidn`= '$nidn'
          ";
        return $this->db->query($query);
    }

    public function tambahDataDosen($nidn,$id,
                    $nama,
                    $tmt,
                    $prodi,
                    $file)
    {
        $data = [
            'kd_dosen' => $id,
            'nidn' => $nidn,
            'image' => $file,
            'nama_dosen' => $nama,
            'TMT' => $tmt,
            'prodi_id' => $prodi,
        ];
        $this->db->insert('tbl_dosen', $data);
        $data_user = [
            'id_user' => '',
            'nim' => $nidn,
            'name' => $nama,
            'image' => $file,
            'password' => password_hash($this->input->post('nama_dosen'), PASSWORD_DEFAULT),
            'role_id' => 3,
            'username' => htmlspecialchars($this->input->post('nama_dosen', true)),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('tbl_user', $data_user);
    }
    public function deleteDosen($nidn, $nama)
    {
		
        $this->db->where('nidn', $nidn);
        $query = $this->db->get('tbl_dosen'); //get db
        $row = $query->row(); // munculkan data
        $gambar = $row->image;
        $path = './uploads/profile_dosen/' . $gambar; //get dri id
		unlink($path);
		$this->db->where('nidn', $nidn);
        $this->db->delete('tbl_dosen');
        $this->db->where('name', $nama);
        $this->db->delete('tbl_user');

	}
	function get_data_dosen($nidn)
    {
        $query = "SELECT `tbl_user`.*,`nama_dosen`,`nidn`,`TMT`,`tbl_dosen`.`nidn`,`nama_prodi`,`tbl_prodi`.`prodi_id`
           FROM `tbl_user` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_user`.`nim` = `tbl_dosen`.`nidn`
           AND `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `tbl_user`.`nim` = '$nidn'
        ";
        return $this->db->query($query)->row_array();
	}
    public function updateDosen($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    /*********************** END MODEL DOSEN *************************************/


    /*********************** START MODEL PRODI *************************************/


    //Khusus Prodi
    public function getAllProdi()
    {
        return $this->db->get('tbl_prodi');
	}
	public function getBiodata($nim)
    {
        $query = "SELECT `tbl_dosen`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
		FROM `tbl_dosen`
		JOIN `tbl_prodi`
		ON `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id` 
		WHERE `nidn` = '$nim' ";
        return $this->db->query($query);
    }
    public function getProdipgmi()
    {
        $query = "SELECT * FROM `tbl_prodi` WHERE `prodi_id` = '2' ";
        return $this->db->query($query);
    }
    public function getProdimpi()
    {
        $query = "SELECT * FROM `tbl_prodi` WHERE `prodi_id` = '1' ";
        return $this->db->query($query);
    }
    public function tambahDataProdi()
    {
        $data = [
            'prodi_id' => $this->input->post('prodi_id'),
            'nama_prodi' => $this->input->post('nama_prodi'),
            'ketua' => $this->input->post('ketua'),
            'no_izin' => $this->input->post('no_izin'),
        ];
        $this->db->insert('tbl_prodi', $data);
    }
    public function hapusProdi($prodi_id)
    {
        $this->db->where('prodi_id', $prodi_id);
        $this->db->delete('tbl_prodi'); //nama tabel
    }
    public function updateProdi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    /*********************** END MODEL PRODI *************************************/

    //Khusus Mata Kuliah
    public function getAllMatkul()
    {
        $query = "SELECT `tbl_matakuliah`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
            FROM `tbl_matakuliah` 
            JOIN `tbl_dosen` JOIN `tbl_prodi`
            ON `tbl_matakuliah`.`nidn` = `tbl_dosen`.`nidn`
            AND `tbl_prodi`.`prodi_id` = `tbl_matakuliah`.`prodi_id`
            ";
        return $this->db->query($query);
    }
    public function getMatkulpgmi()
    {
        $query = "SELECT `tbl_matakuliah`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
            FROM `tbl_matakuliah` 
            JOIN `tbl_dosen` JOIN `tbl_prodi`
            ON `tbl_matakuliah`.`nidn` = `tbl_dosen`.`nidn`
            AND `tbl_prodi`.`prodi_id` = `tbl_matakuliah`.`prodi_id`
            WHERE `tbl_matakuliah`.`prodi_id` = '2'
            ";
        return $this->db->query($query);
    }
    public function getMatkulmpi()
    {
        $query = "SELECT `tbl_matakuliah`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
            FROM `tbl_matakuliah` 
            JOIN `tbl_dosen` JOIN `tbl_prodi`
            ON `tbl_matakuliah`.`nidn` = `tbl_dosen`.`nidn`
            AND `tbl_prodi`.`prodi_id` = `tbl_matakuliah`.`prodi_id`
            WHERE `tbl_matakuliah`.`prodi_id` = '1'
            ";
        return $this->db->query($query);
    }
    public function tambahDataMatkul()
    {
        $data = [
            'makul_id' => $this->input->post('makul_id'),
            'kode_makul' => $this->input->post('kode_makul'),
            'nama_makul' => $this->input->post('nama_makul'),
            'nidn' => $this->input->post('nidn'),
            'sks' => $this->input->post('sks'),
            'nama_semester' => $this->input->post('nama_semester'),
            'prodi_id' => $this->input->post('nama_prodi'),
        ];
        $this->db->insert('tbl_matakuliah', $data);
    }
    public function hapusMatkul($makul_id)
    {
        $this->db->where('makul_id', $makul_id);
        $this->db->delete('tbl_matakuliah'); //nama tabel
    }
    public function updateMatkul($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //Khusus Jadwal Kuliah
    public function getAllJadwal()
    {
        $query = "SELECT `tbl_jadwal`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
           FROM `tbl_jadwal` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_jadwal`.`nidn` = `tbl_dosen`.`nidn`
           AND `tbl_jadwal`.`prodi_id` = `tbl_prodi`.`prodi_id`
        ";
        return $this->db->query($query)->result();
	}
	public function getAllJadwalEdit($id)
    {
        $query = "SELECT `tbl_jadwal`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
           FROM `tbl_jadwal` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_jadwal`.`nidn` = `tbl_dosen`.`nidn`
           AND `tbl_jadwal`.`prodi_id` = `tbl_prodi`.`prodi_id`
		   WHERE `tbl_jadwal`.`id_jadwal` = '$id' 
        ";
        return $this->db->query($query)->result();
    }
    public function getJadwalpgmi()
    {
        $query = "SELECT `tbl_jadwal`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
           FROM `tbl_jadwal` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_jadwal`.`nidn` = `tbl_dosen`.`nidn`
           AND `tbl_jadwal`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `tbl_jadwal`.`prodi_id` = '2';
        ";
        return $this->db->query($query)->result();
    }
    public function getJadwalmpi()
    {
        $query = "SELECT `tbl_jadwal`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
           FROM `tbl_jadwal` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_jadwal`.`nidn` = `tbl_dosen`.`nidn`
           AND `tbl_jadwal`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `tbl_jadwal`.`prodi_id` = '1';
        ";
        return $this->db->query($query)->result();
    }
    public function tambahDataJadwal()
    {
        $data = [
            'id_jadwal' => $this->input->post('id_jadwal'),
            'hari' => $this->input->post('hari'),
            'kode_makul' => $this->input->post('kode_makul'),
            'nama_makul' => $this->input->post('nama_makul'),
            'prodi_id' => $this->input->post('prodi_id'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'nidn' => $this->input->post('nidn'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('tbl_jadwal', $data);
	}
	public function updateDataJadwal()
    {
        $data = [
            'id_jadwal' => $this->input->post('id_jadwal'),
            'hari' => $this->input->post('hari'),
            'kode_makul' => $this->input->post('kode_makul'),
            'nama_makul' => $this->input->post('nama_makul'),
            'prodi_id' => $this->input->post('prodi_id'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'nidn' => $this->input->post('nidn'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->update('tbl_jadwal', $data);
    }
    public function deleteJadwal($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->delete('tbl_jadwal'); //nama tabel
    }
    function get_sub_matkul($matkul)
    {
        $query = "SELECT `tbl_matakuliah`.*,`nama_dosen`,`nama_prodi`,`tbl_dosen`.`nidn`
           FROM `tbl_matakuliah` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_matakuliah`.`nidn` = `tbl_dosen`.`nidn`
           AND `tbl_matakuliah`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `nama_makul` = '$matkul'
        ";
        return $this->db->query($query);
    }
    function get_data_by_id($id_jadwal)
    {
        $query = $this->db->get_where('tbl_jadwal', array('id_jadwal' =>  $id_jadwal));
        return $query;
    }
    //KRS
    public $krs_id = 'krs_id';
    public function getAllKrs()
    {
        return $this->db->get('tbl_krs');
    }
    public function deleteKrs($krs_id)
    {
        $this->db->where('krs_id', $krs_id);
        $this->db->delete('tbl_krs'); //nama tabel

    }
    public function tambahDataKrs()
    {
        $data = [
            'krs_id' => $this->input->post('krs_id'),
            'kode_makul' => $this->input->post('kode_makul'),
            'nama_makul' => $this->input->post('nama_makul'),
            'nama_prodi' => $this->input->post('nama_prodi'),
            'sks' => $this->input->post('sks'),
        ];
        $this->db->insert('tbl_krs', $data);
    }

    function get_sub_semester($semester, $prodi)
    {
        //$query = $this->db->select('kode_makul,nama_makul,sks', array('nama_semester' => $semester));
        //$query = $this->db->get_where('tbl_matakuliah', array('nama_semester' => $semester)); 
        $query = $this->db->query("SELECT`tbl_matakuliah`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`,`tbl_semester`.`nama_semester`
        FROM `tbl_matakuliah` 
        JOIN `tbl_semester`
        JOIN `tbl_prodi` 
       ON `tbl_prodi`.`prodi_id` = `tbl_matakuliah`.`prodi_id` 
       AND `tbl_matakuliah`.`nama_semester` = `tbl_semester`.`nama_semester`
       WHERE `tbl_prodi`.`nama_prodi` = '$prodi' 
       AND `tbl_matakuliah`.`nama_semester` = '$semester'");
        return $query;
    }
    //Khusus Ruangan
    public function getAllRuangan()
    {
        return $this->db->get('tbl_ruangan');
    }
    public function tambahDataRuangan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'kode_ruangan' => $this->input->post('kode_ruangan'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->insert('tbl_ruangan', $data);
    }
    public function deleteRuangan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_ruangan'); //nama tabel

    }
    public function editRuangan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateRuangan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //Khusus Pmb
    public function getAllPmb()
    {
        return $this->db->get('tbl_pmb');
    }
    public function getPmbpgmi()
    {
        $query = $this->db->query("SELECT * FROM `tbl_pmb`
       WHERE `prodi_id` = '2'");
        return $query;
    }
    public function getPmbmpi()
    {
        $query = $this->db->query("SELECT * FROM `tbl_pmb`
        WHERE `prodi_id` = '1'");
        return $query;
    }
    public function savePmb(
        $id,
        $no,
        $prodi,
        $kelas,
        $nama,
        $tempat,
        $date,
        $jk,
        $status,
        $agama,
        $warga_negara,
        $alamat,
        $sd,
        $lulus_sd,
        $smp,
        $lulus_smp,
        $sma,
        $lulus_sma,
        $kuliah,
        $lulus_kuliah,
        $ayah,
        $ibu,
        $usia_ayah,
        $usia_ibu,
        $pekerjaan_ayah,
        $pekerjaan_ibu,
        $pd_ayah,
        $pd_ibu,
        $stat_ayah,
        $stat_ibu,
        $alamat_ortu,
        $file
    ) {
        $data = [
            'id_pmb' => $id,
            'no_regis' => $no,
            'prodi_id' => $prodi,
            'kelas' => $kelas,
            'file' => $file,
            'nama' => $nama,
            'tempat' => $tempat,
            'date' => $date,
            'jk' => $jk,
            'status' => $status,
            'agama' => $agama,
            'warga_negara' => $warga_negara,
            'alamat' => $alamat,
        ];
        $this->db->insert('tbl_pmb', $data);
        $data_ortu = [
            'id_pmb' => $id,
            'nama_ayah' => $ayah,
            'nama_ibu' => $ibu,
            'usia_ayah' => $usia_ayah,
            'usia_ibu' => $usia_ibu,
            'pekerjaan_ayah' => $pekerjaan_ayah,
            'pekerjaan_ibu' => $pekerjaan_ibu,
            'pd_ayah' => $pd_ayah,
            'pd_ibu' => $pd_ibu,
            'stat_ayah' => $stat_ayah,
            'stat_ibu' => $stat_ibu,
            'alamat_ortu' => $alamat_ortu,
        ];
        $this->db->insert('tbl_ortu', $data_ortu);
        $data_pendidikan = [
            'id_pmb' => $id,
            'sd' => $sd,
            'smp' => $smp,
            'sma' => $sma,
            'kuliah' => $kuliah,
            'lulus_sd' => $lulus_sd,
            'lulus_smp' => $lulus_smp,
            'lulus_sma' => $lulus_sma,
            'lulus_kuliah' => $lulus_kuliah,
        ];
        $this->db->insert('tbl_pendidikan', $data_pendidikan);
    }
    public function saveNoFotoPmb(
        $id,
        $no,
        $prodi,
        $kelas,
        $nama,
        $tempat,
        $date,
        $jk,
        $status,
        $agama,
        $warga_negara,
        $alamat,
        $sd,
        $lulus_sd,
        $smp,
        $lulus_smp,
        $sma,
        $lulus_sma,
        $kuliah,
        $lulus_kuliah,
        $ayah,
        $ibu,
        $usia_ayah,
        $usia_ibu,
        $pekerjaan_ayah,
        $pekerjaan_ibu,
        $pd_ayah,
        $pd_ibu,
        $stat_ayah,
        $stat_ibu,
        $alamat_ortu
    ) {
        $data = [
            'id_pmb' => $id,
            'no_regis' => $no,
            'prodi_id' => $prodi,
            'kelas' => $kelas,
            'file' =>  'default.jpeg',
            'nama' => $nama,
            'tempat' => $tempat,
            'date' => $date,
            'jk' => $jk,
            'status' => $status,
            'agama' => $agama,
            'warga_negara' => $warga_negara,
            'alamat' => $alamat,
        ];
        $this->db->insert('tbl_pmb', $data);
        $data_ortu = [
            'id_pmb' => $id,
            'nama_ayah' => $ayah,
            'nama_ibu' => $ibu,
            'usia_ayah' => $usia_ayah,
            'usia_ibu' => $usia_ibu,
            'pekerjaan_ayah' => $pekerjaan_ayah,
            'pekerjaan_ibu' => $pekerjaan_ibu,
            'pd_ayah' => $pd_ayah,
            'pd_ibu' => $pd_ibu,
            'stat_ayah' => $stat_ayah,
            'stat_ibu' => $stat_ibu,
            'alamat_ortu' => $alamat_ortu,
        ];
        $this->db->insert('tbl_ortu', $data_ortu);
        $data_pendidikan = [
            'id_pmb' => $id,
            'sd' => $sd,
            'smp' => $smp,
            'sma' => $sma,
            'kuliah' => $kuliah,
            'lulus_sd' => $lulus_sd,
            'lulus_smp' => $lulus_smp,
            'lulus_sma' => $lulus_sma,
            'lulus_kuliah' => $lulus_kuliah,
        ];
        $this->db->insert('tbl_pendidikan', $data_pendidikan);
    }
    public function deletePmb($id)
    {
        $this->db->where('id_pmb', $id);
        $query = $this->db->get('tbl_pmb'); //get db
        $row = $query->row(); // munculkan data
        $gambar = $row->file;
        $path = './upload/profile_mhs/' . $gambar; //get dri id
        unlink($path);
        $this->db->delete('tbl_pmb', $id);
        $this->db->where('id_pmb', $id);
        $this->db->delete('tbl_pmb');
        $this->db->where('id_pmb', $id);
        $this->db->delete('tbl_pendidikan');
        $this->db->where('id_pmb', $id);
        $this->db->delete('tbl_ortu'); //nama tabel
    }

    public function getJoinPmb($id)
    {
        $query = "SELECT `tbl_pmb`.*,`tbl_ortu`.*,`tbl_pendidikan`.*,`tbl_prodi`.`nama_prodi`
           FROM `tbl_pmb`
           JOIN `tbl_ortu` JOIN `tbl_pendidikan` JOIN `tbl_prodi`
           ON `tbl_pmb`.`id_pmb` = `tbl_ortu`.`id_pmb`
           AND `tbl_pmb`.`id_pmb` = `tbl_pendidikan`.`id_pmb`
           AND `tbl_pmb`.`prodi_id` = `tbl_prodi`.`prodi_id`
           AND `tbl_pmb`.`id_pmb` = '$id'
           
        ";
        return $this->db->query($query)->result();
    }
    public function updatePmb($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($data, $table);
    }
    public function updateDataOrtu($where, $table, $data_ortu)
    {
        $this->db->where($where);
        $this->db->update($data_ortu, $table);
    }
    public function updateDataPendidikan($where, $table, $data_pendidikan)
    {
        $this->db->where($where);
        $this->db->update($data_pendidikan, $table);
    }
    public function getAllSemester()
    {
        return $this->db->get('tbl_semester');
    }
    /*//Khusus Konsentrasi
    public function getAllKonsentrasi(){ 
        $this->db->select('konsentrasi_id,nama_konsentrasi,ketua,prodi_id');
        $this->db->from('tbl_konsentrasi');
		$query = $this->db->get()->result_array() ;
		return $query;
    } 
    public function tambahDataKonsentrasi($konsentrasi_id,$nama_konsentrasi,$ketua,$prodi_id){
        
        $data = array(
			'konsentrasi_id' => $konsentrasi_id,
			'nama_konsentrasi' => $nama_konsentrasi,
			'ketua' => $ketua,
			'prodi_id' => $prodi_id 
        );
		$this->db->insert('tbl_konsentrasi',$data);
    }
    function get_sub_prodi($prodi){
		$query = $this->db->get_where('tbl_prodi', array('prodi_id' => $prodi));
		return $query;
    }
    public function deleteKonsentrasi($konsentrasi_id){
        $this->db->where('konsentrasi_id', $konsentrasi_id);
        $this->db->delete('tbl_konsentrasi'); //nama tabel
       
    }
    function get_konsentrasi_by_id($konsentrasi_id){
		$query = $this->db->get_where('tbl_konsentrasi', array('konsentrasi_id' =>  $konsentrasi_id));
		return $query;
    }*/

    public function saveUpload($id, $nidn, $title, $file)
    {
        $data = [
            'id' => $id,
            'nidn' => $nidn,
            'title' => $title,
            'nama_file' => $file,
        ];
        $this->db->insert('tbl_upload', $data);
    }
}

<?php
class Admin_model extends CI_Model
{

    public $table = 'tbl_mahasiswa';
    public $user = 'tbl_user';

    public $id = 'nim';

    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    //mahasiswa
    // get all 
    function get_all()
    {
        $query = "SELECT `tbl_mahasiswa`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
        FROM `tbl_mahasiswa` JOIN `tbl_prodi`
        ON `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id`
        ";
        return $this->db->query($query);
    }
    function get_all_pgmi()
    {
        $query = "SELECT `tbl_mahasiswa`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
        FROM `tbl_mahasiswa` JOIN `tbl_prodi`
        ON `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id` WHERE `tbl_mahasiswa`.`prodi_id` = '2'
        ";
        return $this->db->query($query);
    }
    function get_all_mpi()
    {
        $query = "SELECT `tbl_mahasiswa`.*,`nama_prodi`,`tbl_prodi`.`prodi_id`
        FROM `tbl_mahasiswa` JOIN `tbl_prodi`
        ON `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id`
        WHERE `tbl_mahasiswa`.`prodi_id` = '1'
        ";
        return $this->db->query($query);
    }
    function get_data_user($nim)
    {
        $query = "SELECT `tbl_user`.*,`nama_mahasiswa`,`angkatan`,`status`,`tbl_mahasiswa`.`nim`,`nama_prodi`,`tbl_prodi`.`prodi_id`
           FROM `tbl_user` 
           JOIN `tbl_mahasiswa`
           JOIN `tbl_prodi`
           ON `tbl_user`.`nim` = `tbl_mahasiswa`.`nim`
           AND `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `tbl_user`.`nim` = '$nim'
        ";
        return $this->db->query($query)->row_array();
	}
	function get_data_dosen($nidn)
    {
        $query = "SELECT `tbl_user`.*,`nama_dosen`,`tbl_dosen`.`nidn`,`nama_prodi`,`tbl_prodi`.`prodi_id`
           FROM `tbl_user` 
           JOIN `tbl_dosen`
           JOIN `tbl_prodi`
           ON `tbl_user`.`nim` = `tbl_dosen`.`nidn`
           AND `tbl_dosen`.`prodi_id` = `tbl_prodi`.`prodi_id`
           WHERE `tbl_user`.`nim` = '$nidn'
        ";
        return $this->db->query($query)->row_array();
    }

    function get_all_krs($name) //get table lain untuk form input krs
    {
        $query = "SELECT `tbl_user`.*,`nama_mahasiswa`,`tbl_mahasiswa`.`nim`,`nama_prodi`,`tbl_prodi`.`prodi_id` 
          FROM `tbl_user` 
          JOIN `tbl_mahasiswa` 
          JOIN `tbl_prodi`
           ON `tbl_user`.`nim` = `tbl_mahasiswa`.`nim` 
           AND `tbl_mahasiswa`.`prodi_id` = `tbl_prodi`.`prodi_id` 
           WHERE `name` ='$name';
        ";
        return $this->db->query($query)->result_array();
    }
    public function getDataKrs($nim)
    { //get table lain untuk form table krs
        $query = $this->db->query("SELECT `tbl_krs`.*,`nama_makul`,`kode_makul`,`sks`,`tbl_matakuliah`.`makul_id`,`nama_mahasiswa`,`tbl_mahasiswa`.`nim`
                FROM `tbl_krs` 
                JOIN `tbl_mahasiswa`
                JOIN `tbl_matakuliah`
                ON `tbl_matakuliah`.`makul_id` = `tbl_krs`.`makul_id`
                AND `tbl_mahasiswa`.`nim` = `tbl_krs`.`nim` 
                WHERE `tbl_mahasiswa`.`nim` = '$nim';
                ");

        return $query;
    }
    public function getDataKrs2($nim)
    { //get table lain untuk form table krs
        $query = $this->db->query("SELECT `tbl_krs`.*,`nama_makul`,`kode_makul`,`sks`,`tbl_matakuliah`.`makul_id`,`nama_mahasiswa`,`tbl_mahasiswa`.`nim`
                FROM `tbl_krs` 
                JOIN `tbl_mahasiswa`
                JOIN `tbl_matakuliah`
                ON `tbl_matakuliah`.`makul_id` = `tbl_krs`.`makul_id`
                AND `tbl_mahasiswa`.`nim` = `tbl_krs`.`nim` 
                WHERE `tbl_mahasiswa`.`nim` = '$nim';
                ");

        return $query;
    }
    public function insertKrs($data)
    {

        $i = 0;
        foreach ($data['pilihan'] as $makul) {
            $record = array(
                'krs_id' => $data['krs_id'],
                'makul_id' => $makul,
                'nim' => $data['nim'],
                'nama_semester' => $data['nama_semester'],
                'nama_prodi' => $data['nama_prodi']
            );
            $this->db->insert('tbl_krs', $record);
            $i++;
        }
    }
    function delete_data_krs($id)
    {
        $this->db->where('krs_id', $id);
        $this->db->delete('tbl_krs');
    }
    public function saveMhs2( $id,
                    $nim,
                    $nama,
                    $tempat,
                    $date,
                    $email,
                    $alamat,
                    $asal_sekolah,
                    $ortu,
                    $jk,
                    $file2,
                    $angkatan,
					$prodi,
					$file1)
    {
		
        $data = [
            'id_mahasiswa' => $id,
            'nim' => $nim,
            'nama_mahasiswa' => $nama,
            'tempat' => $tempat,
            'jk' => $jk,
            'ijazah' => $file2,
            'asal_sekolah' => $asal_sekolah,
            'nama_ortu' => $ortu,
            'alamat' => $alamat,
            'angkatan' => $angkatan,
            'prodi_id' => $prodi,
            'status' => 0,
            'date' => $date,
            'email' => $email,
		];
        $this->db->insert('tbl_mahasiswa', $data);
        $data_user = [
            'id_user' => '',
            'nim' => $nim,
			'name' => $nama,
			  'username' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('nama'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'image' => $file1,
          
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('tbl_user', $data_user);
	}
	public function saveMhs( $id,
                    $nim,
                    $nama,
                    $tempat,
                    $date,
                    $email,
                    $alamat,
                    $asal_sekolah,
                    $ortu,
                    $jk,
                    $file2,
                    $angkatan,
					$prodi,
					$file1)
    {
		
        $data = [
            'id_mahasiswa' => $id,
            'nim' => $nim,
            'nama_mahasiswa' => $nama,
            'tempat' => $tempat,
            'jk' => $jk,
            'ijazah' => $file2,
            'asal_sekolah' => $asal_sekolah,
            'nama_ortu' => $ortu,
            'alamat' => $alamat,
            'angkatan' => $angkatan,
            'prodi_id' => $prodi,
            'image' => $file1,
            'status' => 0,
            'date' => $date,
            'email' => $email,
		];
        $this->db->insert('tbl_mahasiswa', $data);
        $data_user = [
            'id_user' => '',
            'nim' => $nim,
			'name' => $nama,
			  'username' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('nama'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'image' => $file1,
          
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('tbl_user', $data_user);
	}
	public function saveMhs3( $id,
                    $nim,
                    $nama,
                    $tempat,
                    $date,
                    $email,
                    $alamat,
                    $asal_sekolah,
                    $ortu,
                    $jk,
                    $file2,
                    $angkatan,
					$prodi,
					$file1)
    {
		
        $data = [
            'id_mahasiswa' => $id,
            'nim' => $nim,
            'nama_mahasiswa' => $nama,
            'tempat' => $tempat,
            'jk' => $jk,
            'asal_sekolah' => $asal_sekolah,
            'nama_ortu' => $ortu,
            'alamat' => $alamat,
            'angkatan' => $angkatan,
            'prodi_id' => $prodi,
            'image' => $file1,
            'status' => 0,
            'date' => $date,
            'email' => $email,
		];
        $this->db->insert('tbl_mahasiswa', $data);
        $data_user = [
            'id_user' => '',
            'nim' => $nim,
			'name' => $nama,
			  'username' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('nama'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'image' => $file1,
          
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('tbl_user', $data_user);
    }
    public function editMhs($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function updateMhs($where, $data, $table)
    {
        $this->db->where($where);
		$this->db->update($table, $data);
    }
    public function update_status()
    {
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];
        if ($saval == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
        $this->db->where('id_mahasiswa', $id);
        $this->db->update('tbl_mahasiswa', $data);
    }
    //delete
    public function deleteMhs($nim)
    {
        $this->db->where('nim', $nim);
        $query = $this->db->get('tbl_mahasiswa'); //get db
        $row = $query->row(); // munculkan data
        $gambar = $row->image;
        $path = './uploads/profile_mhs/' . $gambar; //get dri id
		unlink($path);
		$gambar2 = $row->ijazah;
        $path2 = './uploads/profile_mhs/' . $gambar2; //get dri id
        unlink($path2);
        $this->db->where('nim', $nim);
        $this->db->delete('tbl_mahasiswa');
        $this->db->where('nim', $nim);
        $this->db->delete('tbl_user');
    }
    public function getUserName()
    {

        $query = "SELECT `tbl_user`.`name`,`tbl_mahasiswa`.`id_user`
        FROM `tbl_mahasiswa` JOIN `tbl_user`
        ON `tbl_mahasiswa`.`id_user` = `tbl_user`.`id_user`
        ";
        return $this->db->query($query)->result_array();
    }
}

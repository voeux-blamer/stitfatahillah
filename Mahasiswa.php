<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('file');
    }
    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->Admin_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/content', $data);
        $this->load->view('templates/footer');
    }
		public function change_password_mhs()
	  {
		$data['title'] = 'Mahasiswa STIT FATAHILLAH';
		
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('old_password', 'Old password','required|trim');
		$this->form_validation->set_rules('new_password', 'New password', 
		'required|trim|matches[repeat_password]');
		$this->form_validation->set_rules('repeat_password', 'Repeat password', 
		'required|trim|matches[new_password]');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_mhs', $data);
		$this->load->view('templates/topbar_mhs', $data);
		$this->load->view('templates/account_mhs', $data);
		$this->load->view('templates/footer');
		} else{
		  $old_password = $this->input->post('old_password');
		  $new_password = $this->input->post('new_password');
		  if(!password_verify($old_password,$data['user']['password'])){
			$this->session->set_flashdata('message_password','<div class="alert alert-danger" role="alert"> Wrong Old Password </div>');
			redirect('Mahasiswa/change_password_mhs');
		  } else{
			if ($old_password == $new_password){
			  $this->session->set_flashdata('message_password','<div class="alert alert-warning" role="alert"> Wrong Old Password </div>');
			redirect('Mahasiswa/change_password_mhs');
			} else {
			  $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
			  $this->db->set('password',$password_hash);
			  $this->db->where('username',$this->session->userdata('username'));
			  $this->db->update('tbl_user');
			  $this->session->set_flashdata('message_password','<div class="alert alert-success" role="alert"> Password Changed </div>');
			redirect('Mahasiswa/change_password_mhs');
			}
		  }
		}
	  }
    /**************************** START CONTROLLER DOWNLOAD MODUL *********************/
    public function download()
    {
        $data = array();

		$data['title'] = 'Download Modul';
		$nim = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
		$data['files'] = $this->file->getRows();
		$data['user'] =  $this->Admin_model->get_data_user($nim);
        //$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('modul/content', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proses_download($id)
    {
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->file->getRows(array('id' => $id));
            //file path

            $file = 'uploads/files/' . $fileInfo['file_name'];

            force_download($file, NULL);
        }
    }
    /**************************** END CONTROLLER DOWNLOAD MODUL *********************/


    /**************************** START CONTROLLER KHS *********************/

    public function khs()
    {

        $nim = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
        $data['title'] = 'Data Mahasiswa';
        $data['lihat'] = 'khs';
        $data['semester'] = $this->Main_model->getAllSemester()->result();
        $data['user'] =  $this->Admin_model->get_data_user($nim);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/lihat', $data);
        $this->load->view('templates/footer');
    }

    public function lihat_khs()
    {

        $nim = $this->session->userdata('nim');
        $name = $this->session->userdata('username');

        $hitungIPK = $this->M_Mahasiswa->getIPK($nim)->result();


        foreach ($hitungIPK as $i) {
            @$sks += $i->sks;
            @$nilai += skorNilai($i->nilai, $i->sks);
        }

        $ipk = number_format($nilai / $sks, 2);

        $param = array(
            'tbl_krs.nama_semester' => $this->input->post('semester', true),
            'tbl_krs.nim' => $this->session->userdata('nim')
        );

        $data['title'] = 'Data Mahasiswa';
        $data['semester'] = $this->input->post('semester');
        $data['khs'] = $this->M_Mahasiswa->getKhs($param)->result();
        $data['ipk'] = $ipk;
        $data['user'] =  $this->Admin_model->get_data_user($nim);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/khs', $data);
        $this->load->view('templates/footer');
    }


    /**************************** END CONTROLLER KHS *********************/

    public function change()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->Admin_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('profile/change_pass', $data);
        $this->load->view('templates/footer');
    }
    public function proses_change()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->Admin_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('profile/change_pass', $data);
        $this->load->view('templates/footer');
    }
    public function dashboard()
    {
		$data['title'] = 'Dashboard';
		$nim = $this->session->userdata('nim');
    $name = $this->session->userdata('username');
		$data['user'] =  $this->Admin_model->get_data_user($nim);
		//$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function biodata()
    {
		$nim = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
		$data['title'] = 'My Profile';
		$data['user'] =  $this->Admin_model->get_data_user($nim);
		//$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['data'] = $this->Admin_model->get_all();
		$data['tbl_prodi'] = $this->Main_model->getAllProdi();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/biodata', $data);
        $this->load->view('templates/footer');
    }
    //field,name form, required
    public function add()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        //$this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa');
        //$this->form_validation->set_rules('nim', 'Nim', 'required');
        //$this->form_validation->set_rules('nama_mahasiswa', 'Nama', 'required');
        //$this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        //$this->form_validation->set_rules('prodi_id', 'prodi_id', 'required');
        //$this->form_validation->set_rules('image', 'gambar', 'required');
        //if ($this->form_validation->run() == FALSE) {
        $this->Admin_model->saveMhs();
        redirect('mahasiswa');
        exit;
    }
    function save()
    {
        $config['upload_path'] = './upload/profile_mhs/'; //path folder
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $id = strip_tags($this->input->post('id_mahasiswa'));
                $nim = strip_tags($this->input->post('nim'));
                $nama = strip_tags($this->input->post('nama_mahasiswa'));
                $angkatan = strip_tags($this->input->post('angkatan'));
                $prodi = strip_tags($this->input->post('prodi_id'));
                $gbr = $this->upload->data();
                $file = $gbr['file_name'];
                $this->Admin_model->saveMhs(
                    $id,
                    $nim,
                    $nama,
                    $angkatan,
                    $prodi,
                    $file
                );
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Mahasiswa');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Mahasiswa');
            }
        } else {
            redirect('Mahasiswa');
        }
    }
    public function edit($nim)
    {
        $data['title'] = 'Form Edit';
        $where = array('nim' => $nim);
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();

        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tbl_mahasiswa'] = $this->Admin_model->editMhs($where, 'tbl_mahasiswa')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function updateMhs()
  {
    $config['upload_path'] = './uploads/profile_mhs/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
    $config['overwrite'] = true;
    $this->upload->initialize($config);
    $path = $_FILES['profile']['name'];
    $doc = $_FILES['doc']['name'];
    if (!empty($path && $doc)) {
        $nim = strip_tags($this->input->post('nim'));
        $nama = strip_tags($this->input->post('nama'));
        $tempat = strip_tags($this->input->post('tempat'));
				$date = strip_tags($this->input->post('date'));
				$email = strip_tags($this->input->post('email'));
				$alamat = strip_tags($this->input->post('alamat'));
				$asal_sekolah = strip_tags($this->input->post('asal_sekolah'));
				$ortu = strip_tags($this->input->post('nama_ortu'));
				$jk = implode(',', $this->input->post('jk'));
        $angkatan = strip_tags($this->input->post('angkatan'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
        $gbr = $this->upload->data();
				$file1 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
        $gbr2 = $this->upload->data();
        $file2 = $gbr2['file_name'];
        $data = array(
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
            'date' => $date,
            'email' => $email,
        );
        $where = array(
          'nim' => $nim,
        );
				$this->Admin_model->UpdateMhs($where, $data, 'tbl_mahasiswa');
				redirect('Mahasiswa/biodata');
				} 
				else if (!empty($path)) {
        $nim = strip_tags($this->input->post('nim'));
        $nama = strip_tags($this->input->post('nama'));
        $tempat = strip_tags($this->input->post('tempat'));
				$date = strip_tags($this->input->post('date'));
				$email = strip_tags($this->input->post('email'));
				$alamat = strip_tags($this->input->post('alamat'));
				$asal_sekolah = strip_tags($this->input->post('asal_sekolah'));
				$ortu = strip_tags($this->input->post('nama_ortu'));
				$jk = implode(',', $this->input->post('jk'));
        $angkatan = strip_tags($this->input->post('angkatan'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
        $gbr = $this->upload->data();
				$file1 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
        $gbr2 = $this->upload->data();
        $file2 = $gbr2['file_name'];
        $data = array(
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
            'date' => $date,
            'email' => $email,
        );
        $where = array(
          'nim' => $nim,
        );
				$this->Admin_model->UpdateMhs($where, $data, 'tbl_mahasiswa');
				redirect('Mahasiswa/biodata');
				
    } else if (!empty($doc)) {
        $nim = strip_tags($this->input->post('nim'));
        $nama = strip_tags($this->input->post('nama'));
        $tempat = strip_tags($this->input->post('tempat'));
				$date = strip_tags($this->input->post('date'));
				$email = strip_tags($this->input->post('email'));
				$alamat = strip_tags($this->input->post('alamat'));
				$asal_sekolah = strip_tags($this->input->post('asal_sekolah'));
				$ortu = strip_tags($this->input->post('nama_ortu'));
				$jk = implode(',', $this->input->post('jk'));
        $angkatan = strip_tags($this->input->post('angkatan'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
        $gbr = $this->upload->data();
				$file1 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
        $gbr2 = $this->upload->data();
        $file2 = $gbr2['file_name'];
        $data = array(
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
            'date' => $date,
            'email' => $email,
        );
        $where = array(
          'nim' => $nim,
        );
				$this->Admin_model->UpdateMhs($where, $data, 'tbl_mahasiswa');
				redirect('Mahasiswa/biodata');
				
    }
    			$nim = strip_tags($this->input->post('nim'));
        		$nama = strip_tags($this->input->post('nama'));
        		$tempat = strip_tags($this->input->post('tempat'));
				$date = strip_tags($this->input->post('date'));
				$email = strip_tags($this->input->post('email'));
				$alamat = strip_tags($this->input->post('alamat'));
				$asal_sekolah = strip_tags($this->input->post('asal_sekolah'));
				$ortu = strip_tags($this->input->post('nama_ortu'));
				$jk = implode(',', $this->input->post('jk'));
        		$angkatan = strip_tags($this->input->post('angkatan'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$file1 = strip_tags($this->input->post('old_profile'));
				$file2 = strip_tags($this->input->post('old_doc'));
				$data = array(
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
            'date' => $date,
            'email' => $email,
    );
    $where = array(
      'nim' => $nim,
    );
    $this->Admin_model->UpdateMhs($where, $data, 'tbl_mahasiswa');
    redirect('Mahasiswa/biodata');
  	}
    public function update_status()
    {
        if (isset($_REQUEST['sval'])) {
            $data['tbl_mahasiswa'] = $this->Admin_model->update_status();
            redirect('Mahasiswa');
        }
    }
    public function delete($id, $nama)
    {
        $this->Admin_model->deleteMhs($id, $nama);
        redirect('Mahasiswa');
    }
    public function krs()
    {

        $this->session->set_flashdata('message', '<div class="alert alert-dark" role="alert">
        <h4 class="alert-heading">PERHATIAN!</h4>
        <p>- Di mohon sebelum input data KRS , dipilih sesuai kredit SKS anda -</p>
        <hr>
        <p class="mb-0">Kredit SKS = 10.</p>
        </div>');
        $this->session->set_flashdata('message_error', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Jumlah SKS anda melebihi Kredit yang telah ditentukan</div>');
        $this->session->set_flashdata('message_success', '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Jumlah SKS Anda mencukupi Kredit yang telah ditentukan</div>');

        $nim = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
        $data['title'] = 'Data Mahasiswa';
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['tbl_semester'] = $this->Main_model->getAllSemester()->result();
        $data['tbl_krs'] = $this->Admin_model->getDataKrs($nim)->result();
        $data['tbl_mahasiswa'] = $this->Admin_model->get_all_krs($name);
        $data['user'] =  $this->Admin_model->get_data_user($nim);
        //$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_mhs', $data);
        $this->load->view('templates/topbar_mhs', $data);
        $this->load->view('mahasiswa/krs', $data);
        $this->load->view('templates/footer');
    }
    //field,name form, required
    public function addKrs($name)
    {
        $data['title'] = 'Tambah KRS';
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['tbl_semester'] = $this->Main_model->getAllSemester()->result();
        $data['tbl_mahasiswa'] = $this->Admin_model->get_all_krs($name);
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        /*$this->form_validation->set_rules('krs_id', 'krs_id', 'required');
         $this->form_validation->set_rules('kode_makul', 'kode_makul');
         $this->form_validation->set_rules('nama_makul', 'nama_makul');
         $this->form_validation->set_rules('nama_prodi', 'nama_prodi');
         $this->form_validation->set_rules('name', 'name');
         $this->form_validation->set_rules('sks', 'sks', 'required');*/
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_mhs', $data);
            $this->load->view('templates/topbar_mhs', $data);
            $this->load->view('mahasiswa/addKrs', $data);
            $this->load->view('templates/footer');
        }
    }
    public function SaveKrs()
    {
        $this->form_validation->set_rules('krs_id', 'krs_id');
        $this->form_validation->set_rules('pilihan', 'pilihan');
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama_semester', 'nama_semester', 'required');
        $this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            unset($data['submit']);
            $this->Admin_model->insertKrs($data);
            redirect('Mahasiswa/krs');
        } else {
            echo validation_errors();
        }
    }
    //delete
    function  deleteKrs()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->Admin_model->delete_data_krs($id[$count]);
            }
        }
    }
    function getSemester()
    {
        $semester = $this->input->post('id', TRUE);
        $prodi = $this->input->post('prodi', TRUE);
        $data = $this->Main_model->get_sub_semester($semester, $prodi)->result_array();
        echo json_encode($data);
    }
}

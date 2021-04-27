<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
		$this->load->library('form_validation');
		require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
  }


  public function index()
  {
    $data['title'] = 'Pegawai STIT FATAHILLAH';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }
  public function change_password()
  {
    $data['title'] = 'Pegawai STIT FATAHILLAH';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('old_password', 'Old password','required|trim');
    $this->form_validation->set_rules('new_password', 'New password', 
    'required|trim|matches[repeat_password]');
    $this->form_validation->set_rules('repeat_password', 'Repeat password', 
    'required|trim|matches[new_password]');
    if ($this->form_validation->run() == FALSE) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/account_pegawai', $data);
    $this->load->view('templates/footer');
    } else{
      $old_password = $this->input->post('old_password');
      $new_password = $this->input->post('new_password');
      if(!password_verify($old_password,$data['user']['password'])){
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong Old Password </div>');
        redirect('Pegawai/change_password');
      } else{
        if ($old_password == $new_password){
          $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert"> Wrong Old Password </div>');
        redirect('Pegawai/change_password');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password',$password_hash);
          $this->db->where('username',$this->session->userdata('username'));
          $this->db->update('tbl_user');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Password Changed </div>');
        redirect('Pegawai/change_password');
        }
      }
    }
  }
  public function dasboard()
  {
    $data['title'] = 'Pegawai STIT FATAHILLAH';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/cpanel', $data);
    $this->load->view('templates/footer');
  }

  /*********************** START CONTROLLER Dosen *************************************/
  public function dosen()
  {
    $data['title'] = 'Data Dosen';
    $data['data'] = $this->Main_model->getAll();
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dosen/content', $data);
    $this->load->view('templates/footer');
  }
  public function dosen_pgmi()
  {
    $data['title'] = 'Data Dosen';
    $data['data'] = $this->Main_model->getAllpgmi();
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dosen/content', $data);
    $this->load->view('templates/footer');
  }
  public function dosen_mpi()
  {
    $data['title'] = 'Data Dosen';
    $data['data'] = $this->Main_model->getAllmpi();
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dosen/content', $data);
    $this->load->view('templates/footer');
  }
  //field,name form, required
  public function addDosen()
  {
   			$config['upload_path'] = './uploads/profile_dosen/'; //path folder
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
        $this->upload->initialize($config);
        $path = $_FILES['profile']['name'];
        if (!empty($path)) {
        $id = strip_tags($this->input->post('kode_dosen'));
        $nidn = strip_tags($this->input->post('nidn'));
        $nama = strip_tags($this->input->post('nama_dosen'));
        $tmt = strip_tags($this->input->post('tmt'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
				$gbr = $this->upload->data();
				$file = $gbr['file_name'];
                $this->Main_model->tambahDataDosen(
                    $nidn,
                    $id,
                    $nama,
                    $tmt,
                    $prodi,
                    $file
                );
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Add Data Success  </div>');
                redirect('Pegawai/dosen');
				} 
  }
  //delete
  public function hapusDosen()
  {
    $nidn = $this->input->post('nidn');
		$nama = $this->input->post('nama_dosen');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Delete Data Success  </div>');
    $this->Main_model->deleteDosen($nidn, $nama);
    redirect('Pegawai/dosen');
  }

  //edit
  public function updateDosen()
		{
    $config['upload_path'] = './uploads/profile_dosen/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
    $config['overwrite'] = true;
    $this->upload->initialize($config);
    $path = $_FILES['profile']['name'];
    if (!empty($path)) {
        $id = strip_tags($this->input->post('kd_dosen'));
        $nidn = strip_tags($this->input->post('nidn'));
        $nama = strip_tags($this->input->post('nama_dosen'));
				$tmt = strip_tags($this->input->post('tmt'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
        $gbr = $this->upload->data();
				$file = $gbr['file_name'];
        $data = array(
            'kd_dosen' => $id,
            'nidn' => $nidn,
            'nama_dosen' => $nama,
            'TMT' => $tmt,
            'prodi_id' => $prodi,
            'image' => $file,
        );
        $where = array(
          'kd_dosen' => $id,
				);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Update Data Success  </div>');
				$this->Main_model->updateDosen($where, $data, 'tbl_dosen');
				redirect('Pegawai/dosen');
				}
				else{
    		$id = strip_tags($this->input->post('kd_dosen'));
        $nidn = strip_tags($this->input->post('nidn'));
        $nama = strip_tags($this->input->post('nama_dosen'));
				$tmt = strip_tags($this->input->post('tmt'));
				$prodi = strip_tags($this->input->post('prodi_id'));
				$file = strip_tags($this->input->post('old_profile'));
        $data = array(
            'kd_dosen' => $id,
            'nidn' => $nidn,
            'nama_dosen' => $nama,
            'TMT' => $tmt,
            'prodi_id' => $prodi,
            'image' => $file,
        );
        $where = array(
          'kd_dosen' => $id,
				);
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Update Data Success  </div>');
				$this->Main_model->updateDosen($where, $data, 'tbl_dosen');
				redirect('Pegawai/dosen'); 
			} 
  }
  /*********************** END CONTROLLER Dosen *************************************/

  /*********************** START CONTROLLER Mahasiswa *************************************/
  public function mahasiswa()
  {
    $data['title'] = 'Data Mahasiswa';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Admin_model->get_all();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('mahasiswa/content', $data);
    $this->load->view('templates/footer');
	}
  public function mahasiswa_pgmi()
  {
    $data['title'] = 'Data Mahasiswa';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Admin_model->get_all_pgmi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('mahasiswa/content', $data);
    $this->load->view('templates/footer');
  }
  public function mahasiswa_mpi()
  {
    $data['title'] = 'Data Mahasiswa';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Admin_model->get_all_mpi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('mahasiswa/content', $data);
    $this->load->view('templates/footer');
  }
  function savemhs()
  {
				
        $config['upload_path'] = './uploads/profile_mhs/'; //path folder
        $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
        $this->upload->initialize($config);
        $path = $_FILES['profile']['name'];
        $doc = $_FILES['doc']['name'];
        if (!empty($path && $doc)) {
        $id = strip_tags($this->input->post('id_mahasiswa'));
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
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
				$gbr = $this->upload->data();
				$file2 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
				$gbr2 = $this->upload->data();
				$file1 = $gbr2['file_name'];
                $this->Admin_model->saveMhs(
                    $id,
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
										$file1
                );
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Update Data Success  </div>');
                redirect('Pegawai/mahasiswa'); 
				}
				else if (!empty($path)) {
        $id = strip_tags($this->input->post('id_mahasiswa'));
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
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
				$gbr = $this->upload->data();
				$file2 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
				$gbr2 = $this->upload->data();
				$file1 = $gbr2['file_name'];
                $this->Admin_model->saveMhs3(
                    $id,
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
                    $file1
                );
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Pegawai/mahasiswa');
				} 
				else if (!empty($doc)) {
				$id = strip_tags($this->input->post('id_mahasiswa'));
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
				$this->upload->do_upload($_FILES['doc']['name']);
				$this->upload->do_upload('doc');
				$gbr = $this->upload->data();
				$file2 = $gbr['file_name'];
				$this->upload->do_upload($_FILES['profile']['name']);
				$this->upload->do_upload('profile');
				$gbr2 = $this->upload->data();
				$file1 = $gbr2['file_name'];
        $this->Admin_model->saveMhs2(
                    $id,
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
										$file1	
								);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Pegawai/mahasiswa');
			}
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
				redirect('Pegawai/mahasiswa');
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
				redirect('Pegawai/mahasiswa');
				
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
				redirect('Pegawai/mahasiswa');
				
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
    redirect('Pegawai/mahasiswa');
  }

  public function update_status()
  {
    if (isset($_REQUEST['sval'])) {
      $data['tbl_mahasiswa'] = $this->Admin_model->update_status();
      redirect('Pegawai/mahasiswa');
    }
  }
  public function deleteMahas()
  {
    $nim = $this->input->post('nim');
    $this->Admin_model->deleteMhs($nim);
    redirect('Pegawai/mahasiswa');
  }

  /************************** END CONTROLLER MAHASISWA **********************************/



  /*********************** START CONTROLLER PRODDI *************************************/

  // Khusus PRODI
  public function prodi()
  {
    $data['title'] = 'Data Prodi';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getAllProdi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('prodi/content', $data);
    $this->load->view('templates/footer');
  }
  public function prodi_pgmi()
  {
    $data['title'] = 'Data Prodi';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getProdipgmi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('prodi/content', $data);
    $this->load->view('templates/footer');
  }
  public function prodi_mpi()
  {
    $data['title'] = 'Data Prodi';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getProdimpi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('prodi/content', $data);
    $this->load->view('templates/footer');
  }
  //field,name form, required
  public function addProdi()
  {
    $data['title'] = 'Tambah Prodi';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('prodi_id', 'prodi_id');
    $this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required');
    $this->form_validation->set_rules('ketua', 'ketua', 'required');
    $this->form_validation->set_rules('no_izin', 'no_izin', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_pegawai', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('prodi/add', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Main_model->tambahDataProdi();
      redirect('Pegawai/prodi');
      exit;
    }
  }
  //delete
  public function deleteProdi()
  {
    $prodi_id = $this->input->post('prodi_id');
    $this->Main_model->hapusProdi($prodi_id);
    redirect('Pegawai/prodi');
  }
  //edit
  public function updateProdi()
  {
    $prodi_id = $this->input->post('prodi_id');
    $nama_prodi = $this->input->post('nama_prodi');
    $ketua = $this->input->post('ketua');
    $no_izin = $this->input->post('no_izin');
    $data = array(
      'prodi_id' => $prodi_id,
      'nama_prodi' => $nama_prodi,
      'ketua' => $ketua,
      'no_izin' => $no_izin,
    );

    $where = array(
      'prodi_id' => $prodi_id
    );

    $this->Main_model->updateProdi($where, $data, 'tbl_prodi');
    redirect('Pegawai/prodi');
  }

  /*********************** END CONTROLLER PRODI *************************************/

  /*********************** START CONTROLLER MATKUL *************************************/
  //Mata Kuliah
  public function matkul()
  {
		$data['title'] = 'Data Mata Kuliah';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['tbl_dosen'] = $this->Main_model->getAll()->result();
    $data['tbl_semester'] = $this->Main_model->getAllSemester()->result();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getAllMatkul();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('matkul/content', $data);
		$this->load->view('templates/footer');

  }
  public function matkul_pgmi()
  {
    $data['title'] = 'Data Mata Kuliah';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['tbl_dosen'] = $this->Main_model->getAll()->result();
    $data['tbl_semester'] = $this->Main_model->getAllSemester()->result();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getMatkulpgmi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('matkul/content', $data);
    $this->load->view('templates/footer');
  }
  public function matkul_mpi()
  {
    $data['title'] = 'Data Mata Kuliah';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $data['tbl_dosen'] = $this->Main_model->getAll()->result();
    $data['tbl_semester'] = $this->Main_model->getAllSemester()->result();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getMatkulmpi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('matkul/content', $data);
			$this->load->view('templates/footer');
		}
  function addMatkul()
  {
    $data['title'] = 'Tambah Mata Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('makul_id', 'makul_id');
    $this->form_validation->set_rules('kode_makul', 'kode_makul', 'required');
    $this->form_validation->set_rules('nama_makul', 'nama_makul', 'required');
    $this->form_validation->set_rules('nidn', 'nidn', 'required');
    $this->form_validation->set_rules('sks', 'sks', 'required');
    $this->form_validation->set_rules('nama_semester', 'nama_semester', 'required');
    $this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required');
    if ($this->form_validation->run() == FALSE) {
     $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('matkul/content', $data);
    $this->load->view('templates/footer');
    } else {
			$this->Main_model->tambahDataMatkul();
			redirect('Pegawai/matkul');
    }
  }
  public function deleteMatkul()
  {
    $makul_id = $this->input->post('makul_id');
    $this->Main_model->hapusMatkul($makul_id);
    redirect('Pegawai/matkul');
  }
  public function updateMatkul()
  {
    $makul_id = $this->input->post('makul_id');
    $kode_makul = $this->input->post('kode_makul');
    $nama_makul = $this->input->post('nama_makul');
    $nidn = $this->input->post('nidn');
    $sks = $this->input->post('sks');
    $semester = $this->input->post('nama_semester');
    $prodi_id = $this->input->post('prodi_id');
    $data = array(
      'makul_id' => $makul_id,
      'kode_makul' => $kode_makul,
      'nama_makul' => $nama_makul,
      'nidn' => $nidn,
      'sks' => $sks,
      'nama_semester' => $semester,
      'prodi_id' => $prodi_id,
    );

    $where = array(
      'makul_id' => $makul_id
    );

    $this->Main_model->updateMatkul($where, $data, 'tbl_matakuliah');
    redirect('Pegawai/matkul');
  }


  /*********************** END CONTROLLER MATKUL *************************************/


  /*********************** START CONTROLLER JADWAL *************************************/
  //Jadwal Kuliah
  public function jadwal()
  {
    $data['title'] = 'Jadwal Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_jadwal'] = $this->Main_model->getAllJadwal();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('jadwal/content', $data);
    $this->load->view('templates/footer');
  }
  public function jadwal_pgmi()
  {
    $data['title'] = 'Jadwal Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_jadwal'] = $this->Main_model->getJadwalpgmi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('jadwal/content', $data);
    $this->load->view('templates/footer');
  }
  public function jadwal_mpi()
  {
    $data['title'] = 'Jadwal Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_jadwal'] = $this->Main_model->getJadwalmpi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('jadwal/content', $data);
    $this->load->view('templates/footer');
  }
  function addJadwal()
  {
    $data['title'] = 'Tambah Data Jadwal Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_matakuliah'] = $this->Main_model->getAllMatkul();
    $data['tbl_ruangan'] = $this->Main_model->getAllRuangan();
    $this->form_validation->set_rules('id_jadwal', 'id_jadwal');
    $this->form_validation->set_rules('hari', 'hari', 'required');
    $this->form_validation->set_rules('kode_makul', 'kode_makul', 'required');
    $this->form_validation->set_rules('nama_makul', 'nama_makul', 'required');
    $this->form_validation->set_rules('prodi_id', 'prodi_id', 'required');
    $this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required');
    $this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required');
    $this->form_validation->set_rules('nidn', 'nidn', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_pegawai', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('jadwal/add', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Main_model->tambahDataJadwal();
      redirect('Pegawai/jadwal');
      exit;
    }
	}
	function editJadwal($id)
  {
    $data['title'] = 'Update Data Jadwal Kuliah';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['makul'] = $this->Main_model->getAllMatkul();
		$data['data'] = $this->Main_model->getAllJadwalEdit($id);
    $data['tbl_ruangan'] = $this->Main_model->getAllRuangan()->result();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_pegawai', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('jadwal/edit', $data);
      $this->load->view('templates/footer');
	}
	public function proses_updateRuangan()
  {
    $id_jadwal = $this->input->post('id_jadwal');
    $hari = $this->input->post('hari');
    $kode_makul = $this->input->post('kode_makul');
    $nama_makul = $this->input->post('nama_makul');
    $prodi_id = $this->input->post('prodi_id');
    $jam_mulai = $this->input->post('jam_mulai');
    $jam_selesai = $this->input->post('jam_selesai');
    $nidn = $this->input->post('nidn');
    $keterangan = $this->input->post('keterangan');
    $data = array(
      'id_jadwal' => $id_jadwal,
      'hari' => $hari,
      'kode_makul' => $kode_makul,
      'nama_makul' => $nama_makul,
      'prodi_id' => $prodi_id,
      'jam_mulai' => $jam_mulai,
      'jam_selesai' => $jam_selesai,
      'nidn' => $nidn,
      'keterangan' => $keterangan,
    );
    $where = array(
      'id_jadwal' => $id_jadwal
    );

    $this->Main_model->updateDataJadwal($where, $data, 'tbl_jadwal');
    redirect('Pegawai/jadwal');
  }
  function getMatkul()
  {
    $matkul = $this->input->post('id', TRUE);
    $data = $this->Main_model->get_sub_matkul($matkul)->result();
    echo json_encode($data);
  }
  public function deleteJadwal($id_jadwal)
  {
    $this->Main_model->deleteJadwal($id_jadwal);
    redirect('Pegawai/jadwal');
  }
  function get_edit($jadwal_id)
  {
    $data['jadwal_id'] = $jadwal_id;
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_matakuliah'] = $this->Main_model->getAllMatkul();
    $get_data = $this->Main_model->get_data_by_id($jadwal_id);
    if ($get_data->num_rows() > 0) {
      $row = $get_data->row_array();
      $data['nama_makul'] = $row['nama_makul'];
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('jadwal/edit', $data);
    $this->load->view('templates/footer');
  }
  function get_dataa_edit()
  {
    $id_jadwal = $this->input->post('id_jadwal', TRUE);
    $data = $this->Main_model->get_data_by_id($id_jadwal)->result();
    echo json_encode($data);
  }

  /*********************** START CONTROLLER RUANGAN *************************************/

  // Khusus Ruangan
  public function ruangan()
  {
    $data['title'] = 'Data Ruangan';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['data'] = $this->Main_model->getAllRuangan();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('ruangan/content', $data);
    $this->load->view('templates/footer');
  }
  //field,name form, required
  public function addRuangan()
  {
    $data['title'] = 'Tambah Ruangan';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->form_validation->set_rules('id', 'id');
    $this->form_validation->set_rules('kode_ruangan', 'kode_ruangan', 'required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_pegawai', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('ruangan/add', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Main_model->tambahDataRuangan();
      redirect('Pegawai/ruangan');
      exit;
    }
  }
  //delete
  public function deleteRuangan()
  {
    $id = $this->input->post('id');
    $this->Main_model->deleteRuangan($id);
    redirect('Pegawai/ruangan');
  }
  public function updateRuangan()
  {
    $id = $this->input->post('id');
    $kode = $this->input->post('kode_ruangan');
    $ket = $this->input->post('keterangan');
    $data = array(
      'id' => $id,
      'kode_ruangan' => $kode,
      'keterangan' => $ket,
    );

    $where = array(
      'id' => $id
    );

    $this->Main_model->updateProdi($where, $data, 'tbl_ruangan');
    redirect('Pegawai/ruangan');
  }


  /*********************** END CONTROLLER RUANGAN *************************************/


  //Pmb
  public function pmb()
  {
    $data['title'] = 'Data Pmb';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_pmb'] = $this->Main_model->getAllPmb()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pmb/content', $data);
    $this->load->view('templates/footer');
  }
  public function pmb_pgmi()
  {
    $data['title'] = 'Data Pmb';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_pmb'] = $this->Main_model->getPmbpgmi()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pmb/content', $data);
    $this->load->view('templates/footer');
  }
  public function pmb_mpi()
  {
    $data['title'] = 'Data Pmb';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_pmb'] = $this->Main_model->getPmbmpi()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pmb/content', $data);
    $this->load->view('templates/footer');
  }
  public function addPmb()
  {
    $data['title'] = 'Tambah Data';
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $this->session->set_flashdata('message', '<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           Form Pendaftaran Online STIT FATAHILLAH</div>');
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pmb/add', $data);
    $this->load->view('templates/footer');
  }
  function saveData()
  {
    $config['upload_path'] = './uploads/profile_mhs/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
    $config['overwrite'] = true;
    $this->upload->initialize($config);
    if (!empty($_FILES['foto']['name'])) {
      if ($this->upload->do_upload('foto')) {
        $id = strip_tags($this->input->post('id_pmb'));
        $no = strip_tags($this->input->post('no_regis'));
        $prodi = strip_tags($this->input->post('prodi_id'));
        $kelas = implode(',', $this->input->post('kelas'));
        $nama = strip_tags($this->input->post('nama'));
        $tempat = strip_tags($this->input->post('tempat'));
        $date = strip_tags($this->input->post('date'));
        $jk = implode(',', $this->input->post('jk'));
        $status = implode(',', $this->input->post('status'));
        $agama = strip_tags($this->input->post('agama'));
        $warga_negara = strip_tags($this->input->post('warga_negara'));
        $alamat = strip_tags($this->input->post('alamat'));
        $sd = strip_tags($this->input->post('sd'));
        $lulus_sd = strip_tags($this->input->post('lulus_sd'));
        $smp = strip_tags($this->input->post('smp'));
        $lulus_smp = strip_tags($this->input->post('lulus_smp'));
        $sma = strip_tags($this->input->post('sma'));
        $lulus_sma = strip_tags($this->input->post('lulus_sma'));
        $kuliah = strip_tags($this->input->post('kuliah'));
        $lulus_kuliah = strip_tags($this->input->post('lulus'));
        $ayah = strip_tags($this->input->post('nama_ayah'));
        $ibu = strip_tags($this->input->post('nama_ibu'));
        $usia_ayah = strip_tags($this->input->post('usia_ayah'));
        $usia_ibu = strip_tags($this->input->post('usia_ibu'));
        $pekerjaan_ayah = strip_tags($this->input->post('pekerjaan_ayah'));
        $pekerjaan_ibu = strip_tags($this->input->post('pekerjaan_ibu'));
        $pd_ayah = strip_tags($this->input->post('pd_ayah'));
        $pd_ibu = strip_tags($this->input->post('pd_ibu'));
        $stat_ayah = strip_tags($this->input->post('stat_ayah'));
        $stat_ibu = strip_tags($this->input->post('stat_ibu'));
        $alamat_ortu = strip_tags($this->input->post('alamat_ortu'));
        $gbr = $this->upload->data();
        $file = $gbr['file_name'];
        $this->Main_model->savePmb(
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
        );
        echo $this->session->set_flashdata('msg', 'success');
       redirect('Pegawai/pmb');
      }
    } else {
      $id = strip_tags($this->input->post('id_pmb'));
      $no = strip_tags($this->input->post('no_regis'));
      $prodi = strip_tags($this->input->post('prodi_id'));
      $kelas = implode(',', $this->input->post('kelas'));
      $nama = strip_tags($this->input->post('nama'));
      $tempat = strip_tags($this->input->post('tempat'));
      $date = strip_tags($this->input->post('date'));
      $jk = implode(',', $this->input->post('jk'));
      $status = implode(',', $this->input->post('status'));
      $agama = strip_tags($this->input->post('agama'));
      $warga_negara = strip_tags($this->input->post('warga_negara'));
      $alamat = strip_tags($this->input->post('alamat'));
      $sd = strip_tags($this->input->post('sd'));
      $lulus_sd = strip_tags($this->input->post('lulus_sd'));
      $smp = strip_tags($this->input->post('smp'));
      $lulus_smp = strip_tags($this->input->post('lulus_smp'));
      $sma = strip_tags($this->input->post('sma'));
      $lulus_sma = strip_tags($this->input->post('lulus_sma'));
      $kuliah = strip_tags($this->input->post('kuliah'));
      $lulus_kuliah = strip_tags($this->input->post('lulus'));
      $ayah = strip_tags($this->input->post('nama_ayah'));
      $ibu = strip_tags($this->input->post('nama_ibu'));
      $usia_ayah = strip_tags($this->input->post('usia_ayah'));
      $usia_ibu = strip_tags($this->input->post('usia_ibu'));
      $pekerjaan_ayah = strip_tags($this->input->post('pekerjaan_ayah'));
      $pekerjaan_ibu = strip_tags($this->input->post('pekerjaan_ibu'));
      $pd_ayah = strip_tags($this->input->post('pd_ayah'));
      $pd_ibu = strip_tags($this->input->post('pd_ibu'));
      $stat_ayah = strip_tags($this->input->post('stat_ayah'));
      $stat_ibu = strip_tags($this->input->post('stat_ibu'));
      $alamat_ortu = strip_tags($this->input->post('alamat_ortu'));
      $this->Main_model->saveNoFotoPmb(
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
      );
      echo $this->session->set_flashdata('msg', 'success');
      redirect('Pegawai/pmb');
    }
  }

  public function deletePmb($id)
  {

    $this->Main_model->deletePmb($id);
    redirect('Pegawai/pmb');
  }
  public function editPmb($id)
  {
    $data['title'] = 'Edit PMB';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_pmb'] = $this->Main_model->getJoinPmb($id);
    $this->session->set_flashdata('message', '<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           Form Pendaftaran Online STIT FATAHILLAH</div>');
    $data['tbl_prodi'] = $this->Main_model->getAllProdi();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pmb/edit', $data);
    $this->load->view('templates/footer');
  }

  public function updatePmb()
  {
    $config['upload_path'] = './upload/profile_mhs/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
    $config['overwrite'] = true;
    $this->upload->initialize($config);
    $path = $_FILES['foto']['name'];
    if (!empty($path)) {
      if ($this->upload->do_upload('foto')) {
        $id = strip_tags($this->input->post('id_pmb'));
        $no = strip_tags($this->input->post('no_regis'));
        $prodi = strip_tags($this->input->post('prodi_id'));
        $kelas = implode(',', $this->input->post('kelas'));
        $nama = strip_tags($this->input->post('nama'));
        $tempat = strip_tags($this->input->post('tempat'));
        $date = strip_tags($this->input->post('date'));
        $jk = implode(',', $this->input->post('jk'));
        $status = implode(',', $this->input->post('status'));
        $agama = strip_tags($this->input->post('agama'));
        $warga_negara = strip_tags($this->input->post('warga_negara'));
        $alamat = strip_tags($this->input->post('alamat'));
        $sd = strip_tags($this->input->post('sd'));
        $lulus_sd = strip_tags($this->input->post('lulus_sd'));
        $smp = strip_tags($this->input->post('smp'));
        $lulus_smp = strip_tags($this->input->post('lulus_smp'));
        $sma = strip_tags($this->input->post('sma'));
        $lulus_sma = strip_tags($this->input->post('lulus_sma'));
        $kuliah = strip_tags($this->input->post('kuliah'));
        $lulus_kuliah = strip_tags($this->input->post('lulus'));
        $ayah = strip_tags($this->input->post('nama_ayah'));
        $ibu = strip_tags($this->input->post('nama_ibu'));
        $usia_ayah = strip_tags($this->input->post('usia_ayah'));
        $usia_ibu = strip_tags($this->input->post('usia_ibu'));
        $pekerjaan_ayah = strip_tags($this->input->post('pekerjaan_ayah'));
        $pekerjaan_ibu = strip_tags($this->input->post('pekerjaan_ibu'));
        $pd_ayah = strip_tags($this->input->post('pd_ayah'));
        $pd_ibu = strip_tags($this->input->post('pd_ibu'));
        $stat_ayah = strip_tags($this->input->post('stat_ayah'));
        $stat_ibu = strip_tags($this->input->post('stat_ibu'));
        $alamat_ortu = strip_tags($this->input->post('alamat_ortu'));
        $gbr = $this->upload->data();
        $file = $gbr['file_name'];
        $data = array(
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
          'id_pmb' => $id,
        );
        $where = array(
          'id_pmb' => $id,
        );
        $this->Main_model->UpdatePmb($where, $data, 'tbl_pmb');
        $data_ortu = array(
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
        );
        $where = array(
          'id_pmb' => $id,
        );
        $this->Main_model->UpdateDataOrtu($where, $data_ortu, 'tbl_ortu');
        $data_pendidikan = array(
          'id_pmb' => $id,
          'sd' => $sd,
          'smp' => $smp,
          'sma' => $sma,
          'kuliah' => $kuliah,
          'lulus_sd' => $lulus_sd,
          'lulus_smp' => $lulus_smp,
          'lulus_sma' => $lulus_sma,
          'lulus_kuliah' => $lulus_kuliah,
        );
        $where = array(
          'id_pmb' => $id,
        );
        $this->Main_model->UpdateDataPendidikan($where, $data_pendidikan, 'tbl_pendidikan');
      }
      redirect('Pegawai/pmb');
    }
    $id = strip_tags($this->input->post('id_pmb'));
    $no = strip_tags($this->input->post('no_regis'));
    $prodi = strip_tags($this->input->post('prodi_id'));
    $kelas = implode(',', $this->input->post('kelas'));
    $nama = strip_tags($this->input->post('nama'));
    $tempat = strip_tags($this->input->post('tempat'));
    $date = strip_tags($this->input->post('date'));
    $jk = implode(',', $this->input->post('jk'));
    $status = implode(',', $this->input->post('status'));
    $agama = strip_tags($this->input->post('agama'));
    $warga_negara = strip_tags($this->input->post('warga_negara'));
    $alamat = strip_tags($this->input->post('alamat'));
    $sd = strip_tags($this->input->post('sd'));
    $lulus_sd = strip_tags($this->input->post('lulus_sd'));
    $smp = strip_tags($this->input->post('smp'));
    $lulus_smp = strip_tags($this->input->post('lulus_smp'));
    $sma = strip_tags($this->input->post('sma'));
    $lulus_sma = strip_tags($this->input->post('lulus_sma'));
    $kuliah = strip_tags($this->input->post('kuliah'));
    $lulus_kuliah = strip_tags($this->input->post('lulus'));
    $ayah = strip_tags($this->input->post('nama_ayah'));
    $ibu = strip_tags($this->input->post('nama_ibu'));
    $usia_ayah = strip_tags($this->input->post('usia_ayah'));
    $usia_ibu = strip_tags($this->input->post('usia_ibu'));
    $pekerjaan_ayah = strip_tags($this->input->post('pekerjaan_ayah'));
    $pekerjaan_ibu = strip_tags($this->input->post('pekerjaan_ibu'));
    $pd_ayah = strip_tags($this->input->post('pd_ayah'));
    $pd_ibu = strip_tags($this->input->post('pd_ibu'));
    $stat_ayah = strip_tags($this->input->post('stat_ayah'));
    $stat_ibu = strip_tags($this->input->post('stat_ibu'));
    $alamat_ortu = strip_tags($this->input->post('alamat_ortu'));
    $file = $this->input->post('old_foto');
    $data = array(
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
      'id_pmb' => $id,
    );
    $where = array(
      'id_pmb' => $id,
    );
    $this->Main_model->UpdatePmb($where, $data, 'tbl_pmb');
    $data_ortu = array(
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
    );
    $where = array(
      'id_pmb' => $id,
    );
    $this->Main_model->UpdateDataOrtu($where, $data_ortu, 'tbl_ortu');
    $data_pendidikan = array(
      'id_pmb' => $id,
      'sd' => $sd,
      'smp' => $smp,
      'sma' => $sma,
      'kuliah' => $kuliah,
      'lulus_sd' => $lulus_sd,
      'lulus_smp' => $lulus_smp,
      'lulus_sma' => $lulus_sma,
      'lulus_kuliah' => $lulus_kuliah,
    );
    $where = array(
      'id_pmb' => $id,
    );
    $this->Main_model->UpdateDataPendidikan($where, $data_pendidikan, 'tbl_pendidikan');
    redirect('Pegawai/pmb');
  }


  public function addUpload()
  {
    $data['title'] = 'Upload File';
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['tbl_dosen'] = $this->Main_model->getAll()->result();
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('upload/add', $data);
      $this->load->view('templates/footer');
    }
  }
  function save_upload()
  {
    $config['upload_path'] = './uploads/files/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png'; //type yang dapat diakses bisa anda sesuaikan
    $config['max_size'] = 10000;
    $this->upload->initialize($config);
    if (!empty($_FILES['file']['name'])) {
      if ($this->upload->do_upload('file')) {
        $id = strip_tags($this->input->post('id'));
        $nidn = strip_tags($this->input->post('nidn'));
        $title = strip_tags($this->input->post('title'));
        $gbr = $this->upload->data();
        $file = $gbr['file_name'];
        $this->Main_model->saveUpload($id, $nidn, $title, $file);
        redirect('Pegawai/addUpload');
      }
    }
  }

  /********************** START CONTROLLER INPUT NILAI ************/
  public function inputNilai()
  {
    $nidn = $this->session->userdata('nim');
    $name = $this->session->userdata('username');
    $data['title'] = 'Input Nilai';
    $data['data'] = $this->Main_model->getAllMatkulDosen($nidn);
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['semester'] = $this->M_Pegawai->getSemester()->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pegawai/masuk_input_nilai', $data);
    $this->load->view('templates/footer');
  }

  public function input_nilai()
  {
    $nidn = $this->session->userdata('nim');
    $name = $this->session->userdata('username');
    $param = array(
      'tbl_matakuliah.kode_makul' => $this->input->post('kode_matkul', true),
      'tbl_krs.nama_semester' => $this->input->post('semester', true),
    );

    $data = array(
      'matkul' => $this->M_Pegawai->getMatkul($param)->result(),
    );

    $data['title'] = 'Input Nilai';
    $data['kode_makul'] = $this->input->post('kode_matkul');
    $data['semester'] = $this->input->post('semester');
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pegawai/input_nilai', $data);
    $this->load->view('templates/footer');
  }

  public function proses_input_nilai()
  {
    for ($i = 0; $i < count($this->input->post()); $i++) {
      $data[] = array(
        'krs_id' => $this->input->post('krs_id')[$i],
        'nilai' => strtoupper($this->input->post('nilai')[$i])
      );
    }

    $this->M_Pegawai->updateNilai($data);
    $this->session->set_flashdata('pesan', 'Berhasil update nilai');
    redirect('pegawai/inputNilai');
  }

	/*********************** END CONTROLLER NILAI  *****************/
	/*********************** START CONTROLLER REPORT ABSENS  *****************/
	public function reportAbsen()
  {
    $data['title'] = 'Report Absen';
    $data['dosen'] = $this->M_Pegawai->getDosen()->result();
    $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar_pegawai', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pegawai/report', $data);
    $this->load->view('templates/footer');
  }

  public function makulByDosen()
  {
    $nidn = $this->input->post('nidn');
    echo json_encode($this->M_Pegawai->getMatkulByDosen($nidn)->result());
  }

  public function print()
  {
    $kode = $this->input->post('kode_makul');
    $awal = $this->input->post('awal');
    $akhir = $this->input->post('akhir');

    $data = array(
      'no' => 1,
      'data' => $this->M_Pegawai->getReport($kode, $awal, $akhir)->result(),
    );

    $nama = 'laporan_absen_' . date('d-m-Y') . '.pdf';
    $html = $this->load->view('pegawai/print', $data, true);
    $dompdf = new Dompdf();
    $dompdf->load_html($html);
    $dompdf->set_paper('A4', 'potrait');
    $dompdf->render();
    $dompdf->output();
    $dompdf->stream($nama, array("Attachment" => false));
	}
	
}

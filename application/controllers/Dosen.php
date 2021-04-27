<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    /*********************** START CONTROLLER DOSEN *************************************/

    public function index()
    {
        $data['title'] = 'Data Dosen';
        $data['data'] = $this->Main_model->getAll();
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/content', $data);
        $this->load->view('templates/footer');
	}
	public function addUpload()
  {
    $data['title'] = 'Upload File';
   	$nidn = $this->session->userdata('nim');
    $name = $this->session->userdata('username');
	$data['user'] =  $this->Main_model->get_data_dosen($nidn);
    $data['tbl_dosen'] = $this->Main_model->getAll()->result();
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar_dosen', $data);
      $this->load->view('templates/topbar_dosen', $data);
      $this->load->view('upload/add', $data);
      $this->load->view('templates/footer');
    }
  }
  function save_upload()
  {
    $config['upload_path'] = './uploads/files/'; //path folder
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|jpg|gif|png|xlsx|csv'; //type yang dapat diakses bisa anda sesuaikan
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
        redirect('Dosen/addUpload');
      }
    }
  }
	public function dashboard()
    {
		$data['title'] = 'Dashboard';
		$nidn = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
		$data['user'] =  $this->Main_model->get_data_dosen($nidn);
		//$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar_dosen', $data);
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('templates/footer');
    }
	public function biodata()
    {
		$nim = $this->session->userdata('nim');
		$data['data'] = $this->Main_model->getBiodata($nim);
        $data['tbl_prodi'] = $this->Main_model->getAllProdi();
        $name = $this->session->userdata('username');
		$data['title'] = 'My Profile';
		$data['user'] =  $this->Admin_model->get_data_user($nim);
		//$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar_dosen', $data);
        $this->load->view('dosen/biodata', $data);
        $this->load->view('templates/footer');
    }
    //field,name form, required
    public function add()
    {
        $data['title'] = 'Tambah Dosen';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('kd_dosen', 'kd_dosen');
        $this->form_validation->set_rules('nidn', 'nidn', 'required');
        $this->form_validation->set_rules('nama_dosen', 'nama_dosen', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dosen', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Main_model->tambahDataDosen();
            redirect('Dosen');
            exit;
        }
    }
    //delete
    public function hapusDosen()
    {
        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama_dosen');
        $this->Main_model->deleteDosen($nidn, $nama);
        redirect('Dosen');
    }

    //edit
    public function updateDosen()
    {
        $kd_dosen = $this->input->post('kd_dosen');
        $nidn = $this->input->post('nidn');
        $nama_dosen = $this->input->post('nama_dosen');
        $tmt = $this->input->post('tmt');
        $prodi = $this->input->post('prodi_id');
        $data = array(
            'kd_dosen' => $kd_dosen,
            'nidn' => $nidn,
            'nama_dosen' => $nama_dosen,
            'TMT' => $tmt,
            'prodi_id' => $prodi,
        );

        $where = array(
            'nidn' => $nidn
        );

        $this->Main_model->updateDosen($where, $data, 'tbl_dosen');
        redirect('Dosen');
    }
    public function updateAbsMhs()
    {
        $id_absensi = $this->input->post('id_absensi');
        //$p1 = $this->input->post('p1');
        //$p2 = $this->input->post('p2');
        $ket = $this->input->post('ket');
        //$pertemuan = $this->input->post('p');

        for ($j = 1; $j <= count($id_absensi); $j++) {
            $status = $this->input->post("approve$j");
            if (count($status) != 0) {
                for ($i = 0; $i < count($status); $i++) {
                    if ($status[$i] == null) {
                        continue;
                    }
                    $data = array(
                        "p$j" => $status[$i]
                    );
                    $where = array(
                        'id_absensi' => (int) $id_absensi[$i]
                    );
                    $this->admin_model->updateAbsM($where, $data, 'tbl_absensi');
                }
            } else {
                echo "isi data yang bener";
            }
        }
        redirect('dosen/absensi_mahasiswa');
    }

    /*********************** END CONTROLLER DOSEN *************************************/
    public function inputNilai()
    {
        $nidn = $this->session->userdata('nim');
        $name = $this->session->userdata('username');
        $data['title'] = 'Input Nilai';
        $data['data'] = $this->Main_model->getAllMatkulDosen($nidn);
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
       $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/input_nilai', $data);
        $this->load->view('templates/footer');
	}
	public function absensi_mahasiswa()
    {
        $nidn = $this->session->userdata('nim'); //nidn dosen        
        $data = array(
            'title' => 'Pilih Absensi',
            'no' => 1,
            'user' => $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array(),
            'matakuliah' => $this->M_Absen->getMakul($nidn)->result(),
            'absen' => $this->M_Absen->getAbsen($nidn)->result()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/absen', $data);
        $this->load->view('templates/footer');
    }

    public function absenMhs()
    {
        $nidn = $this->session->userdata('nim'); //nidn dosen        
        $kode_makul = $this->input->post('kode_makul');

        // validasi multiple insert
        $param = array(
            'kode_makul' => $kode_makul,
            'tanggal' => date('Y-m-d')
        );

        if ($this->M_Absen->cekInsert($param)->result()) {
            $this->session->set_flashdata('pesan', 'Hari ini Mata kuliah dengan kode : ' . $kode_makul . ' sudah ada');
            redirect('Dosen/absensi_mahasiswa');
        }
        // .validasi multiple insert

        $data = array(
            'title' => 'Absensi',
            'no' => 1,
            'user' => $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array(),
            'tanggal' => date('D, d M Y h:i') . ' WIB',
            'mahasiswa' => $this->M_Absen->getMakulToAbsen($nidn, $kode_makul)->result(),
        );

        $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar_dosen', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/content', $data);
        $this->load->view('templates/footer');
    }

    public function prosesAbsenMhs()
    {
        for ($i = 0; $i < count($this->input->post('nim')); $i++) {
            $data[] = array(
                'nim' => $this->input->post('nim')[$i],
                'kode_makul' => $this->input->post('kode_makul')[$i],
                'tanggal' => date('Y-m-d'),
                'absen' => $this->input->post('absen')[$i],
                'keterangan' => $this->input->post('keterangan')[$i]
            );
        }

        if ($this->M_Absen->insertAbsen($data)) {
            $this->session->set_flashdata('pesan', 'Absen Berhasil...!');
            redirect('Dosen/absensi_mahasiswa');
        }
    }

    public function editAbsenMhs()
    {
        for ($i = 0; $i < count($this->input->post('id')); $i++) {
            $data[] = array(
                'id_absensi' => $this->input->post('id')[$i],
                'absen' => $this->input->post('absen')[$i],
                'keterangan' => $this->input->post('keterangan')[$i]
            );
        }

        $this->M_Absen->updateAbsen($data);
        $this->session->set_flashdata('pesan', 'Berhasil update absen');
        redirect('Dosen/absensi_mahasiswa');
    }
}

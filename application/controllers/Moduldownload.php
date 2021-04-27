<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moduldownload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('file');
    }

    public function download_aksi()
    {
        $data = array();

        $data['title'] = 'Download Modul';
        $data['files'] = $this->file->getRows();
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('modulaku/content', $data);
    }

    public function download($id)
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
}

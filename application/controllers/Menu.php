<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        is_logged_in();
        }

    public function index()
    {

        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added</div>');
            redirect('Menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added</div>');
            redirect('Menu/submenu');
        }
        
    }
    public function deleteMenu($id){
        $this->Menu_model->deleteMenu($id);
        redirect('Menu');
    }
    //edit
    public function editMenu($id){
        $data['title'] = 'Edit Menu Management';
            $where = array('id' => $id);
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_menu'] = $this->Menu_model->editMenu($where,'user_menu')->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
          }
        
    public function updateMenu(){
            $id = $this->input->post('id');   
            $menu = $this->input->post('menu');
            $data = array(
              'id' => $id,
              'menu' => $menu,
            );
        
            $where = array(
              'id' => $id
            );
        
            $this->Menu_model->updateMenu($where,$data,'user_menu');
            redirect('Menu');
          }
    public function deleteSubMenu($id){
        $this->Menu_model->deleteSubMenu($id);
        redirect('Menu/submenu');
    }
    //edit
    public function editSubMenu($id){
        $data['title'] = 'Edit Sub Menu Management';
            $where = array('id' => $id);
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_sub_menu'] = $this->Menu_model->editSubMenu($where,'user_sub_menu')->result();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_sub', $data);
            $this->load->view('templates/footer');
          }
        
    public function updateSubMenu(){
          $id = $this->input->post('id'); 
          $title = $this->input->post('title');
          $menu_id = $this->input->post('menu_id');
          $url = $this->input->post('url');
          $icon = $this->input->post('icon');
          $is_active = $this->input->post('is_active');
            $data = array(
                'id' => $id,
                'menu_id' =>$menu_id,
                'title' => $title,
                'url' => $url,
                'icon' => $icon,
                'is_active' => $is_active,
            );
        
            $where = array(
              'id' => $id
            );
        
            $this->Menu_model->updateSubMenu($where,$data,'user_sub_menu');
            redirect('Menu/submenu');
          }
}

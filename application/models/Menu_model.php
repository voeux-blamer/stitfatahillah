<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSUbMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
    public function deleteMenu($id){
        $this->db->where('id', $id);
        $this->db->delete('user_menu'); //nama tabel
       
    }
    public function deleteSubMenu($id){
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu'); //nama tabel
       
    }
    public function editMenu($where,$table){
        return $this->db->get_where($table,$where);
    }
    
    public function updateMenu($where,$data,$table){
       $this->db->where($where);
       $this->db->update($table,$data);
    }
     public function editSubMenu($where,$table){
        return $this->db->get_where($table,$where);
    }
    
    public function updateSubMenu($where,$data,$table){
       $this->db->where($where);
       $this->db->update($table,$data);
    }
}

<?php

function skorNilai($nilai, $sks)
{

    if ($nilai == 'A') $skor = 4 * $sks;
    else if ($nilai == 'B') $skor = 3 * $sks;
    else if ($nilai == 'C') $skor = 2 * $sks;
    else if ($nilai == 'D') $skor = 1 * $sks;
    else $skor = 0;
    return $skor;
}
function check_access($role_id, $menu_id)
{

    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked = 'checked' ";
    }
}

<?php

class Penggajian_model extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table);
    }
    public function get_where($table, $where, $data)
    {
        return $this->db->get_where($table, [$where => $data]);
    }
    public function get_where2($table, $data)
    {
        return $this->db->get_where($table, $data);
    }


    public function insert_data($data, $table)
    {

        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                  FROM user_sub_menu JOIN user_menu
                  ON user_sub_menu.menu_id = user_menu.id        
        ";
        return  $this->db->query($query);
    }

    public function getuseradmin()
    {
        $query = "SELECT user.*, user_role.role
                  FROM user JOIN user_role
                  ON user.role_id = user_role.id        
        ";
        return  $this->db->query($query);
    }

    public function isemailExists($email)
    {
        $query = $this->db->select('email')->get_where('user', ['email' => $email]);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

<?php

class User_model extends CI_Model
{
    public function login($email, $password)
    {
        $this->db->select('users.*, roles.name as role');
        $this->db->join('roles', 'roles.id = users.role_id');
        $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();
        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }
        return false;
    }


    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }


    public function get_by_id($id)
    {
        $this->db->select('users.*, roles.name as role');
        $this->db->join('roles', 'roles.id = users.role_id');
        return $this->db->get_where('users', ['users.id' => $id])->row_array();
    }


    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }


    public function get_all()
    {
        return $this->db->get('users')->result_array();
    }

    public function get_all_with_role()
    {
        $this->db->select('users.*, roles.name as role');
        $this->db->join('roles', 'roles.id = users.role_id');
        return $this->db->get('users')->result_array();
    }


    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }
}

<?php

class Product_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('products')->result_array();
    }


    public function get_by_id($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row_array();
    }


    public function insert($data)
    {
        return $this->db->insert('products', $data);
    }


    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('products', $data);
    }


    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('products');
    }
}

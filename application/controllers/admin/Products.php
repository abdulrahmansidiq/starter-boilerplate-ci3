<?php

class Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->require_role('admin');
        $this->load->model('Product_model');
    }


    public function index()
    {
        $data['products'] = $this->Product_model->get_all();
        $this->load->view('admin/products/index', $data);
    }


    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'price' => $this->input->post('price', TRUE),
                'stock' => $this->input->post('stock', TRUE),
                'description' => $this->input->post('description', TRUE)
            ];
            $this->Product_model->insert($data);
            redirect('admin/products');
        }
    }


    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'price' => $this->input->post('price', TRUE),
                'stock' => $this->input->post('stock', TRUE),
                'description' => $this->input->post('description', TRUE)
            ];
            $this->Product_model->update($id, $data);
            redirect('admin/products');
        }
    }


    public function delete($id)
    {
        $this->Product_model->delete($id);
        redirect('admin/products');
    }
}

<?php

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->require_role('admin');
        $this->load->model('User_model');
    }


    public function index()
    {
        $data['users'] = $this->User_model->get_all_with_role();
        $this->load->view('admin/users/index', $data);
    }


    public function create()
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1
            ];
            $this->User_model->insert($data);
            redirect('admin/users');
        }
    }


    public function edit($id)
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->User_model->update($id, $data);
            redirect('admin/users');
        }
    }


    public function reset_password($id)
    {
        $new = password_hash('user123', PASSWORD_BCRYPT);
        $this->User_model->update($id, ['password' => $new]);
        redirect('admin/users');
    }


    public function delete($id)
    {
        $this->User_model->delete($id);
        redirect('admin/users');
    }
}

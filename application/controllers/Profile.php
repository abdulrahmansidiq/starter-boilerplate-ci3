<?php

class Profile extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }


    public function index()
    {
        $data['user'] = $this->User_model->get_by_id($this->session->userdata('user')['id']);
        $this->load->view('profile/index', $data);
    }


    public function update()
    {
        $id = $this->session->userdata('user')['id'];
        $data = [
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE)
        ];
        $this->User_model->update($id, $data);
        $user = $this->User_model->get_by_id($id);
        $this->session->set_userdata('user', $user);
        $this->session->set_flashdata('success', 'Profile berhasil diupdate');
        redirect('profile');
    }


    public function change_password()
    {
        $id = $this->session->userdata('user')['id'];
        $new = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT);
        $this->User_model->update($id, ['password' => $new]);
        $this->session->set_flashdata('success', 'Password berhasil diganti');
        redirect('profile');
    }
}

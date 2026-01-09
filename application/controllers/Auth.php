<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }


    public function login()
    {
        if ($this->input->post()) {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password');
            $user = $this->User_model->login($email, $password);
            if ($user) {
                $this->session->set_userdata('user', $user);
                if ($user['role'] == 'admin') redirect('admin/dashboard');
                else redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah');
            }
        }
        $this->load->view('auth/login');
    }


    public function register()
    {
        if ($this->input->post()) {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role_id' => 2
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
            redirect('auth/login');
        }
        $this->load->view('auth/register');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

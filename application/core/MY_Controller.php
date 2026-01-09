<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth/login');
        }
    }


    protected function require_role($role)
    {
        if ($this->session->userdata('user')['role'] !== $role) {
            show_error('Unauthorized Access', 403);
        }
    }
}

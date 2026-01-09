<?php

class DashboardUser extends MY_Controller
{
    public function index()
    {
        $this->load->view('user/dashboard');
    }
}

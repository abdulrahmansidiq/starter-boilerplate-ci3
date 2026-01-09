<?php

class Dashboard extends MY_Controller
{
    public function index()
    {
        $this->require_role('admin');
        $this->load->view('layouts/header', ['title' => 'Admin Dashboard']);
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/footer');
    }
}

/*
Di setiap view dashboard / crud:


$this->load->view('layouts/header', ['title'=>'Admin Dashboard']);
$this->load->view('admin/dashboard');
$this->load->view('layouts/footer');
*/
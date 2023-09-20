<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('tamplates/auth-header');
        $this->load->view('auth/login');
        $this->load->view('tamplates/auth-footer');
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'requires|trim|valid_email');
        $this->load->library('form_validation');
        if ($this->form_validation->run() === false) {
            $data['title'] = 'E-simultan User Registration';
            $this->load->view('tamplates/auth-header', $data);
            $this->load->view('auth/registration');
            $this->load->view('tamplates/auth-footer');
        } else {
            echo 'akun berhasil di buat';
        }
    }
}

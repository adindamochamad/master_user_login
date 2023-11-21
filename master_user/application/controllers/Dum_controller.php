<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dum_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/dashboard');
    }
}

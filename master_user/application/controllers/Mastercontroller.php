<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mastercontroller extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/login.php');
    }

    public function ceklogin()
    {
        $this->_rules_login();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->user_master->ambillogin();
        }
    }
    public function error()
    {
        $this->load->view('template/404.php');
    }
    public function dashboard()
    {
        if (!$this->session->userdata('username')) {
            redirect('mastercontroller/error');
        }
        $data['datauser'] = $this->user_master->read_data('user')->result();
        $data['datasession'] = $this->user_master->get_session_data()->result();
        $this->load->view('template/dashboard.php', $data);
    }
    public function add_data()
    {
        if (!$this->session->userdata('username')) {
            redirect('mastercontroller/error');
        }
        $this->load->view('template/add.php');
    }

    public function add_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add_data();
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'umur' => $this->input->post('umur'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            );

            $this->user_master->insert_data($data, 'user');
            $this->session->set_flashdata(
                'flashdata',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Data baru berhasil ditambahkan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
            );
            redirect('mastercontroller/dashboard');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('umur', 'Umur', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
    }

    public function _rules_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_register_check', array(
            'required' => '%s Harus Diisi!'
        ));
        // $this->form_validation->set_rules('username', 'Username', 'callback_username_register_check', array(
        //     'required' => '%s Harus Diisi!'
        // ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', array(
            'required' => '%s Harus Diisi!',
            'matches' => '%s Tidak Sesuai'
        ));
    }

    public function _rules_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!'
        ));
    }
    public function edit_data($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('mastercontroller/error');
        }
        $where = array('id' => $id);
        $data['data_user'] = $this->user_master->edit_data($where, 'user')->result();

        $this->load->view('template/edit.php', $data);
    }

    public function delete_data($id)
    {
        $where = array('id' => $id);

        $this->user_master->delete_data($where, 'user');
        $this->session->set_flashdata(
            'flashdata',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('mastercontroller/dashboard');
    }
    public function update_data()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add_data();
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $umur = $this->input->post('umur');
            $alamat = $this->input->post('alamat');
            $tanggal_lahir = $this->input->post('tanggal_lahir');

            $data = array(
                'nama' => $nama,
                'umur' => $umur,
                'alamat' => $alamat,
                'tanggal_lahir' => $tanggal_lahir
            );

            $where = array(
                'id' => $id
            );

            $this->user_master->update_data($where, $data, 'user');
            $this->session->set_flashdata(
                'flashdata',
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Data berhasil diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
            );
            redirect('mastercontroller/dashboard');
        }
    }

    public function register_akun()
    {
        $this->load->view("template/register_akun.php");
    }

    public function registered_akun()
    {
        $this->_rules_register();
        if ($this->form_validation->run() == FALSE) {
            $this->register_akun();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $this->user_master->insert_data($data, 'login');
            $this->session->set_flashdata('flashdata', 'Akun Berhasil Terdaftar! Silahkan Login');
            redirect('mastercontroller/register_akun');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('mastercontroller/index');
    }
    public function username_register_check($username)
    {
        if ($this->user_master->username_regischeck($username)) {
            $this->form_validation->set_message('username_register_check', 'Maaf username telah digunakan');
            return false;
        } else {
            return true;
        }
    }
}

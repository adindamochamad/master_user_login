<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_master extends CI_Model
{
    public function read_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function ambillogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('login');

        $cari_user = $query->num_rows();

        if ($cari_user > 0) {
            $this->session->set_userdata('username', $query->row()->username);
            $this->session->set_userdata('password', $query->row()->password);

            $this->session->set_flashdata('info', 'Login Berhasil');
            redirect('mastercontroller/dashboard');
        } else {
            $this->session->set_flashdata('info', "Login gagal");
            redirect('index.php');
        }
    }

    public function get_session_data()
    {
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('login');
    }
    public function username_regischeck($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('login');

        return ($query->num_rows() > 0);
    }
}
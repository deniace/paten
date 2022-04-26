<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }
    public function index()
    {
        if ($this->session->userdata('role') == "admin") {
            redirect('admin/dashboard');
        } elseif ($this->session->userdata('role') == "customer") {
            redirect('home');
        } else {
            $this->login();
        }
    }

    public function test()
    {
        $pass = password_hash("123456", PASSWORD_BCRYPT);
        echo $pass;
    }

    public function login()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if (!$this->form_validation->run()) {
            // validasi gagal
            $this->load->view('auth/login_view');
        } else {
            // validasi sukses
            $this->prosesLogin();
        }
    }

    private function prosesLogin()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $result_nip = $this->user_model->cek_nip($nip);

        if ($result_nip) {
            // email ada
            $result = $this->user_model->login($nip, $password);

            if ($result["status"]) {
                // user ada'
                $data = [
                    'nip' => $nip,
                    'id_user' => $result['data']->id_user,
                    'nama_user' => $result['data']->nama_user,
                    'email' => $result['data']->email,
                    'avatar' => $result['data']->avatar,
                    'role' => $result['data']->role,
                    'status' => $result['data']->status
                ];
                $this->session->set_userdata($data);
                redirect("dashboard");
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan NIP atau password</div>');
                redirect('auth/login');
            }
        } else {
            // NIP tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP tidak terdaftar</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('avatar');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Log out sukses</div>');
        redirect('auth/login');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->title = "User | Paten";
    }

    public function index()
    {
        $page = 1;
        $page_size = 10;

        $limit = $page_size;
        $offset = ($page * $page_size) - $page_size;

        $result = $this->user_model->get_page($limit, $offset);

        $max_page = ceil($result['total_data'] / $page_size);

        $response = array(
            "title" => $this->title,
            "data" => $result['data'],
            "page" => $page,
            "max_page" => $max_page,
            "total_data" => $result['total_data']
        );

        $this->load->view('user/user_view', $response);
    }

    public function page($page = 1)
    {
        if ($page < 1) {
            $page = 1;
        }
        $page_size = 10;

        $limit = $page_size;
        $offset = ($page * $page_size) - $page_size;

        $result = $this->user_model->get_page($limit, $offset);

        $max_page = ceil($result['total_data'] / $page_size);

        $response = array(
            "title" => $this->title,
            "data" => $result['data'],
            "page" => $page,
            "max_page" => $max_page,
            "total_data" => $result['total_data']
        );
        $this->load->view('user/user_view', $response);
    }

    public function tambah()
    {
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('role', 'Nama', 'trim|required');
            $this->form_validation->set_rules('nik', 'NIK', 'trim|required');

            if ($this->form_validation->run()) {
                // $nama_image = $this->_uploadImage();
                // validasi sukses
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $nama_user = $this->input->post("nama");
                $role = $this->input->post("role");
                $nik = $this->input->post("nik");
                $alamat = $this->input->post("alamat");
                $telp = $this->input->post("telp");


                $is_resgistered = $this->user_model->cek_email($email);

                if (!$is_resgistered) {
                    $is_nik = $this->user_model->cek_nip($nik);

                    if ($is_nik) {
                        $data["nama"] = $this->input->post("nama");
                        $data["email"] = $this->input->post("email");
                        $data["nip"] = $this->input->post("nik");
                        $data["alamat"] = $this->input->post("alamat");
                        $data["telp"] = $this->input->post("telp");
                        $data["title"] = $this->title;

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nip Sudah terdaftar</div>');
                        $this->load->view('user/tambah_user_view', $data);
                    } else {
                        $password_hash = password_hash($password, PASSWORD_BCRYPT);
                        $data = array(
                            "email" => $email,
                            "nip" => $nik,
                            "password" => $password_hash,
                            "nama_user" => $nama_user,
                            "role" => $role,
                            "alamat" => $alamat,
                            "telp" => $telp,
                        );

                        $result = $this->user_model->insert($data);

                        if ($result) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data sukses</div>');
                            redirect('user');
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">tambah data gagal,</div>');
                            redirect('user');
                        }
                    }
                } else {
                    // email sudah terdaftar
                    $data["nama"] = $this->input->post("nama");
                    $data["email"] = $this->input->post("email");
                    $data["title"] = $this->title;

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Sudah terdaftar</div>');
                    $this->load->view('user/tambah_user_view', $data);
                }
            } else {
                // validasi gagal
                $data["nama"] = $this->input->post("nama");
                $data["email"] = $this->input->post("email");
                $data["title"] = $this->title;
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view('user/tambah_user_view', $data);
            }
        } else {
            $this->load->view('user/tambah_user_view', ["title" => $this->title]);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('role', 'Nama', 'trim|required');
                $this->form_validation->set_rules('nip', 'NIK', 'trim|required');

                if ($this->form_validation->run() != false) {
                    // validasi sukses
                    $email = $this->input->post("email");
                    $old_email = $this->input->post("old_email");
                    $password = $this->input->post("password");
                    $nama_user = $this->input->post("nama");
                    $role = $this->input->post("role");
                    $nip = $this->input->post("nip");
                    $telp = $this->input->post("telp");
                    $alamat = $this->input->post("alamat");

                    if ($email == $old_email) {
                        $password_hash = password_hash($password, PASSWORD_BCRYPT);
                        $data = array(
                            "id_user" => $id,
                            "email" => $email,
                            "password" => $password_hash,
                            "nama_user" => $nama_user,
                            "role" => $role,
                            "nip" => $nip,
                            "alamat" => $alamat,
                            "telp" => $telp,
                        );
                        $this->lakukan_ubah($data);
                    } else {
                        $is_resgistered = $this->user_model->cek_email($email);
                        if (!$is_resgistered) {
                            $password_hash = password_hash($password, PASSWORD_BCRYPT);
                            $data = array(
                                "id_user" => $id,
                                "email" => $email,
                                "password" => $password_hash,
                                "nama_user" => $nama_user,
                                "role" => $role,
                                "nip" => $nip,
                                "alamat" => $alamat,
                                "telp" => $telp,
                            );
                            $this->lakukan_ubah($data);
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Sudah dipakai</div>');
                            $data = $this->user_model->get_by_id($id);
                            $this->load->view("user/ubah_user_view", $data);
                        }
                    }
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("user/ubah/$id");
                    // echo $this->input->post("gambar_berita_lama");
                }
            } else {
                // tidak di submit
                $data = $this->user_model->get_by_id($id);

                $this->load->view("user/ubah_user_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('user');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->user_model->update($data);

        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect("user");
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("user/ubah/" . $data["id_user"]);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->user_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("user");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("user");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("user");
        }
    }
}

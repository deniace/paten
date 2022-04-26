<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('kk_model');
        $this->load->model('penduduk_model');
    }

    public function index()
    {
        $data = $this->kk_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("kk/kk_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah kk | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
            $this->form_validation->set_rules('nik', 'nik', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() != false) {
                $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                if ($pddk === null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                    $this->load->view("kk/tambah_kk_view", $datak);
                } else {
                    $data = array(
                        "tgl" => $this->input->post('tgl'),
                        "nik" => $this->input->post('nik'),
                        "alamat" => $this->input->post('alamat'),
                        "keterangan" => $this->input->post('keterangan'),
                    );

                    $result = $this->kk_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('kk');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("kk/tambah_kk_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("kk/tambah_kk_view", $datak);
            }
        } else {
            $this->load->view("kk/tambah_kk_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
                $this->form_validation->set_rules('nik', 'nik', 'trim|required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                    if ($pddk === null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                        redirect("kk/ubah/$id");
                    } else {
                        $data = array(
                            "id_kk" => $id,
                            "tgl" => $this->input->post('tgl'),
                            "nik" => $this->input->post('nik'),
                            "alamat" => $this->input->post('alamat'),
                            "keterangan" => $this->input->post('keterangan'),
                        );
                        $this->lakukan_ubah($data);
                    }
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("kk/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['penduduk'] = $this->penduduk_model->get_all();
                $data['kk'] = $this->kk_model->get_by_id($id);
                $this->load->view("kk/ubah_kk_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('kk');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->kk_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('kk');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("kk/ubah/" . $data['id_kk']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->kk_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("kk");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("kk");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("kk");
        }
    }
}

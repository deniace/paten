<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sktm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
        $this->load->model('sktm_model');
        $this->load->model('penduduk_model');
    }

    public function index()
    {
        $data = $this->sktm_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("sktm/sktm_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah sktm | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
            $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('nik', 'nik', 'trim|required');

            if ($this->form_validation->run() != false) {
                $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                // var_dump($pddk);
                // die();
                if ($pddk !== null) {
                    $data = array(
                        "nomor_surat" => $this->input->post('nomor_surat'),
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "nik" => $this->input->post('nik'),
                        "keterangan" => $this->input->post('keterangan'),
                    );

                    $result = $this->sktm_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('sktm');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("sktm/tambah_sktm_view", $datak);
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik tidak terdaftar</div>');
                    $this->load->view("sktm/tambah_sktm_view", $datak);
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("sktm/tambah_sktm_view", $datak);
            }
        } else {
            $this->load->view("sktm/tambah_sktm_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
                $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
                $this->form_validation->set_rules('nik', 'nik', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $data = array(
                        "id_sktm" => $id,
                        "nomor_surat" => $this->input->post('nomor_surat'),
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "nik" => $this->input->post('nik'),
                        "keterangan" => $this->input->post('keterangan'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("sktm/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['sktm'] = $this->sktm_model->get_by_id($id);
                $this->load->view("sktm/ubah_sktm_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('sktm');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->sktm_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('sktm');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("sktm/ubah/" . $data['id_sktm']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->sktm_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("sktm");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("sktm");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("sktm");
        }
    }
}

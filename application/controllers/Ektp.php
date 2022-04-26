<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ektp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
        $this->load->model('ektp_model');
        $this->load->model('penduduk_model');
    }

    public function index()
    {
        $data = $this->ektp_model->get_all();

        $response = array(
            "data" => $data,
        );
        $this->load->view("ektp/ektp_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah ektp | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
            $this->form_validation->set_rules('nik', 'NIK', 'trim|required');

            if ($this->form_validation->run() != false) {
                $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                if ($pddk === null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                    $this->load->view("ektp/tambah_ektp_view", $datak);
                } else {
                    $data = array(
                        "tgl" => $this->input->post('tgl'),
                        "nik" => $this->input->post('nik'),
                        "keterangan" => $this->input->post('keterangan'),
                    );

                    $result = $this->ektp_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('ektp');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("ektp/tambah_ektp_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("ektp/tambah_ektp_view", $datak);
            }
        } else {
            $this->load->view("ektp/tambah_ektp_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
                $this->form_validation->set_rules('nik', 'NIK', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                    if ($pddk === null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                        redirect("ektp/ubah/$id");
                    } else {
                        $data = array(
                            "id_ektp" => $id,
                            "tgl" => $this->input->post('tgl'),
                            "nik" => $this->input->post('nik'),
                            "keterangan" => $this->input->post('keterangan'),
                        );
                        $this->lakukan_ubah($data);
                    }
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("ektp/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['ektp'] = $this->ektp_model->get_by_id($id);
                $this->load->view("ektp/ubah_ektp_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('ektp');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->ektp_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('ektp');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("ektp/ubah/" . $data['id_ektp']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->ektp_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("ektp");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("ektp");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("ektp");
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pindah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('penduduk_model');
        $this->load->model('surat_pindah_model');
    }

    public function index()
    {
        $data = $this->surat_pindah_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("surat_pindah/surat_pindah_view", $response);
    }

    public function tambah()
    {
        $datak['title'] = "Tambah surat_pindah | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
            $this->form_validation->set_rules('tgl_masuk', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('nik', 'nik', 'trim|required');
            $this->form_validation->set_rules('tujuan_pindah', 'Tujuan Surat', 'trim|required');

            if ($this->form_validation->run() != false) {
                $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                if ($pddk === null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                    $this->load->view("surat_pindah/tambah_surat_pindah_view", $datak);
                } else {
                    $data = array(
                        "tgl_masuk" => $this->input->post('tgl_masuk'),
                        "no_surat" => $this->input->post('no_surat'),
                        "nik" => $this->input->post('nik'),
                        "tujuan_pindah" => $this->input->post('tujuan_pindah'),
                    );

                    $result = $this->surat_pindah_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('surat_pindah');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("surat_pindah/tambah_surat_pindah_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("surat_pindah/tambah_surat_pindah_view", $datak);
            }
        } else {
            $this->load->view("surat_pindah/tambah_surat_pindah_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
                $this->form_validation->set_rules('tgl_masuk', 'Tanggal Surat', 'trim|required');
                $this->form_validation->set_rules('nik', 'nik', 'trim|required');
                $this->form_validation->set_rules('tujuan_pindah', 'Tujuan Surat', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                    if ($pddk === null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                        redirect("surat_pindah/ubah/$id");
                    } else {
                        $data = array(
                            "id_surat_pindah" => $id,
                            "tgl_masuk" => $this->input->post('tgl_masuk'),
                            "no_surat" => $this->input->post('no_surat'),
                            "nik" => $this->input->post('nik'),
                            "tujuan_pindah" => $this->input->post('tujuan_pindah'),
                        );
                        $this->lakukan_ubah($data);
                    }
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("surat_pindah/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['surat_pindah'] = $this->surat_pindah_model->get_by_id($id);
                $data['penduduk'] = $this->penduduk_model->get_all();
                $this->load->view("surat_pindah/ubah_surat_pindah_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('surat_pindah');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->surat_pindah_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('surat_pindah');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("surat_pindah/ubah/" . $data['id_surat_pindah']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->surat_pindah_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("surat_pindah");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("surat_pindah");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("surat_pindah");
        }
    }
}

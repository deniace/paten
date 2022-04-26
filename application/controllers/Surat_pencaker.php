<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pencaker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
        $this->load->model('surat_pencaker_model');
        $this->load->model('penduduk_model');
    }

    public function index()
    {
        $data = $this->surat_pencaker_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("surat_pencaker/surat_pencaker_view", $response);
    }

    public function tambah()
    {
        $datak['title'] = "Tambah surat_pencaker | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('nik', 'nik', 'trim|required');
            $this->form_validation->set_rules('pendidikan', 'Tujuan Surat', 'trim|required');
            $this->form_validation->set_rules('tahun_lulus', 'Tujuan Surat', 'trim|required');
            $this->form_validation->set_rules('tgl_pembuatan', 'Tujuan Surat', 'trim|required');

            if ($this->form_validation->run() != false) {
                $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                if ($pddk === null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                    $this->load->view("surat_pencaker/tambah_surat_pencaker_view", $datak);
                } else {
                    $data = array(
                        "nik" => $this->input->post('nik'),
                        "pendidikan" => $this->input->post('pendidikan'),
                        "tahun_lulus" => $this->input->post('tahun_lulus'),
                        "tgl_pembuatan" => $this->input->post('tgl_pembuatan'),
                        "keterangan" => $this->input->post('keterangan'),
                    );

                    $result = $this->surat_pencaker_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('surat_pencaker');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("surat_pencaker/tambah_surat_pencaker_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("surat_pencaker/tambah_surat_pencaker_view", $datak);
            }
        } else {
            $this->load->view("surat_pencaker/tambah_surat_pencaker_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('nik', 'nik', 'trim|required');
                $this->form_validation->set_rules('pendidikan', 'Tujuan Surat', 'trim|required');
                $this->form_validation->set_rules('tahun_lulus', 'Tujuan Surat', 'trim|required');
                $this->form_validation->set_rules('tgl_pembuatan', 'Tujuan Surat', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $pddk = $this->penduduk_model->get_by_id($this->input->post('nik'));
                    if ($pddk === null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nik Tidak terdaftar</div>');
                        redirect("surat_pencaker/ubah/$id");
                    } else {
                        $data = array(
                            "id_surat_pencaker" => $id,
                            "pendidikan" => $this->input->post('pendidikan'),
                            "tahun_lulus" => $this->input->post('tahun_lulus'),
                            "tgl_pembuatan" => $this->input->post('tgl_pembuatan'),
                            "keterangan" => $this->input->post('keterangan'),
                        );
                        $this->lakukan_ubah($data);
                    }
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                }
            } else {
                // tidak di submit
                $data['penduduk'] = $this->penduduk_model->get_all();
                $data['surat_pencaker'] = $this->surat_pencaker_model->get_by_id($id);
                $this->load->view("surat_pencaker/ubah_surat_pencaker_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('surat_pencaker');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->surat_pencaker_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('surat_pencaker');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("surat_pencaker/ubah/" . $data['id_surat_pencaker']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->surat_pencaker_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("surat_pencaker");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("surat_pencaker");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("surat_pencaker");
        }
    }
}

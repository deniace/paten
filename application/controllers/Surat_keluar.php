<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
        $this->load->model('surat_keluar_model');
    }

    public function index()
    {
        $data = $this->surat_keluar_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("surat_keluar/surat_keluar_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah surat_keluar | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
            $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
            $this->form_validation->set_rules('tujuan_surat', 'Tujuan surat', 'trim|required');
            $this->form_validation->set_rules('tgl_pengiriman', 'Tujuan Surat', 'trim|required');

            if ($this->form_validation->run() != false) {
                //barcode tidak ada
                $data = array(
                    "tgl_surat" => $this->input->post('tgl_surat'),
                    "no_surat" => $this->input->post('no_surat'),
                    "perihal" => $this->input->post('perihal'),
                    "tgl_pengiriman" => $this->input->post('tgl_pengiriman'),
                    "tujuan_surat" => $this->input->post('tujuan_surat'),
                    "keterangan" => $this->input->post('keterangan'),
                );

                $result = $this->surat_keluar_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                    redirect('surat_keluar');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                    $this->load->view("surat_keluar/tambah_surat_keluar_view", $datak);
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("surat_keluar/tambah_surat_keluar_view", $datak);
            }
        } else {
            $this->load->view("surat_keluar/tambah_surat_keluar_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
                $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
                $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
                $this->form_validation->set_rules('tgl_pengiriman', 'Asal Surat', 'trim|required');
                $this->form_validation->set_rules('tujuan_surat', 'Tanggal Terima', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $data = array(
                        "id_surat_keluar" => $id,
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "no_surat" => $this->input->post('no_surat'),
                        "perihal" => $this->input->post('perihal'),
                        "tgl_pengiriman" => $this->input->post('tgl_pengiriman'),
                        "tujuan_surat" => $this->input->post('tujuan_surat'),
                        "keterangan" => $this->input->post('keterangan'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("surat_keluar/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['surat_keluar'] = $this->surat_keluar_model->get_by_id($id);
                $this->load->view("surat_keluar/ubah_surat_keluar_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('surat_keluar');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->surat_keluar_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('surat_keluar');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("surat_keluar/ubah/" . $data['id_surat_keluar']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->surat_keluar_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("surat_keluar");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("surat_keluar");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("surat_keluar");
        }
    }
}

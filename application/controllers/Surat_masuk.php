<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('surat_masuk_model');
    }

    public function index()
    {
        $data = $this->surat_masuk_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("surat_masuk/surat_masuk_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah surat_masuk | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
            $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
            $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
            $this->form_validation->set_rules('asal_surat', 'Asal Surat', 'trim|required');
            $this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'trim|required');

            if ($this->form_validation->run() != false) {
                //barcode tidak ada
                $no = $this->input->post('no_surat');
                $sm = $this->surat_masuk_model->get_by_id($no);
                // var_dump($sm);
                // die();
                if ($sm != null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data, no surat sudah ada</div>');
                    $this->load->view("surat_masuk/tambah_surat_masuk_view", $datak);
                } else {
                    $data = array(
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "no_surat" => $this->input->post('no_surat'),
                        "perihal" => $this->input->post('perihal'),
                        "asal_surat" => $this->input->post('asal_surat'),
                        "tgl_terima" => $this->input->post('tgl_terima'),
                        "keterangan" => $this->input->post('keterangan'),
                    );

                    $result = $this->surat_masuk_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('surat_masuk');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("surat_masuk/tambah_surat_masuk_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("surat_masuk/tambah_surat_masuk_view", $datak);
            }
        } else {
            $this->load->view("surat_masuk/tambah_surat_masuk_view", $datak);
        }
    }

    public function ubah()
    {
        $id = $this->input->post('no_surat');
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'trim|required');
                $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
                $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
                $this->form_validation->set_rules('asal_surat', 'Asal Surat', 'trim|required');
                $this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $data = array(
                        "no_surat" => $id,
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "perihal" => $this->input->post('perihal'),
                        "asal_surat" => $this->input->post('asal_surat'),
                        "tgl_terima" => $this->input->post('tgl_terima'),
                        "keterangan" => $this->input->post('keterangan'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("surat_masuk/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['surat_masuk'] = $this->surat_masuk_model->get_by_id($id);
                $this->load->view("surat_masuk/ubah_surat_masuk_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('surat_masuk');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->surat_masuk_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('surat_masuk');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("surat_masuk/ubah/" . $data['id_surat_masuk']);
        }
    }

    public function hapus()
    {
        $id = $this->input->post('no_surat');
        if ($id !== null) {
            // id nya ada
            $result = $this->surat_masuk_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("surat_masuk");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("surat_masuk");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("surat_masuk");
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proposal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('proposal_model');
    }

    public function index()
    {
        $data = $this->proposal_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("proposal/proposal_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah proposal | Paten";
        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'trim|required');
            $this->form_validation->set_rules('tgl_surat', 'Tanggal surat', 'trim|required');
            $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
            $this->form_validation->set_rules('tgl_penerimaan', 'Tanggal penerimaan', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() != false) {
                //barcode tidak ada
                $data = array(
                    "nama_lembaga" => $this->input->post('nama_lembaga'),
                    "tgl_surat" => $this->input->post('tgl_surat'),
                    "perihal" => $this->input->post('perihal'),
                    "tgl_penerimaan" => $this->input->post('tgl_penerimaan'),
                    "alamat" => $this->input->post('alamat'),
                    "no_hp" => $this->input->post('no_hp'),
                    "keterangan" => $this->input->post('keterangan'),
                );

                $result = $this->proposal_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                    redirect('proposal');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                    $this->load->view("proposal/tambah_proposal_view", $datak);
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("proposal/tambah_proposal_view", $datak);
            }
        } else {
            $this->load->view("proposal/tambah_proposal_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'trim|required');
                $this->form_validation->set_rules('tgl_surat', 'Tanggal surat', 'trim|required');
                $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');
                $this->form_validation->set_rules('tgl_penerimaan', 'Tanggal penerimaan', 'trim|required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


                if ($this->form_validation->run() != false) {
                    $data = array(
                        "id_proposal" => $id,
                        "nama_lembaga" => $this->input->post('nama_lembaga'),
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "perihal" => $this->input->post('perihal'),
                        "tgl_penerimaan" => $this->input->post('tgl_penerimaan'),
                        "alamat" => $this->input->post('alamat'),
                        "no_hp" => $this->input->post('no_hp'),
                        "keterangan" => $this->input->post('keterangan'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("proposal/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['proposal'] = $this->proposal_model->get_by_id($id);
                $this->load->view("proposal/ubah_proposal_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('proposal');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->proposal_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('proposal');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("proposal/ubah/" . $data['id_proposal']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->proposal_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("proposal");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("proposal");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("proposal");
        }
    }
}

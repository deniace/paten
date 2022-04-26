<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('penduduk_model');
    }

    public function index()
    {
        $data = $this->penduduk_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("penduduk/penduduk_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah penduduk | Paten";
        if ($this->input->post('submit') !== null) {
            // var_dump($this->input->post());
            // die();
            $this->form_validation->set_rules('nik', 'nik', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
            $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
            $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
            $this->form_validation->set_rules('status', 'status', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
            $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

            if ($this->form_validation->run()) {
                $nik = $this->input->post('nik');
                $pm = $this->penduduk_model->get_by_id($nik);
                // var_dump($sm);
                // die();
                if ($pm != null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data, NIK sudah ada</div>');
                    $this->load->view("penduduk/tambah_penduduk_view", $datak);
                } else {
                    $data = array(
                        "nik" => $this->input->post('nik'),
                        "nama" => $this->input->post('nama'),
                        "tempat_lahir" => $this->input->post('tempat_lahir'),
                        "tgl_lahir" => $this->input->post('tgl_lahir'),
                        "alamat" => $this->input->post('alamat'),
                        "status" => $this->input->post('status'),
                        "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                        "tgl" => $this->input->post('tgl'),
                    );

                    $result = $this->penduduk_model->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                        redirect('penduduk');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                        $this->load->view("penduduk/tambah_penduduk_view", $datak);
                    }
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("penduduk/tambah_penduduk_view", $datak);
            }
        } else {
            $this->load->view("penduduk/tambah_penduduk_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('nik', 'nik', 'trim|required');
                $this->form_validation->set_rules('nama', 'nama', 'trim|required');
                $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
                $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
                $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
                $this->form_validation->set_rules('status', 'status', 'trim|required');
                $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
                $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $data = array(
                        "nik" => $id,
                        "nama" => $this->input->post('nama'),
                        "tempat_lahir" => $this->input->post('tempat_lahir'),
                        "tgl_lahir" => $this->input->post('tgl_lahir'),
                        "alamat" => $this->input->post('alamat'),
                        "status" => $this->input->post('status'),
                        "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                        "tgl" => $this->input->post('tgl'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("penduduk/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['penduduk'] = $this->penduduk_model->get_by_id($id);
                $this->load->view("penduduk/ubah_penduduk_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('penduduk');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->penduduk_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('penduduk');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("penduduk/ubah/" . $data['id_penduduk']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->penduduk_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("penduduk");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("penduduk");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("penduduk");
        }
    }
}

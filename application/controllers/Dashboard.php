<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->model('sktm_model');
        $this->load->model('ektp_model');
        $this->load->model('user_model');
        $this->load->model('surat_masuk_model');
        $this->load->model('surat_keluar_model');
        $this->load->model('surat_pindah_model');
        $this->load->model('surat_pencaker_model');
        $this->load->model('kk_model');
        $this->load->model('proposal_model');
    }

    public function index()
    {
        $data['title'] = "Dashboard | Paten";
        $data['sktm'] = $this->sktm_model->get_count();
        $data['ektp'] = $this->ektp_model->get_count();
        $data['surat_masuk'] = $this->surat_masuk_model->get_count();
        $data['surat_keluar'] = $this->surat_keluar_model->get_count();
        $data['surat_pindah'] = $this->surat_pindah_model->get_count();
        $data['surat_pencaker'] = $this->surat_pencaker_model->get_count();
        $data['kk'] = $this->kk_model->get_count();
        $data['proposal'] = $this->proposal_model->get_count();
        $data['user'] = $this->user_model->get_count();
        $this->load->view('dashboard_view', $data);
    }
}

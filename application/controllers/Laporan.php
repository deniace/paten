<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("laporan/laporan_view");
    }

    public function pdf()
    {
        $tipe = $this->input->get('tipe', TRUE);
        $dari = $this->input->get('dari', TRUE);
        $sampai = $this->input->get('sampai', TRUE);

        $this->load->library('pdfdom');
        $this->pdfdom->setPaper('A4', 'landscape');

        switch ($tipe) {
            case 'ektp':
                $this->load->model('ektp_model');
                $data = $this->ektp_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "ektp.pdf";
                $this->pdfdom->load_view('laporan/ektp_pdf', ['data' => $data]);
                break;
            case 'kk':
                $this->load->model('kk_model');
                $data = $this->kk_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "kk.pdf";
                $this->pdfdom->load_view('laporan/kk_pdf', ['data' => $data]);
                break;
            case 'disposisi':
                $this->load->model('disposisi_model');
                $data = $this->disposisi_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "disposisi.pdf";
                $this->pdfdom->load_view('laporan/disposisi_pdf', ['data' => $data]);
                break;
            case 'proposal':
                $this->load->model('proposal_model');
                $data = $this->proposal_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "proposal.pdf";
                $this->pdfdom->load_view('laporan/proposal_pdf', ['data' => $data]);
                break;
            case 'sktm':
                $this->load->model('sktm_model');
                $data = $this->sktm_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "sktm.pdf";
                $this->pdfdom->load_view('laporan/sktm_pdf', ['data' => $data]);
                break;
            case 'surat_keluar':
                $this->load->model('surat_keluar_model');
                $data = $this->surat_keluar_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "surat_keluar.pdf";
                $this->pdfdom->load_view('laporan/surat_keluar_pdf', ['data' => $data]);
                break;
            case 'surat_masuk':
                $this->load->model('surat_masuk_model');
                $data = $this->surat_masuk_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "surat_masuk.pdf";
                $this->pdfdom->load_view('laporan/surat_masuk', ['data' => $data]);
                break;
            case 'pencaker':
                $this->load->model('surat_pencaker_model');
                $data = $this->surat_pencaker_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "surat_pencaker.pdf";
                $this->pdfdom->load_view('laporan/surat_pencaker_pdf', ['data' => $data]);
                break;
            case 'pindah':
                $this->load->model('surat_pindah_model');
                $data = $this->surat_pindah_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "surat_pindah.pdf";
                $this->pdfdom->load_view('laporan/pindah_pdf', ['data' => $data]);
                break;
            case 'penduduk':
                $this->load->model('penduduk_model');
                $data = $this->penduduk_model->get_by_date($dari, $sampai);
                $this->pdfdom->filename = "penduduk.pdf";
                $this->pdfdom->load_view('laporan/penduduk_pdf', ['data' => $data]);
                break;
            default:
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                redirect("laporan");
                break;
        }
    }

    /**
     * fungsi untuk menjadikan tanggal bahasa indonesia
     */
    private function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

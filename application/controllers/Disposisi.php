<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth/login');
        }

        $this->load->library('form_validation');
        $this->load->model('disposisi_model');
        $this->load->model('surat_masuk_model');
    }

    public function index()
    {
        $data = $this->disposisi_model->get_all();
        $response = array(
            "data" => $data
        );
        $this->load->view("disposisi/disposisi_view", $response);
    }


    public function tambah()
    {
        $datak['title'] = "Tambah disposisi | Paten";



        if ($this->input->post('submit') !== null) {

            $this->form_validation->set_rules('dari', 'Dari', 'trim|required');
            $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

            if ($this->form_validation->run() != false) {
                //barcode tidak ada
                $data = array(
                    "tgl_penyelesaian" => $this->input->post('tgl_penyelesaian'),
                    "dari" => $this->input->post('dari'),
                    "perihal" => $this->input->post('perihal'),
                    "tgl_surat" => $this->input->post('tgl_surat'),
                    "no" => $this->input->post('no'),
                );

                $result = $this->disposisi_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menyimpan data</div>');
                    redirect('disposisi');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menyimpan data</div>');
                    $this->load->view("disposisi/tambah_disposisi_view", $datak);
                }
            } else {
                // validasi gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                $this->load->view("disposisi/tambah_disposisi_view", $datak);
            }
        } else {
            $no_surat = $this->input->post('no_surat');
            $datak['surat_masuk'] = $this->surat_masuk_model->get_by_id($no_surat);
            if ($no_surat == null | $no_surat == "") {
                redirect('disposisi');
            }
            $this->load->view("disposisi/tambah_disposisi_view", $datak);
        }
    }

    public function ubah($id = null)
    {
        if (isset($id)) {
            // id nya ada
            if ($this->input->post('submit') !== null) {
                // di submit
                $this->form_validation->set_rules('dari', 'Dari', 'trim|required');
                $this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

                if ($this->form_validation->run() != false) {
                    $data = array(
                        "id_disposisi" => $id,
                        "tgl_penyelesaian" => $this->input->post('tgl_penyelesaian'),
                        "dari" => $this->input->post('dari'),
                        "perihal" => $this->input->post('perihal'),
                        "tgl_surat" => $this->input->post('tgl_surat'),
                        "no" => $this->input->post('no'),
                    );
                    $this->lakukan_ubah($data);
                } else {
                    // validasi gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input tidak valid</div>');
                    redirect("disposisi/ubah/$id");
                }
            } else {
                // tidak di submit
                $data['disposisi'] = $this->disposisi_model->get_by_id($id);
                $this->load->view("disposisi/ubah_disposisi_view", $data);
            }
        } else {
            // id nya tidak ada
            redirect('disposisi');
        }
    }

    private function lakukan_ubah($data)
    {
        $result = $this->disposisi_model->update($data);
        if ($result) {
            // sukses edit
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses mengubah data</div>');
            redirect('disposisi');
        } else {
            // gagal update 
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data</div>');
            redirect("disposisi/ubah/" . $data['id_disposisi']);
        }
    }

    public function hapus($id = null)
    {
        if ($id !== null) {
            // id nya ada
            $result = $this->disposisi_model->delete($id);
            if ($result) {
                // sukses hapus
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses menghapus data</div>');
                redirect("disposisi");
            } else {
                // hapus update 
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data</div>');
                redirect("disposisi");
            }
            echo $id;
        } else {
            // id nya tidak ada
            redirect("disposisi");
        }
    }

    public function pdf($id_disposisi = null)
    {
        $this->load->library('pdf');
        if ($id_disposisi == null) {
            redirect('disposisi');
        } else {
            $disposisi = $this->disposisi_model->get_by_id($id_disposisi);
            $file_name = "disposisi-" . $id_disposisi . ".pdf";
            $pdf = new FPDF('p', 'mm', 'a5');

            // membuat halaman baru
            $pdf->SetLineWidth(0.6);
            $pdf->AddPage();
            $pdf->SetMargins(5.0, 2.0);
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(130, 8, 'KARTU DISPOSISI', 0, 1, 'C');

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(70, 6, 'INDEX : ' . $disposisi->id_disposisi, 0, 0, 'l');
            $pdf->SetFont('Arial', 'U', 10);
            $pdf->Cell(70, 6, 'TANGGAL PENYELESAIAN', 0, 1, 'l');

            // garis
            $pdf->Line(5, 25, 145, 25);
            $pdf->Line(5, 26, 145, 26);

            if (strlen($disposisi->dari) > 48) {
                $dari1 = substr($disposisi->dari, 0, 47);
                $dari2 = substr($disposisi->dari, 47);
            } else {
                $dari1 = $disposisi->dari;
                $dari2 = '. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ';
            }

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(70, 10, '', 0, 1, 'l');
            $pdf->Cell(30, 6, 'DARI', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $dari1 . '.', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $dari2 . '.', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');

            if (strlen($disposisi->perihal) > 48) {
                $disposisi1 = substr($disposisi->perihal, 0, 47);
                $disposisi2 = substr($disposisi->perihal, 47);
            } else {
                $disposisi1 = $disposisi->perihal;
                $disposisi2 = '. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . ';
            }
            $pdf->Cell(30, 6, 'PERIHAL', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $disposisi1 . '. ', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $disposisi2 . '. ', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');

            $pdf->Cell(30, 6, 'TGL SURAT', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $this->tgl_indo($disposisi->tgl_surat) . '. ', 0, 1, 'l');
            $pdf->Cell(30, 6, 'NO', 0, 0, 'l');
            $pdf->Cell(110, 6, ': ' . $disposisi->no . ' . ', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');
            $pdf->Cell(30, 6, '', 0, 1, 'l');

            $pdf->Cell(70, 6, 'INSTURKSI/INFORMASI*)', 0, 0, 'C');
            $pdf->Cell(70, 6, 'DITERUSKAN KEPADA', 0, 1, 'C');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '1. SEKCAM', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '2. KASI PEM', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '3. KASI PMD', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '4. KASI TRANSTIB', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '5. KASI YANUM', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '6. KASI KESOS', 0, 1, 'I');
            $pdf->Cell(90, 6, '', 0, 0, 'C');
            $pdf->Cell(50, 6, '7. . . . . . . . . . . . . . .', 0, 1, 'I');


            $pdf->Output("I", $file_name);
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

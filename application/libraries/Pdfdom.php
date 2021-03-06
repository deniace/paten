<?php defined('BASEPATH') or exit("No direct script allowed");

use Dompdf\Dompdf;

class Pdfdom extends Dompdf
{
    public $filename;
    function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }

    protected function ci()
    {
        return get_instance();
    }

    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, true);
        $this->load_html($html);
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }
}

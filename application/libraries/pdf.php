<?php

use Dompdf\Dompdf;


class pdf extends Dompdf
{
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "cetak.pdf";
    }

    function ci()
    {
        return get_instance();
    }

    function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, true);
        $this->load_html($html);
        $this->render();
        ob_clean();
        $this->stream($this->filename, array('Attachment' => false));
    }
}

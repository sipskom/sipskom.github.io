<?php

class Fungsi {
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $userid = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($userid)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper,$orientation);
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => 0 ));
    }

}
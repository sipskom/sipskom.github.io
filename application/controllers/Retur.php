<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('retur_m');
    }

    public function index()
    {
        $data = array(
            'row' => $this->retur_m->get(),
            
        );
        $this->template->load('template','retur/data', $data);
    }

    public function add()
    {
        $retur = new stdClass();
        $retur->id_retur = null;
        $retur->no_faktur = null;
        $retur->denda = null;
        $retur->qty_retur = null;
        $retur->total_retur = null;
        $retur->date = null;
        $fakt = $this->retur_m->get_faktur()->result();
        $data = array(
            'warna' => 'success',
            'page' => 'Tambah',
            'row' => $retur,
            'no_ret' => $this->retur_m->retur(),
            'faktur' => $fakt,
        );

        $this->template->load('template', 'retur/form', $data);
    }

    public function del($id)
    {
        $this->retur_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('retur');
    }

    public function edit($id)
    {
        $query= $this->retur_m->get($id);
        if($query->num_rows()>0){
            $retur = $query->row();
            $fakt = $this->retur_m->get_faktur()->result();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'no_ret' => $this->retur_m->retur(),
                'faktur' => $fakt,
                'row' => $retur
            );
            $this->template->load('template', 'retur/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('retur');
        }
    }

    public function cetak($id)
	{
		$data = array (
			'row' => $this->retur_m->get($id)->row(),
		);
		$this->load->view('retur/retur_print', $data);

    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->retur_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->retur_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }

        redirect('retur');
    }

    public function by_tgl()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->retur_m->get_rep_tgl($post)->result();
         $grand_total = $this->retur_m->grand_total_tgl($post)->result();

         $start  = $post['start'];
         $end    = $post['end'];

         $data = [
             'start'         => $start,
             'end'           => $end,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('retur/cl_tgl', $data);

    }

    public function by_bln()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->retur_m->get_rep_bln($post)->result();
         $grand_total = $this->retur_m->grand_total_bln($post)->result();

         $bulan  = $post['bulan'];

         $data = [
             'bulan'         => $bulan,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('retur/cl_bln', $data);

    }

    public function by_thn()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->retur_m->get_rep_thn($post)->result();
         $grand_total = $this->retur_m->grand_total_thn($post)->result();

         $tahun  = $post['tahun'];

         $data = [
             'tahun'           => $tahun,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('retur/cl_thn', $data);

    }

    public function by_full()
	{
         $show_result = $this->retur_m->get_rep_full()->result();
         $grand_total = $this->retur_m->grand_total_full()->result();


         $data = [
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('retur/cl_full', $data);

    }

    public function laporan(){
        $show_result = $this->retur_m->get_retur_rep()->result();
        $grand_total = $this->retur_m->grand_total_retur()->result();
        $thn         = $this->retur_m->get_thn()->result();


        $data = [
            'result'        => $show_result,
            'grand_total'   => $grand_total,
            'tahun'         => $thn,
        ];

        $this->template->load('template','retur/laporan', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['service_m', 'customer_m']);
    }

    public function index()
    {
        $data['row'] = $this->service_m->get();
        $this->template->load('template','service/data', $data);
    }

    public function ambil_data()
    {
        $data['row'] = $this->service_m->get_ambil();
        $this->template->load('template','service/ambil_data', $data);
    }

    public function del($id)
    {
        $this->service_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('service');
    }

    public function add()
    {
        $customer = $this->customer_m->get()->result();
        $service = new stdClass();
        $service->id_service = null;
        $service->no_service = null;
        $service->kategori = null;
        $service->nama_barang = null;
        $service->id_customer = null;
        $service->kelengkapan = null;
        $service->keluhan = null;
        $service->id_service = null;
        $service->kerusakan = null;
        $service->sparepart = null;
        $service->biaya_service = null;
        $service->dp = null;
        $data = array(
            'warna' => 'success',
            'blok' => '',
            'page' => 'Tambah',
            'noserv' => $this->service_m->serv(),
            'customer' => $customer,
            'row' => $service
        );

        $this->template->load('template', 'service/form', $data);
    }

    public function edit($id)
    {
        $query= $this->service_m->custedit($id);
        if($query->num_rows()>0){
            $service = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'row' => $service
            );
            $this->template->load('template', 'service/form_edit', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('service');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->service_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->service_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        } else if(isset($_POST['Ambil'])){
            $this->service_m->ambil($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('info','Data Telah Diambil!');
            }
        }

        redirect('service');
    }

    public function selesai($id)
    {
        $this->service_m->selesai($id);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('success','Service Telah Selesai!');
            }
            
            redirect('service');
        
    }
    public function batalkan($id)
    {
        $this->service_m->batal($id);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('info','Service Telah Selesai!');
            }
            
            redirect('service');
        
    }

    public function edit_ambil($id)
    {
        $query= $this->service_m->custedit($id);
        if($query->num_rows()>0){
            $service = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Ambil',
                'row' => $service
            );
            $this->template->load('template', 'service/form_ambil', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('service');
        }
    }

    public function ambil_print($id)
	{
		$data = array (
			'row' => $this->service_m->custedit($id)->row(),
		);
		$this->load->view('service/ambil_print', $data);

    }

    public function batal_print($id)
	{
		$data = array (
			'row' => $this->service_m->custedit($id)->row(),
		);
		$this->load->view('service/batal_print', $data);

    }

    

    public function by_tgl()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->service_m->get_rep_tgl($post)->result();
         $grand_total = $this->service_m->grand_total_tgl($post)->result();

         $start  = $post['start'];
         $end    = $post['end'];

         $data = [
             'start'         => $start,
             'end'           => $end,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('service/cl_tgl', $data);

    }

    public function by_bln()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->service_m->get_rep_bln($post)->result();
         $grand_total = $this->service_m->grand_total_bln($post)->result();

         $bulan  = $post['bulan'];

         $data = [
             'bulan'         => $bulan,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('service/cl_bln', $data);

    }

    public function by_thn()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->service_m->get_rep_thn($post)->result();
         $grand_total = $this->service_m->grand_total_thn($post)->result();

         $tahun  = $post['tahun'];

         $data = [
             'tahun'           => $tahun,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('service/cl_thn', $data);

    }

    public function by_full()
	{
         $show_result = $this->service_m->get_rep_full()->result();
         $grand_total = $this->service_m->grand_total_full()->result();


         $data = [
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('service/cl_full', $data);

    }

    public function laporan(){
        $show_result = $this->service_m->get_service_rep()->result();
        $grand_total = $this->service_m->grand_total_service()->result();
        $thn         = $this->service_m->get_thn()->result();


        $data = [
            'result'        => $show_result,
            'grand_total'   => $grand_total,
            'tahun'         => $thn,
        ];

        $this->template->load('template','service/laporan', $data);
    }
}

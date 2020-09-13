<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_m');
    }

    public function index()
    {
        $data['row'] = $this->customer_m->get();
        $this->template->load('template','customer/data', $data);
    }

    public function del($id)
    {
        $this->customer_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('customer');
    }

    public function add()
    {
        $customer = new stdClass();
        $customer->id_customer = null;
        $customer->nama = null;
        $customer->no_telp = null;
        $customer->alamat = null;
        $customer->jk = null;
        $data = array(
            'warna' => 'success',
            'page' => 'Tambah',
            'row' => $customer
        );

        $this->template->load('template', 'customer/form', $data);
    }

    public function edit($id)
    {
        $query= $this->customer_m->get($id);
        if($query->num_rows()>0){
            $customer = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('customer');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->customer_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->customer_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }

        redirect('customer');
    }

    public function laporan(){
        $show_result = $this->customer_m->get_cust_rep()->result();


        $data = [
            'result'        => $show_result,
        ];

        $this->template->load('template','customer/laporan', $data);
    }

    public function cetak(){
        $show_result = $this->customer_m->get_cust_rep()->result();

        $data = [
            'result'        => $show_result,
        ];

        $this->load->view('customer/cetak', $data);
    }
}
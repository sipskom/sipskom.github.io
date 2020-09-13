<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['barang_m', 'supplier_m', 'stok_m']);
    }

public function stok_in_data(){
    $data['row'] = $this->stok_m->get_stok_in()->result();
    $this->template->load('template','stok_in/data', $data);
}

public function stok_in_add(){
    $barang = $this->barang_m->get()->result();
    $supplier = $this->supplier_m->get()->result();
    $data   = ['barang' => $barang, 'supplier' => $supplier];
    $this->template->load('template','stok_in/form', $data);
}

public function stok_in_del(){
    $id_stok = $this->uri->segment(4);
    $id_barang = $this->uri->segment(5);
    $qty = $this->stok_m->get($id_stok)->row()->qty;
    $data = ['qty' => $qty, 'id_barang' => $id_barang];

    $this->barang_m->update_stok_out($data);
    $this->stok_m->del($id_stok);
    if($this->db->affected_rows()>0){
        $this->session->set_flashdata('delete', 'Data Barang Masuk Berhasil Dihapus');
    }
    redirect('stok/in');
}

public function stok_out_data(){
    $data['row'] = $this->stok_m->get_stok_out()->result();
    $this->template->load('template','stok_out/data', $data);
}

public function stok_out_add(){
    $barang = $this->barang_m->get()->result();
    $data   = ['barang' => $barang];
    $this->template->load('template','stok_out/form', $data);
}

public function stok_out_del(){
    $id_stok = $this->uri->segment(4);
    $id_barang = $this->uri->segment(5);
    $qty = $this->stok_m->get($id_stok)->row()->qty;
    $data = ['qty' => $qty, 'id_barang' => $id_barang];

    $this->barang_m->update_stok_in($data);
    $this->stok_m->del($id_stok);
    if($this->db->affected_rows()>0){
        $this->session->set_flashdata('delete', 'Data Barang Keluar Berhasil DiHapus!');
    }
    redirect('stok/out');
}

public function proses(){
    if(isset($_POST['in_add'])) {
        $post= $this->input->post(null, true);
        $this->stok_m->add_stok_in($post);
        $this->barang_m->update_stok_in($post);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('add', 'Data Barang Masuk Berhasil Disimpan');
        }
        redirect('stok/in');
    } else if(isset($_POST['out_add'])) {
        $post= $this->input->post(null, true);
        $row_barang = $this->barang_m->get($this->input->post('id_barang'))->row();
        if($row_barang->stok < $this->input->post('qty')){
            $this->session->set_flashdata('error', 'Qty Melebihi Stok Barang Yang Tersedia!');
            redirect('stok/out/add');
        } else {
        $this->stok_m->add_stok_out($post);
        $this->barang_m->update_stok_out($post);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('add', 'Data Barang Keluar Berhasil Disimpan');
        }
        redirect('stok/out');
        }
    }
}

public function laporan_stok_in(){
    $show_result = $this->stok_m->get_rep_stokin()->result();
    $grand_total = $this->stok_m->grand_total_stokin()->result();
    $thn         = $this->stok_m->get_thn()->result();


    $data = [
        'result'        => $show_result,
        'grand_total'   => $grand_total,
        'tahun'         => $thn,
    ];

    $this->template->load('template','stok_in/laporan', $data);
}

public function by_tgl()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->stok_m->get_rep_tgl($post)->result();
         $grand_total = $this->stok_m->grand_total_tgl($post)->result();

         $start  = $post['start'];
         $end    = $post['end'];

         $data = [
             'start'         => $start,
             'end'           => $end,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('stok_in/cl_tgl', $data);

    }

    public function by_bln()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->stok_m->get_rep_bln($post)->result();
         $grand_total = $this->stok_m->grand_total_bln($post)->result();

         $bulan  = $post['bulan'];

         $data = [
             'bulan'         => $bulan,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('stok_in/cl_bln', $data);

    }

    public function by_thn()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->stok_m->get_rep_thn($post)->result();
         $grand_total = $this->stok_m->grand_total_thn($post)->result();

         $tahun  = $post['tahun'];

         $data = [
             'tahun'           => $tahun,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('stok_in/cl_thn', $data);

    }

    public function by_full()
	{
         $show_result = $this->stok_m->get_rep_full()->result();
         $grand_total = $this->stok_m->grand_total_full()->result();


         $data = [
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('stok_in/cl_full', $data);

    }

    public function laporan_stok_out(){
        $show_result = $this->stok_m->get_rep_stokout()->result();
        $grand_total = $this->stok_m->grand_total_stokout()->result();
        $thn         = $this->stok_m->get_thn()->result();
    
    
        $data = [
            'result'        => $show_result,
            'grand_total'   => $grand_total,
            'tahun'         => $thn,
        ];
    
        $this->template->load('template','stok_out/laporan', $data);
    }
    
    public function by_tglo()
        {
             $post   = $this->input->post(NULL, TRUE);
    
             $show_result = $this->stok_m->get_repo_tgl($post)->result();
             $grand_total = $this->stok_m->grand_totalo_tgl($post)->result();
    
             $start  = $post['start'];
             $end    = $post['end'];
    
             $data = [
                 'start'         => $start,
                 'end'           => $end,
                 'result'        => $show_result,
                 'grand_total'   => $grand_total
             ];
    
    
            $this->load->view('stok_out/cl_tgl', $data);
    
        }
    
        public function by_blno()
        {
             $post   = $this->input->post(NULL, TRUE);
    
             $show_result = $this->stok_m->get_repo_bln($post)->result();
             $grand_total = $this->stok_m->grand_totalo_bln($post)->result();
    
             $bulan  = $post['bulan'];
    
             $data = [
                 'bulan'         => $bulan,
                 'result'        => $show_result,
                 'grand_total'   => $grand_total
             ];
    
    
            $this->load->view('stok_out/cl_bln', $data);
    
        }
    
        public function by_thno()
        {
             $post   = $this->input->post(NULL, TRUE);
    
             $show_result = $this->stok_m->get_repo_thn($post)->result();
             $grand_total = $this->stok_m->grand_totalo_thn($post)->result();
    
             $tahun  = $post['tahun'];
    
             $data = [
                 'tahun'           => $tahun,
                 'result'        => $show_result,
                 'grand_total'   => $grand_total
             ];
    
    
            $this->load->view('stok_out/cl_thn', $data);
    
        }
    
        public function by_fullo()
        {
             $show_result = $this->stok_m->get_repo_full()->result();
             $grand_total = $this->stok_m->grand_totalo_full()->result();
    
    
             $data = [
                 'result'        => $show_result,
                 'grand_total'   => $grand_total
             ];
    
    
            $this->load->view('stok_out/cl_full', $data);
    
        }

}
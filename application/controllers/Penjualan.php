<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('penjualan_m');
    }

	public function index()
	{
        $this->load->model(['customer_m', 'barang_m']);
        $customer = $this->customer_m->get()->result();
        $barang = $this->barang_m->get()->result();
        $cart = $this->penjualan_m->get_cart();
        $data = array(
            'customer' => $customer,
            'barang' => $barang,
            'cart' => $cart,
            'no_fakt' => $this->penjualan_m->faktur(),
        );
		$this->template->load('template','penjualan/form', $data);
    }
    
    public function proses(){
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {
        $idbarang = $this->input->post('id_barang');
        $cek_cart = $this->penjualan_m->get_cart(['keranjang.id_barang' => $idbarang])->num_rows();
        if($cek_cart > 0){
            $this->penjualan_m->update_cart_qty($data);
        } else {
            $this->penjualan_m->add_cart($data);
        }

        if($this->db->affected_rows() > 0){
            $params = array("succes" => true);
        } else {
            $params = array("succes" => false);
        }
        echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {

            $this->penjualan_m->edit_cart($data);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if(isset($_POST['process_payment']))
	  {
		$id_penjualan = $this->penjualan_m->add_sale($data);
		$cart    = $this->penjualan_m->get_cart()->result();
		$row     = [];
		foreach($cart as $c => $value)
		{
			array_push($row, array(
					'id_penjualan' 			=> $id_penjualan,
					'id_barang'			=> $value->id_barang,
					'harga'	  			=> $value->harga,
					'qty'	  			=> $value->qty,
					'diskon_barang'		=> $value->diskon_barang,
					'total'				=> $value->total,
				)
			);
		}
		$this->penjualan_m->add_sale_detail($row);
		$this->penjualan_m->del_cart(['id_user' => $this->session->userdata('userid')]);

		if($this->db->affected_rows() > 0) {
			$params = array ("success" => true, "id_penjualan" => $id_penjualan);
		} 
		else 
		{
			$params = array ("success" => false);
		}
		echo json_encode($params);

	  }


    }

    function cart_data(){
        $cart = $this->penjualan_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('penjualan/cart_data', $data);
    }

    public function cart_del(){
        if(isset($_POST['cancel_payment'])){
            $this->penjualan_m->del_cart(['id_user' => $this->session->userdata('userid')]);
        } else {
            $idcart = $this->input->post('id_keranjang');
            $this->penjualan_m->del_cart(['id_keranjang' => $idcart]);
        }
        if($this->db->affected_rows() > 0){
            $params = array("succes" => true);
        } else {
            $params = array("succes" => false);
        }
        echo json_encode($params);
    }

    public function cetak($id)
	{
		$data = array (
			'sale' => $this->penjualan_m->get_sale($id)->row(),
			'sale_detail' => $this->penjualan_m->get_sale_detail($id)->result(),
		);
		$this->load->view('penjualan/receipt_print', $data);

    }

    public function by_tgl()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->penjualan_m->get_rep_tgl($post)->result();
         $grand_total = $this->penjualan_m->grand_total_tgl($post)->result();

         $start  = $post['start'];
         $end    = $post['end'];

         $data = [
             'start'         => $start,
             'end'           => $end,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('penjualan/cl_tgl', $data);

    }

    public function by_bln()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->penjualan_m->get_rep_bln($post)->result();
         $grand_total = $this->penjualan_m->grand_total_bln($post)->result();

         $bulan  = $post['bulan'];

         $data = [
             'bulan'         => $bulan,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('penjualan/cl_bln', $data);

    }

    public function by_thn()
	{
         $post   = $this->input->post(NULL, TRUE);

         $show_result = $this->penjualan_m->get_rep_thn($post)->result();
         $grand_total = $this->penjualan_m->grand_total_thn($post)->result();

         $tahun  = $post['tahun'];

         $data = [
             'tahun'           => $tahun,
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('penjualan/cl_thn', $data);

    }

    public function by_full()
	{
         $show_result = $this->penjualan_m->get_rep_full()->result();
         $grand_total = $this->penjualan_m->grand_total_full()->result();


         $data = [
             'result'        => $show_result,
             'grand_total'   => $grand_total
         ];


        $this->load->view('penjualan/cl_full', $data);

    }
    
    public function laporan(){
        $show_result = $this->penjualan_m->get_sale_rep()->result();
        $grand_total = $this->penjualan_m->grand_total_penjualan()->result();
        $thn         = $this->penjualan_m->get_thn()->result();


        $data = [
            'result'        => $show_result,
            'grand_total'   => $grand_total,
            'tahun'         => $thn,
        ];

        $this->template->load('template','penjualan/laporan', $data);
    }
}

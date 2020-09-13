<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {
    public function faktur()
    {
        $sql = "SELECT MAX(MID(no_faktur,9,4)) AS faktur 
                FROM penjualan 
                WHERE MID(no_faktur,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->faktur) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $fak = "MP".date('ymd').$no;
        return $fak;
    }

    public function get_cart($params = null){
        $this->db->select('*, barang.nama as nama_barang, keranjang.harga as harga_ker');
        $this->db->from('keranjang');
        $this->db->join('barang', 'keranjang.id_barang = barang.id_barang');
        if($params != null){
            $this->db->where($params);
        }
        $this->db->where('id_user', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post){
        $query = $this->db->query("SELECT MAX(id_keranjang) AS noker FROM keranjang");
        if($query->num_rows() > 0){
            $row = $query->row();
            $no_ker = ((int)$row->noker) + 1;
        } else {
            $no_ker = "1";
        }
        
         $params = array(
             'id_keranjang' => $no_ker,
             'id_barang' => $post['id_barang'],
             'harga' => $post['harga'],
             'qty' => $post['qty'],
             'total' => ($post['harga'] * $post['qty']),
             'id_user' => $this->session->userdata('userid')
         );
         $this->db->insert('keranjang', $params);
    }

    function update_cart_qty($post){
        $sql = "UPDATE keranjang SET harga = '$post[harga]',
        qty = qty + '$post[qty]',
        total = '$post[harga]' * qty
        WHERE id_barang = '$post[id_barang]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null){
        if($params !=null){
            $this->db->where($params);
        }
        $this->db->delete('keranjang');
    }

    public function edit_cart($post)
	{
		$params = array(
			'harga' => $post['price'],
			'qty' => $post['qty'],
			'diskon_barang' => $post['discount'],
			'total' => $post['total'],
		);

		$this->db->where('id_keranjang', $post['cart_id']);
		$this->db->update('keranjang', $params);
    }
    
    public function add_sale($post)
    {
        $params = array(
            'no_faktur'     => $this->faktur(),
            'id_customer'   => $post['customer_id'] == "" ? null : $post['customer_id'],
            'subtotal'      => $post['subtotal'],
            'diskon'        => $post['diskon'],
            'total'         => $post['grandtotal'],
            'dibayarkan'    => $post['cash'],
            'kembalian'     => $post['change'],
            'ket'           => $post['note'],
            'date'          => $post['date'],
            'id_user'       => $this->session->userdata('userid'),
        );
        $this->db->insert('penjualan', $params);
        return $this->db->insert_id();
        // db inser_id adalah bwan dari query builder yang berguna untuk yang auto increment itu di return
    }

    function add_sale_detail($params)
    {
        $this->db->insert_batch('penjualan_detail', $params);
    }

    public function get_sale($id = null)
    {
        $this->db->select('*, customer.nama as nama_customer, user.nama as nama_user,
                            penjualan.created as waktu_penjualan');
        $this->db->from('penjualan');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'left');
        $this->db->join('user', 'penjualan.id_user = user.id_user');

        if($id != null)
        {
            $this->db->where('id_penjualan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_sale_detail($id_penjualan = null)
    {
        $this->db->from('penjualan_detail');
        $this->db->join('barang', 'penjualan_detail.id_barang = barang.id_barang');

        if($id_penjualan != null)
        {
            $this->db->where('penjualan_detail.id_penjualan', $id_penjualan);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_sale_rep()
    {
        $this->db->select('*, penjualan_detail.qty as detail_qty, kategori.nama as nama_kategori, penjualan.date as waktu_penjualan,barang.nama as nama_barang, user.nama as nama_user, penjualan.total as penjualan_total,  customer.nama as nama_customer');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan = penjualan.id_penjualan', 'LEFT');
		$this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang', 'LEFT');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'LEFT');
		$this->db->join('user', 'user.id_user = penjualan.id_user', 'LEFT');
		
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_full()
    {
        $this->db->select('*, penjualan_detail.qty as detail_qty, kategori.nama as nama_kategori, penjualan.date as waktu_penjualan,barang.nama as nama_barang, user.nama as nama_user, penjualan.total as penjualan_total,  customer.nama as nama_customer');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan = penjualan.id_penjualan', 'LEFT');
		$this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang', 'LEFT');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'LEFT');
        $this->db->join('user', 'user.id_user = penjualan.id_user', 'LEFT');
        
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_full()
	{
		$this->db->select('SUM(penjualan.total) as grand_total');
		$this->db->from('penjualan');
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_tgl($post = null)
    {
        $this->db->select('*, penjualan_detail.qty as detail_qty, kategori.nama as nama_kategori, penjualan.date as waktu_penjualan,barang.nama as nama_barang, user.nama as nama_user, penjualan.total as penjualan_total,  customer.nama as nama_customer');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan = penjualan.id_penjualan', 'LEFT');
		$this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang', 'LEFT');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'LEFT');
        $this->db->join('user', 'user.id_user = penjualan.id_user', 'LEFT');
        if ($post != NULL) {
			$this->db->where('penjualan.date >=', $post['start']);
			$this->db->where('penjualan.date <=', $post['end']);
        }
        
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_tgl($post = NULL)
	{
		$this->db->select('SUM(penjualan.total) as grand_total');
		$this->db->from('penjualan');
		if ($post != NULL) {
			$this->db->where('penjualan.date >=', $post['start']);
			$this->db->where('penjualan.date <=', $post['end']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_bln($post = null)
    {
        $this->db->select('*, penjualan_detail.qty as detail_qty, kategori.nama as nama_kategori, penjualan.date as waktu_penjualan,barang.nama as nama_barang, user.nama as nama_user, penjualan.total as penjualan_total,  customer.nama as nama_customer');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan = penjualan.id_penjualan', 'LEFT');
		$this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang', 'LEFT');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'LEFT');
        $this->db->join('user', 'user.id_user = penjualan.id_user', 'LEFT');
        if ($post != NULL) {
			$this->db->where('month(penjualan.date) =', $post['bulan']);
        }
        
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_bln($post = NULL)
	{
		$this->db->select('SUM(penjualan.total) as grand_total');
		$this->db->from('penjualan');
		if ($post != NULL) {
			$this->db->where('month(penjualan.date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_thn($post = null)
    {
        $this->db->select('*, penjualan_detail.qty as detail_qty, kategori.nama as nama_kategori, penjualan.date as waktu_penjualan,barang.nama as nama_barang, user.nama as nama_user, penjualan.total as penjualan_total,  customer.nama as nama_customer');
		$this->db->from('penjualan');
		$this->db->join('penjualan_detail', 'penjualan_detail.id_penjualan = penjualan.id_penjualan', 'LEFT');
		$this->db->join('barang', 'barang.id_barang = penjualan_detail.id_barang', 'LEFT');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
        $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'LEFT');
        $this->db->join('user', 'user.id_user = penjualan.id_user', 'LEFT');
        if ($post != NULL) {
			$this->db->where('year(penjualan.date) =', $post['tahun']);
        }
        
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_thn($post = NULL)
	{
		$this->db->select('SUM(penjualan.total) as grand_total');
		$this->db->from('penjualan');
		if ($post != NULL) {
			$this->db->where('year(penjualan.date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_penjualan($post = NULL)
	{
		$this->db->select('SUM(penjualan.total) as grand_total');
		$this->db->from('penjualan');
		$post = $this->db->get();
		return $post;
    }
    
    public function get_thn(){
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->group_by('year("date")');
        $query = $this->db->get(); 
        return $query;
    }
}
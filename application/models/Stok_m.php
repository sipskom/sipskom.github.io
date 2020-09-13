<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_m extends CI_Model {
    public function get($id = null){
        $this->db->from('stok');
        if($id != null){
            $this->db->where('id_stok', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('id_stok', $id);
        $this->db->delete('stok');
    }

    public function get_stok_in()
    {
        $this->db->select('stok.id_stok,barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stok', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stok_in($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            'type' => 'in',
            'detail' => $post['detail'],
            'id_supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stok', $params);
    }

    public function get_stok_out()
    {
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stok', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stok_out($post)
    {
        $params = [
            'id_barang' => $post['id_barang'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stok', $params);
    }
    
    public function get_thn(){
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->group_by('year("date")');
        $query = $this->db->get(); 
        return $query;
    }

    public function get_rep_stokin()
    {
        $this->db->select('stok.id_stok, kategori.nama as nama_kategori, barang.gambar,stok.date as waktu_stokin, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_rep_stokout()
    {
        $this->db->select('stok.id_stok, stok.detail as stok_detail, kategori.nama as nama_kategori, barang.gambar,stok.date as waktu_stokout, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function grand_total_stokin($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
        $this->db->from('stok');
        $this->db->where('type', 'in');
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_stokout($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
        $this->db->from('stok');
        $this->db->where('type', 'out');
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_full()
    {
        $this->db->select('stok.id_stok, kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stok', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function grand_total_full()
	{
		$this->db->select('SUM(qty) as grand_total');
        $this->db->from('stok');
        $this->db->where('type', 'in');
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_tgl($post = null)
    {
        $this->db->select('stok.id_stok,kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
            $this->db->where('type','in');
			$this->db->where('stok.date >=', $post['start']);
			$this->db->where('stok.date <=', $post['end']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_total_tgl($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','in');
			$this->db->where('stok.date >=', $post['start']);
			$this->db->where('stok.date <=', $post['end']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_bln($post = null)
    {
        $this->db->select('stok.id_stok,kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
            $this->db->where('type','in');
            $this->db->where('month(stok.date) =', $post['bulan']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_total_bln($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','in');
            $this->db->where('month(stok.date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_thn($post = null)
    {
        $this->db->select('stok.id_stok,kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
            $this->db->where('type','in');
            $this->db->where('year(stok.date) =', $post['tahun']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_total_thn($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','in');
            $this->db->where('year(stok.date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_repo_full()
    {
        $this->db->select('stok.id_stok,stok.detail as stok_detail, kategori.nama as nama_kategori, stok.date as waktu_stokout, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stok', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function grand_totalo_full()
	{
		$this->db->select('SUM(qty) as grand_total');
        $this->db->from('stok');
        $this->db->where('type', 'out');
		$post = $this->db->get();
		return $post;
    }

    public function get_repo_tgl($post = null)
    {
        $this->db->select('stok.id_stok,stok.detail as stok_detail, kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
			$this->db->where('stok.date >=', $post['start']);
			$this->db->where('stok.date <=', $post['end']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_totalo_tgl($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','out');
			$this->db->where('stok.date >=', $post['start']);
			$this->db->where('stok.date <=', $post['end']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_repo_bln($post = null)
    {
        $this->db->select('stok.id_stok,stok.detail as stok_detail, kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
            $this->db->where('month(stok.date) =', $post['bulan']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_totalo_bln($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','out');
            $this->db->where('month(stok.date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_repo_thn($post = null)
    {
        $this->db->select('stok.id_stok,stok.detail as stok_detail, kategori.nama as nama_kategori, stok.date as waktu_stokin, barang.gambar, barang.barcode, barang.nama as nama_barang, stok.detail,
         qty, date, supplier.nama as nama_supplier, barang.id_barang, barang.detail as detail_barang, stok.detail as detail_stok');
        $this->db->from('stok');
        $this->db->join('barang', 'stok.id_barang = barang.id_barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori');
        $this->db->join('supplier', 'stok.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stok', 'desc');
        if ($post != NULL) {
            $this->db->where('year(stok.date) =', $post['tahun']);
        }
        $post = $this->db->get();
        return $post;
    }

    public function grand_totalo_thn($post = NULL)
	{
		$this->db->select('SUM(qty) as grand_total');
		$this->db->from('stok');
		if ($post != NULL) {
            $this->db->where('type','out');
            $this->db->where('year(stok.date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }
}
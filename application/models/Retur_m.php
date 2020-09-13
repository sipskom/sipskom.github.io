<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retur_m extends CI_Model {
    public function retur()
    {
        $sql = "SELECT MAX(MID(no_retur,9,4)) AS notur 
                FROM retur 
                WHERE MID(no_retur,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->notur) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $ret = "NR".date('ymd').$no;
        return $ret;
    }

    public function get($id = null)
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');

        if($id != null)
        {
            $this->db->where('id_retur', $id);
        }
        $this->db->order_by('retur.date','asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_faktur($id = null)
    {
        $this->db->select('*,penjualan_detail.qty as qty_jual,penjualan.total as total_jual, customer.nama as nama_customer, barang.nama as nama_barang');
        $this->db->from('penjualan');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang');

        if($id != null)
        {
            $this->db->where('id_penjualan', $id);
        }
        $this->db->order_by('no_faktur','asc');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_retur', $id);
        $this->db->delete('retur');

    }

    public function add($post)
    {
        $params = [
            'no_retur' => $post['no_retur'],
            'no_faktur' => $post['no_faktur'],
            'denda' => $post['denda'],
            'qty_retur' => $post['qty'],
            'total_retur' => $post['total_retur'],
            'date' => $post['date'],
        ];
        $this->db->insert('retur', $params);
    }

    public function edit($post)
    {
        $params = [
            'denda' => $post['denda'],
            'qty_retur' => $post['qty'],
            'total_retur' => $post['total_retur'],
            'date' => $post['date'],
        ];
        $this->db->where('id_retur', $post['id']);
        $this->db->update('retur', $params);
    }

    public function get_retur_rep()
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');
		
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_retur($post = NULL)
	{
		$this->db->select('SUM(retur.total_retur) as grand_total');
		$this->db->from('retur');
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

    public function get_rep_full()
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');
		
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_full($post = NULL)
	{
		$this->db->select('SUM(retur.total_retur) as grand_total');
		$this->db->from('retur');
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_tgl($post = NULL)
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');
		if ($post != NULL) {
			$this->db->where('retur.date >=', $post['start']);
			$this->db->where('retur.date <=', $post['end']);
        }
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_tgl($post = NULL)
	{
		$this->db->select('SUM(retur.total_retur) as grand_total');
        $this->db->from('retur');
        if ($post != NULL) {
			$this->db->where('retur.date >=', $post['start']);
			$this->db->where('retur.date <=', $post['end']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_bln($post = NULL)
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');
		if ($post != NULL) {
			$this->db->where('month(retur.date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_bln($post = NULL)
	{
		$this->db->select('SUM(retur.total_retur) as grand_total');
        $this->db->from('retur');
        if ($post != NULL) {
			$this->db->where('month(retur.date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_thn($post = NULL)
    {
        $this->db->select('*,retur.date as tgl_retur, customer.nama as nama_customer,
                             barang.nama as nama_barang, penjualan_detail.qty as qty_jual,
                             retur.no_faktur as no_fakt, penjualan.total as harga_jual');
        $this->db->from('retur');
        $this->db->join('penjualan','penjualan.no_faktur = retur.no_faktur','left');
        $this->db->join('penjualan_detail','penjualan.id_penjualan = penjualan_detail.id_penjualan','left');
        $this->db->join('customer','customer.id_customer = penjualan.id_customer','left');
        $this->db->join('barang','barang.id_barang = penjualan_detail.id_barang','left');
		if ($post != NULL) {
			$this->db->where('year(retur.date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_thn($post = NULL)
	{
		$this->db->select('SUM(retur.total_retur) as grand_total');
        $this->db->from('retur');
        if ($post != NULL) {
			$this->db->where('year(retur.date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }

}
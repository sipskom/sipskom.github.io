<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends CI_Model {
    public function serv()
    {
        $sql = "SELECT MAX(MID(no_service,9,4)) AS nos
                FROM service 
                WHERE MID(no_service,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->nos) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $ret = "SV".date('ymd').$no;
        return $ret;
    }

    public function custedit($id = null){
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer');
        if($id != null)
        {
            $this->db->where('id_service', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_ambil($id = null){
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
        $this->db->where('status', 'Selesai');
        if($id != null)
        {
            $this->db->where('id_service', $id);
            
        }
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('service');
        $this->db->where('status !=','Selesai');
        $this->db->where('status !=','Diambil');
        if($id != null)
        {
            $this->db->where('id_service', $id);

        }
        $this->db->order_by('status','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_service', $id);
        $this->db->delete('service');

    }

    public function add($post)
    {
        $params = [
            'no_service' => $post['no_service'],
            'id_customer' => $post['id_customer'],
            'kategori' => $post['kategori'],
            'nama_barang' => $post['nama_barang'],
            'kelengkapan' => $post['kelengkapan'],
            'keluhan' => $post['keluhan'],
            'kerusakan' => $post['kerusakan'],
            'sparepart' => $post['sparepart'],
            'biaya_service' => $post['biaya_service'],
            'dp' => $post['dp'],
            'date' => date('Y-m-d'),
            'status' => 'Diproses',
        ];
        $this->db->insert('service', $params);
    }

    public function edit($post)
    {
        $params = [
            'kerusakan' => $post['kerusakan'],
            'sparepart' => $post['sparepart'],
            'biaya_service' => $post['biaya_service'],
        ];
        $this->db->where('id_service', $post['id']);
        $this->db->update('service', $params);
    }

    public function selesai($id)
    {
        $params = [
            'status' => 'Selesai',
            'date' => date('Y-m-d'),
        ];
        $this->db->where('id_service', $id);
        $this->db->update('service', $params);
    }

    public function batal($id)
    {
        $params = [
            'status' => 'Dibatalkan',
            'date' => date('Y-m-d'),
        ];
        $this->db->where('id_service', $id);
        $this->db->update('service', $params);
    }

    public function ambil($post)
    {
        $params = [
            'status' => 'Diambil',
            'date' => date('Y-m-d'),
            'dibayarkan' => $post['dibayarkan'],
            'kembalian' => $post['kembalian'],
        ];
        $this->db->where('id_service', $post['id']);
        $this->db->update('service', $params);
    }

    public function get_service_rep()
    {
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
		$this->db->where('status','Diambil');
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_service($post = NULL)
	{
		$this->db->select('SUM(biaya_service) as grand_total');
        $this->db->from('service');
        $this->db->where('status','Diambil');
		$post = $this->db->get();
		return $post;
    }
    
    public function get_thn(){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->group_by('year("date")');
        $query = $this->db->get(); 
        return $query;
    }

    public function get_rep_full()
    {
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
		$this->db->where('status','Diambil');
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_full($post = NULL)
	{
		$this->db->select('SUM(biaya_service) as grand_total');
        $this->db->from('service');
        $this->db->where('status','Diambil');
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_tgl($post = NULL)
    {
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
        $this->db->where('status','Diambil');
		if ($post != NULL) {
			$this->db->where('date >=', $post['start']);
			$this->db->where('date <=', $post['end']);
        }
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_tgl($post = NULL)
	{
		$this->db->select('SUM(biaya_service) as grand_total');
        $this->db->from('service');
        $this->db->where('status','Diambil');
        if ($post != NULL) {
			$this->db->where('date >=', $post['start']);
			$this->db->where('date <=', $post['end']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_bln($post = NULL)
    {
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
        $this->db->where('status','Diambil');
		if ($post != NULL) {
			$this->db->where('month(date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_bln($post = NULL)
	{
		$this->db->select('SUM(biaya_service) as grand_total');
        $this->db->from('service');
        $this->db->where('status','Diambil');
        if ($post != NULL) {
			$this->db->where('month(date) =', $post['bulan']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function get_rep_thn($post = NULL)
    {
        $this->db->select('*, customer.nama');
        $this->db->from('service');
        $this->db->join('customer', 'customer.id_customer = service.id_customer','left');
        $this->db->where('status','Diambil');
		if ($post != NULL) {
			$this->db->where('year(date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }

    public function grand_total_thn($post = NULL)
	{
		$this->db->select('SUM(biaya_service) as grand_total');
        $this->db->from('service');
        $this->db->where('status','Diambil');
        if ($post != NULL) {
			$this->db->where('year(date) =', $post['tahun']);
		}
		$post = $this->db->get();
		return $post;
    }
}
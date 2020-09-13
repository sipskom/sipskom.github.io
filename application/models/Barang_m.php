<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->select('barang.*, kategori.nama as nama_kategori, unit.nama as nama_unit');
        $this->db->from('barang');
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
        $this->db->join('unit','unit.id_unit = barang.id_unit');
        if($id != null)
        {
            $this->db->where('id_barang', $id);
        }
        $this->db->order_by('barcode','asc');
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');

    }

    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'id_kategori' => $post['kategori'],
            'id_unit' => $post['unit'],
            'harga' => $post['harga'],
            'gambar' => $post['gambar'],
            'detail' => $post['detail'],
        ];
        $this->db->insert('barang', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'nama' => $post['nama'],
            'id_kategori' => $post['kategori'],
            'id_unit' => $post['unit'],
            'harga' => $post['harga'],
            'detail' => $post['detail'],
        ];
        if($post['gambar'] != null){
            $params['gambar'] = $post['gambar'];
        }
        $this->db->where('id_barang', $post['id']);
        $this->db->update('barang', $params);
    }

    function cek_barcode($code, $id=null)
    {
        $this->db->from('barang');
        $this->db->where('barcode', $code);
        if($id != null) {
            $this->db->where('id_barang !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_stok_in($data) 
    {
       $qty = $data['qty'];
       $id = $data['id_barang'];
       $sql = "UPDATE barang SET stok = stok + '$qty' WHERE id_barang = '$id'";
       $this->db->query($sql);
    }

    function update_stok_out($data) 
    {
       $qty = $data['qty'];
       $id = $data['id_barang'];
       $sql = "UPDATE barang SET stok = stok - '$qty' WHERE id_barang = '$id'";
       $this->db->query($sql);
    }

    public function get_item_rep()
    {
        $this->db->select('*, kategori.nama as nama_kategori');
		$this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');

		$post = $this->db->get();
		return $post;
    }
    public function get_filter($post=null)
    {
        $this->db->select('*, kategori.nama as nama_kategori');
		$this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'LEFT');
		if ($post != NULL) {
			$this->db->where('kategori.nama =', $post['kat']);
        }
        
		$post = $this->db->get();
		return $post;
    }

    public function get_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('nama', 'ASC');
		
		$post = $this->db->get();
		return $post;
    }
}
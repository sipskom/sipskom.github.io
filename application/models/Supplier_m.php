<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('supplier');
        if($id != null)
        {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');

    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_supplier', $post['id']);
        $this->db->update('supplier', $params);
    }

    public function get_supp_rep()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        
		$post = $this->db->get();
		return $post;
    }
}
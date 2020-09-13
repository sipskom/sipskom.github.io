<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null)
        {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('customer');

    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'jk' => $post['jk'],
        ];
        $this->db->insert('customer', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'jk' => $post['jk'],
        ];
        $this->db->where('id_customer', $post['id']);
        $this->db->update('customer', $params);
    }

    public function get_cust_rep()
    {
        $this->db->select('*');
        $this->db->from('customer');
        
		$post = $this->db->get();
		return $post;
    }
}
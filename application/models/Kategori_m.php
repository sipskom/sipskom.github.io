<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('kategori');
        if($id != null)
        {
            $this->db->where('id_kategori', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');

    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->insert('kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->where('id_kategori', $post['id']);
        $this->db->update('kategori', $params);
    }
}
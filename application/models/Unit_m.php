<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('unit');
        if($id != null)
        {
            $this->db->where('id_unit', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('unit');

    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->insert('unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
        ];
        $this->db->where('id_unit', $post['id']);
        $this->db->update('unit', $params);
    }
}
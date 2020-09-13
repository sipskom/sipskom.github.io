<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', SHA1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null)
        {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['alamat'] = $post['alamat'];
        $params['no_telp'] = $post['no_telp'];
        $params['level'] = $post['level'];
        $params['gambar'] = $post['gambar'];
        $this->db->insert('user', $params);

    }

    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');

    }

    public function edit($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['alamat'] = $post['alamat'];
        $params['no_telp'] = $post['no_telp'];
        $params['level'] = $post['level'];
        if($post['gambar'] != null){
            $params['gambar'] = $post['gambar'];
        }
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);

    }
}
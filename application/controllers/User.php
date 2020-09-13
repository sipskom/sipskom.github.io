<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_akses();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['row'] = $this->user_m->get();
		$this->template->load('template','user/user_data', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required|min_length[6]');
        $this->form_validation->set_rules('no_telp', 'telepon/hp', 'required|max_length[13]|numeric',
            array('matches' => '%s tidak sesuai dengan password')
        );
        $this->form_validation->set_rules('level', 'level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi terlebih dahulu');
        $this->form_validation->set_message('numeric', '%s harus berupa nomor');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('max_length', '{field} maximal 13 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, coba yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE)
                {
                    $this->template->load('template', 'user/tambah');
                }
                else
                {
                    $config['upload_path']      = './uploads/userphoto';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
                    $config['max_size']         = 2048;
                    $config['file_name']        = 'userphoto-'.date('dmy').'-'.substr(md5(rand()),0,10);
                    $this->load->library('upload', $config);
                    $post = $this->input->post(null,TRUE);

                    if(@$_FILES['gambar']['name'] != null){
                        if($this->upload->do_upload('gambar')){
                            $post['gambar'] = $this->upload->data('file_name');
                            $this->user_m->add($post);
                            if($this->db->affected_rows()>0)
                            {
                                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
                            }
                        redirect('user');
                        } else {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('error', $error);
                            redirect('user/add');
                        }
    
                    } else {
                        $post['gambar'] = null;
                            $this->user_m->add($post);
                            if($this->db->affected_rows()>0){
                                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
                            }
                            redirect('user');
                    }
                }
                

    }

    public function del()
    {
        $id= $this->input->post('id_user');
        $user = $this->user_m->get($id)->row();
        if($user->gambar != null) {
        $target_file = './uploads/userphoto/'.$user->gambar;
        unlink($target_file);
        }

        
        $this->user_m->del($id);

        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('user');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required|min_length[6]');
        $this->form_validation->set_rules('no_telp', 'telepon/hp', 'required|max_length[13]|numeric');
        if($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'password', 'min_length[6]');
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
        );
        }
        if($this->input->post('password')) {
            $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
        );
        }

        $this->form_validation->set_rules('level', 'level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi terlebih dahulu');
        $this->form_validation->set_message('numeric', '%s harus berupa nomor');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('max_length', '{field} maximal 13 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, coba yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE)
                {
                    $query = $this->user_m->get($id);
                    if($query->num_rows()>0)
                    {
                        $data['row'] = $query->row();
                        $this->template->load('template', 'user/edit', $data);
                    } else {
                        $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
                        redirect('user');
                    }
                }
                else
                {
                    $config['upload_path']      = './uploads/userphoto';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
                    $config['max_size']         = 2048;
                    $config['file_name']        = 'userphoto-'.date('dmy').'-'.substr(md5(rand()),0,10);
                    $this->load->library('upload', $config);
                    $post = $this->input->post(null,TRUE);

                    if(@$_FILES['gambar']['name'] != null){
                        if($this->upload->do_upload('gambar')){
                            $post['gambar'] = $this->upload->data('file_name');
                            $this->user_m->edit($post);
                            if($this->db->affected_rows()>0)
                            {
                                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
                            }
                        redirect('user');
                        } else {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('error', $error);
                            redirect('user/edit');
                        }
    
                    } else {
                        $post['gambar'] = null;
                            $this->user_m->edit($post);
                            if($this->db->affected_rows()>0){
                                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
                            }
                            redirect('user');
                    }
                }

    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("select * from user where username = '$post[username]' and id_user != '$post[id_user]'");
        if($query->num_rows()>0)
        {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

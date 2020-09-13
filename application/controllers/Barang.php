<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['barang_m', 'unit_m', 'kategori_m']);
    }

    public function index()
    {
        $data['row'] = $this->barang_m->get();
        $this->template->load('template','barang/data', $data);
    }
    

    public function del($id)
    {
        $barang = $this->barang_m->get($id)->row();
        if($barang->gambar != null) {
        $target_file = './uploads/barang/'.$barang->gambar;
        unlink($target_file);
        }

        $this->barang_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
        }
        redirect('barang');
    }

    public function add()
    {
        $barang = new stdClass();
        $barang->id_barang = null;
        $barang->barcode = null;
        $barang->nama = null;
        $barang->harga = null;
        $barang->detail = null;

        $query_unit = $this->unit_m->get();
        $unit[null] = '** Pilih **';
        foreach($query_unit->result() as $unt){
            $unit[$unt->id_unit] = $unt->nama;
        }

        $query_kategori = $this->kategori_m->get();
        $kategori[null] = '** Pilih **';
        foreach($query_kategori->result() as $ktg){
            $kategori[$ktg->id_kategori] = $ktg->nama;
        }

        $data = array(
            'warna' => 'success',
            'page' => 'Tambah',
            'row' => $barang,
            'unit' => $unit, 'selectedunit' => null,
            'kategori' => $kategori, 'selectedkategori' => null,
        );

        $this->template->load('template', 'barang/form', $data);
    }

    public function edit($id)
    {
        $query= $this->barang_m->get($id);
        if($query->num_rows()>0){
            $barang = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'row' => $barang
            );
        
        $query_unit = $this->unit_m->get();
        $unit[null] = '** Pilih **';
        foreach($query_unit->result() as $unt){
            $unit[$unt->id_unit] = $unt->nama;
        }

        $query_kategori = $this->kategori_m->get();
        $kategori[null] = '** Pilih **';
        foreach($query_kategori->result() as $ktg){
            $kategori[$ktg->id_kategori] = $ktg->nama;
        }

        $data = array(
            'warna' => 'success',
            'page' => 'Edit',
            'row' => $barang,
            'unit' => $unit, 'selectedunit' => $barang->id_unit,
            'kategori' => $kategori, 'selectedkategori' => $barang->id_kategori,
        );
            $this->template->load('template', 'barang/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('barang');
        }
    }

    public function proses()
    {
        $config['upload_path']      = './uploads/barang';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_name']        = 'barang-'.date('dmy').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            if($this->barang_m->cek_barcode($post['barcode'])->num_rows() > 0){
                $this->session->set_flashdata('error',"Barcode $post[barcode] telah digunakan!");
                redirect('barang/add');
            } else {
                if(@$_FILES['gambar']['name'] != null){
                    if($this->upload->do_upload('gambar')){
                        $post['gambar'] = $this->upload->data('file_name');
                        $this->barang_m->add($post);
                        if($this->db->affected_rows()>0){
                            $this->session->set_flashdata('add','Data Berhasil Disimpan!');
                        }
                        redirect('barang');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('barang/add');
                    }

                } else {
                    $post['gambar'] = null;
                        $this->barang_m->add($post);
                        if($this->db->affected_rows()>0){
                            $this->session->set_flashdata('add','Data Berhasil Disimpan!');
                        }
                        redirect('barang');
                }
            }
            
        } else if(isset($_POST['Edit'])){
            if($this->barang_m->cek_barcode($post['barcode'], $post['id'])->num_rows() > 0){
                $this->session->set_flashdata('error',"Barcode $post[barcode] telah digunakan!");
                redirect('barang/edit/'.$post['id']);
            } else {
                if(@$_FILES['gambar']['name'] != null){
                    if($this->upload->do_upload('gambar')){

                        $barang = $this->barang_m->get($post['id'])->row();
                        if($barang->gambar != null) {
                            $target_file = './uploads/barang/'.$barang->gambar;
                            unlink($target_file);
                        }

                        $post['gambar'] = $this->upload->data('file_name');
                        $this->barang_m->edit($post);
                        if($this->db->affected_rows()>0){
                            $this->session->set_flashdata('edit','Data Berhasil Disimpan!');
                        }
                        redirect('barang');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('barang/edit/'.$post['id']);
                    }

                } else {
                    $post['gambar'] = null;
                        $this->barang_m->edit($post);
                        if($this->db->affected_rows()>0){
                            $this->session->set_flashdata('add','Data Berhasil Disimpan!');
                        }
                        redirect('barang');
                }
            }
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }

        redirect('barang');
    }

    function barcode($id){
        $data['row'] = $this->barang_m->get($id)->row();
        $this->template->load('template', 'barang/barcode', $data);
    }

    function barcode_print($id){
        $data['row'] = $this->barang_m->get($id)->row();
        $html = $this->load->view('barang/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-'.$data['row']->barcode,'A4','portrait');
    }

    public function laporan(){
        $show_result = $this->barang_m->get_item_rep()->result();
        $kategori = $this->barang_m->get_kategori()->result();


        $data = [
            'result'        => $show_result,
            'kategori'        => $kategori,
        ];

        $this->template->load('template','barang/laporan', $data);
    }

    public function cetak(){
        $post = $this->input->post(null, true);
        $show_result = $this->barang_m->get_filter($post)->result();
        $kategori = $this->barang_m->get_kategori()->result();
        $kat  = $post['kat'];

        $data = [
            'result'        => $show_result,
            'kategori'        => $kategori,
            'kat'           => $kat,
        ];

        $this->load->view('barang/cetak', $data);
    }
}

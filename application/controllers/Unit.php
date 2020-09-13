<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('unit_m');
    }

    public function index()
    {
        $data['row'] = $this->unit_m->get();
        $this->template->load('template','unit/data', $data);
    }

    public function del($id)
    {
        $this->unit_m->del($id);
        if($this->db->affected_rows()>0)
        {
            $this->session->set_flashdata('delete','Data berhasil Dihapus!');
        }
        redirect('unit');
    }

    public function add()
    {
        $unit = new stdClass();
        $unit->id_unit = null;
        $unit->nama = null;
        $data = array(
            'warna' => 'success',
            'page' => 'Tambah',
            'row' => $unit
        );

        $this->template->load('template', 'unit/form', $data);
    }

    public function edit($id)
    {
        $query= $this->unit_m->get($id);
        if($query->num_rows()>0){
            $unit = $query->row();
            $data = array(
                'warna' => 'warning',
                'page' => 'Edit',
                'row' => $unit
            );
            $this->template->load('template', 'unit/form', $data);
        } else {
            $this->session->set_flashdata('warning','Data Tidak Ditemukan!');
            redirect('unit');
        }
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->unit_m->add($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('add','Data Berhasil Disimpan!');
            }
        } else if(isset($_POST['Edit'])){
            $this->unit_m->edit($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('edit','Data Berhasil Diedit!');
            }
        }
        redirect('unit');
    }
}

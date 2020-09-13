<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function p(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('status','Diproses');

		$query = $this->db->get()->result();
		return $query;
	}

	public function b(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('status','Dibatalkan');

		$query = $this->db->get()->result();
		return $query;
	}

	public function s(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('status','Selesai');

		$query = $this->db->get()->result();
		return $query;
	}

	public function a(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('status','Diambil');

		$query = $this->db->get()->result();
		return $query;
	}
	

	public function index()
	{
		$penjualan=$this->db->get('penjualan')->result();
		$service=$this->db->get('service')->result();
		$retur=$this->db->get('retur')->result();

		$data = array(
			'total_penjualan' => count($penjualan),
			'total_retur' => count($retur),
			'total_service' => count($service),
			'proses' => count($this->p()),
			'batal' => count($this->b()),
			'selesai' => count($this->s()),
			'ambil' => count($this->a()),
		);
			check_not_login();
		$this->template->load('template','dashboard', $data);
	}
}

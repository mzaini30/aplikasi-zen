<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		date_default_timezone_set('Asia/Makassar');
	}

	public function index(){
		$this->beranda();
	}

	public function beranda()
	{
		$data = $this->db->order_by('plan')->get('planner')->result();
		$selesai = count($this->db->get_where('planner', array(
					'status' => 'selesai'
				))->result());
		$semua = count($data);
		if ($semua != 0){
			$persentase = ($selesai / $semua) * 100;	
		} else {
			$persentase = 0;
		}
		
		$warna = '';
		if ($persentase >= 0 && $persentase < 25){
			$warna = 'danger';
		}
		if ($persentase >= 26 && $persentase < 50){
			$warna = 'warning';
		}
		if ($persentase >= 51 && $persentase < 75){
			$warna = 'success';
		}
		if ($persentase >= 76 && $persentase < 100){
			$warna = 'danger';
		}

		$this->load->view('layout/planner', array(
			'data' => $data,
			'persentase' => $persentase,
			'warna' => $warna
		));
	}

	public function hapus($id){
		$this->db->delete('planner', array(
			'id' => $id
		));
		redirect('planner/beranda');
	}

	public function buat(){
		$this->db->insert('planner', array(
			'plan' => $this->input->post('plan'),
			'status' => 'belum selesai'
		));
		redirect('planner/beranda');
	}

	public function batalkan($id){
		$this->db->update('planner', array(
			'status' => 'belum selesai'
		), array(
			'id' => $id
		));
		redirect('planner/beranda');
	}

	public function selesai($id){
		$this->db->update('planner', array(
			'status' => 'selesai'
		), array(
			'id' => $id
		));
		redirect('planner/beranda');
	}

	public function edit($id){
		$data = $this->db->get_where('planner', array(
			'id' => $id
		))->result();
		$this->load->view('layout/kosongan-planner', array(
			'data' => $data
		));
	}

	public function edit_upload($id){
		$this->db->update('planner', array(
			'plan' => $this->input->post('plan')
		), array(
			'id' => $id
		));
		redirect('planner/beranda');	
	}
}

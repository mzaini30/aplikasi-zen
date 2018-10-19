<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membaca_buku extends CI_Controller {
	public function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Makassar');

		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->beranda();
	}

	public function beranda(){

		$banyak_data = $this->db->get('membaca_buku')->num_rows();

		$setting_pagination['first_link'] = 'Pertama';
        $setting_pagination['last_link'] = 'Terakhir';
        $setting_pagination['next_link'] = 'Selanjutnya';
        $setting_pagination['prev_link'] = 'Sebelumnya';
        $setting_pagination['full_tag_open'] = '<ul class="pagination">';
        $setting_pagination['full_tag_close'] = '</ul>';
        $setting_pagination['num_tag_open'] = '<li>';
        $setting_pagination['num_tag_close'] = '</li>';
        $setting_pagination['cur_tag_open'] = '<li class="disabled"><li class="active"><a href="#!">';
        $setting_pagination['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
        $setting_pagination['next_tag_open'] = '<li>';
        $setting_pagination['next_tagl_close'] = '</li>';
        $setting_pagination['prev_tag_open'] = '<li>';
        $setting_pagination['prev_tagl_close'] = '</li>';
        $setting_pagination['first_tag_open'] = '<li>';
        $setting_pagination['first_tagl_close'] = '</li>';
        $setting_pagination['last_tag_open'] = '<li>';
        $setting_pagination['last_tagl_close'] = '</li>';
		
		$setting_pagination['base_url'] = '/membaca_buku/beranda/';
		$setting_pagination['total_rows'] = $banyak_data;
		$setting_pagination['per_page'] = 30;

		$this->pagination->initialize($setting_pagination);

		$batas = $setting_pagination['per_page'];
		$dari = $this->uri->segment(3);

		$data_desc = $this->db->order_by('tanggal', 'desc')->get('membaca_buku', $batas, $dari)->result();
		$rata_rata = $this->db->select_avg('jumlah_halaman')->get('membaca_buku')->result();
		$tertinggi = $this->db->select_max('jumlah_halaman')->get('membaca_buku')->result();
		$this->load->view('layout/membaca-buku', array(
			'data_desc' => $data_desc,
			'rata_rata' => $rata_rata,
			'tertinggi' => $tertinggi
		));
	}

	public function tambah_upload(){
		$this->db->insert('membaca_buku', array(
			'tanggal' => $this->input->post('tanggal'),
			'jumlah_halaman' => $this->input->post('jumlah-halaman')
		));
		redirect('membaca_buku/beranda');
	}

	public function hapus($id){
		$this->db->delete('membaca_buku', array(
			'id' => $id
		));
		redirect('membaca_buku/beranda');
	}

	public function edit($id){
		$data = $this->db->where(array(
			'id' => $id
		))->get('membaca_buku')->result();
		$this->load->view('layout/kosongan-membaca-buku', array(
			'isi' => 'membaca-buku/edit',
			'data' => $data
		));
	}

	public function edit_upload($id){
		$this->db->where('id', $id)->update('membaca_buku', array(
			'tanggal' => $this->input->post('tanggal'),
			'jumlah_halaman' => $this->input->post('jumlah-halaman')
		));
		redirect('membaca_buku/beranda');
	}
}

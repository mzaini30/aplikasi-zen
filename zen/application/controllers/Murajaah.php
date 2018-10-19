<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murajaah extends CI_Controller {
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

		$banyak_data = $this->db->get('murajaah')->num_rows();

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
		
		$setting_pagination['base_url'] = '/murajaah/beranda/';
		$setting_pagination['total_rows'] = $banyak_data;
		$setting_pagination['per_page'] = 30;

		$this->pagination->initialize($setting_pagination);

		$batas = $setting_pagination['per_page'];
		$dari = $this->uri->segment(3);

		$data_desc = $this->db->order_by('tanggal', 'desc')->get('murajaah', $batas, $dari)->result();
		$rata_rata = $this->db->select_avg('jumlah_halaman')->get('murajaah')->result();
		$tertinggi = $this->db->select_max('jumlah_halaman')->get('murajaah')->result();
		$this->load->view('layout/murajaah', array(
			'data_desc' => $data_desc,
			'rata_rata' => $rata_rata,
			'tertinggi' => $tertinggi
		));
	}

	public function tambah_upload(){
		$this->db->insert('murajaah', array(
			'tanggal' => $this->input->post('tanggal'),
			'jumlah_halaman' => $this->input->post('jumlah-halaman')
		));
		redirect('murajaah/beranda');
	}

	public function hapus($id){
		$this->db->delete('murajaah', array(
			'id' => $id
		));
		redirect('murajaah/beranda');
	}

	public function edit($id){
		$data = $this->db->where(array(
			'id' => $id
		))->get('murajaah')->result();
		$this->load->view('layout/kosongan-murajaah', array(
			'isi' => 'murajaah/edit',
			'data' => $data
		));
	}

	public function edit_upload($id){
		$this->db->where('id', $id)->update('murajaah', array(
			'tanggal' => $this->input->post('tanggal'),
			'jumlah_halaman' => $this->input->post('jumlah-halaman')
		));
		redirect('murajaah/beranda');
	}
}

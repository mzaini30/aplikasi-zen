<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct(){
		parent::__construct();

		date_default_timezone_set('Asia/Makassar');

		$this->load->library('markdown');
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->tampilkan();
	}

	public function tampilkan(){
		$banyak_data = $this->db->get('blog')->num_rows();

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
		
		$setting_pagination['base_url'] = '/blog/tampilkan/';
		$setting_pagination['total_rows'] = $banyak_data;
		$setting_pagination['per_page'] = 10;

		$this->pagination->initialize($setting_pagination);

		$batas = $setting_pagination['per_page'];
		$dari = $this->uri->segment(3);

		$data = $this->db->order_by('id', 'desc')->join('kategori_blog', 'kategori_blog.id = blog.kategori_blog_id')->select('blog.*, kategori_blog.kategori')->get('blog', $batas, $dari)->result();
		$this->load->view('layout/blog', array(
			'data' => $data,
			'isi' => 'blog/beranda'
		));
	}

	public function tambah(){
		$kategori = $this->db->order_by('kategori')->get('kategori_blog')->result();
		$this->load->view('layout/kosongan', array(
			'isi' => 'blog/tambah-baru',
			'data' => '',
			'kategori' => $kategori
		));
	}

	public function tambah_upload(){
		$this->db->insert('blog', array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'kategori_blog_id' => $this->input->post('kategori-blog-id'),
			'created_at' => date('d - M - Y h:i:s'),
			'updated_at' => date('d - M - Y h:i:s')
		));
		redirect('blog/tampilkan');
	}

	public function hapus($id){
		$this->db->delete('blog', array(
			'id' => $id
		));
		redirect('blog/tampilkan');
	}

	public function edit($id){
		$data = $this->db->where(array(
			'id' => $id
		))->get('blog')->result();
		$kategori = $this->db->order_by('kategori')->get('kategori_blog')->result();
		$this->load->view('layout/kosongan', array(
			'isi' => 'blog/edit',
			'data' => $data,
			'kategori' => $kategori
		));
	}

	public function edit_upload($id){
		$this->db->where('id', $id)->update('blog', array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'kategori_blog_id' => $this->input->post('kategori-blog-id'),
			'updated_at' => date('d - M - Y h:i:s')	
		));
		redirect('blog/full/' . $id);
	}

	public function full($id){
		$data = $this->db->where(array(
			'blog.id' => $id
		))->join('kategori_blog', 'kategori_blog.id = blog.kategori_blog_id')->select('blog.*, kategori_blog.kategori')->get('blog')->result();
		$this->load->view('layout/blog', array(
			'isi' => 'blog/full', 
			'data' => $data
		));
	}

	public function cari(){
		$cari = $this->input->get('cari');
		$list_hasil = $this->db->query('select * from blog where isi like "%' . $cari . '%" or judul like "%' . $cari . '%" order by id desc');
		$hasil = $list_hasil->result();
		$jumlah = $list_hasil->num_rows();
		$this->load->view('layout/blog', array(
			'isi' => 'blog/hasil-cari',
			'data' => $hasil,
			'jumlah' => $jumlah,
			'cari' => $cari
		));
	}

	public function kategori($id){
		$data = $this->db->order_by('id', 'desc')->where('kategori_blog_id', $id)->get('blog')->result();

		$this->load->view('layout/blog', array(
			'isi' => 'blog/kategori',
			'data' => $data
		));
	}

	public function tambahkan_kategori(){
		$this->db->insert('kategori_blog', array(
			'kategori' => $this->input->post('kategori')
		));
		redirect('blog/tampilkan');
	}

	public function hapus_kategori($id){
		$this->db->delete('kategori_blog', array(
			'id' => $id
		));
		redirect('blog/tampilkan');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('MY');
		$this->load->model('model_crud');
		$this->load->model('kategori_model');
	}

	public function index() 
	{
		$data['kategori'] = $this->kategori_model->get_all_categories();
		$this->load->view('kategori/read', $data);
	}

	public function create() 
	{
		// $this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'nama',
			'Nama Kategori',
			'required|is_unique[kategori.nama]',
			array(
				'required' => 'Silahkan isi %s terlebih dahulu.',
				'is_unique' => 'Judul <strong>' . $this->input->post('nama') . '</strong> sudah ada.'
			));
				$this->form_validation->set_rules(
			'deskripsi',
			'Deskripsi',
			'required|is_unique[kategori.deskripsi]',
			array(
				'required' => 'Silahkan isi %s terlebih dahulu.',
				'is_unique' => 'Judul <strong>' . $this->input->post('deskripsi') . '</strong> sudah ada.'
			));



		if($this->form_validation->run() === FALSE){
			$this->load->view('kategori/tambah');
		} else {
			$this->kategori_model->create_category();
			redirect('kategori');
		

	    }
	}

	public function artikel($id) 
	{
		$data['page_title'] = $this->Kategori_model->get_category_by_id($id)->nama;
		$data['artikel'] = $this->artikel->get_artikel_by_category($id);
		$this->load->view('blog/blog', $data);
	}

	public function edit($id = NULL)
	{

		// $data['page_title'] = 'Edit Kategori';
		$data['kategori'] = $this->Kategori_model->get_category_by_id($id);
	
		if ( empty($id) || !$data['kategori'] ) redirect('kategori');

	    // $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required',
			array('required' => 'Silahkan isi %s terlebih dahulu.'));
	    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('kategori/edit', $data);
	    } else {

	    	$post_data = array(
	    	    'nama' => $this->input->post('nama'),
	    	    'deskripsi' => $this->input->post('deskripsi'),
	    	);

	        if ($this->Kategori_model->update_category($post_data, $id)) {
	        	redirect('kategori');
		        // $this->load->view('kategori/read', $data);
	        // } else {
		       //  $this->load->view('blog/blog_failed', $data);
	        }
	    }
	}


	public function delete($id)
	{
		$this->Kategori_model->delete_category($id);
		$this->load->view('blog/blog_success');
	} 
}

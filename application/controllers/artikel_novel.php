<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_novel extends CI_Controller {
			function __construct()
	{
		parent::__construct();
		// $this->load->helper('MY');
		$this->load->model('model_crud');
		$this->load->model('kategori_model');

	}

	public function index()
	{
		$this->load->model('model_crud');

		$data['result'] = $this->model_crud->GetArtikel();

		$this->load->view('index', $data);
		
	}

	public function cb()
	{
		$this->load->view('rev');
	}
	
	public function do_preview($id=''){
		$limit_per_page = 6;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->model_crud->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["model_crud"] = $this->model_crud->GetPreview($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
				
			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}

		// $this->load->model('model_crud');

		// $data['res'] = $this->model_crud->GetPreview($id);
		$this->load->view('rev', $data);
	}
//insert
	public function add_data(){	
		$this->load->view('form_add');
	}

	public function do_insert(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['result'] = $this->kategori_model->generate_cat_dropdown();

		$this->form_validation->set_rules('judul_novel', 'Judul Novel', 'required|is_unique[novel.judul_novel]',
   			array(
		       'required'      => 'Judul Novel Kosong, silahkan isi terlebih dahulu',
		       'is_unique'     => 'Judul' .$this->input->post('judul_novel'). ' sudah ada.'
		  	));
		$this->form_validation->set_rules('genre', 'Genre', 'required',
   			array(
		       'required'      => 'Genre Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required',
   			array(
		       'required'      => 'Tahun Terbit Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('penulis', 'penulis', 'required',
   			array(
		       'required'      => 'Penulis Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required',
   			array(
		       'required'      => 'Sinopsis Kosong, silahkan isi terlebih dahulu'
		 	));

		if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->model('model_crud');

			$data['result'] = $this->model_crud->GetArtikel();

			$this->load->view('index', $data);
	        //$this->load->view('index');
	    } else {

		$config['upload_path']          = 'images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

               print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $judul_novel	= $_POST['judul_novel'];
			$genre 			= $_POST['genre'];
			$thn_terbit 	= $_POST['thn_terbit'];
			$penulis		= $_POST['penulis'];
			$sinopsis		= $_POST['sinopsis'];
			$img			= $this->upload->data('file_name');
			
			$data_insert	= array(
									'judul_novel' 	=> $judul_novel,
									'genre'		=> $genre,
									'thn_terbit'=> $thn_terbit,
									'penulis' 	=> $penulis,
									'sinopsis' 	=> $sinopsis,
									'img'		=> $img
								);

			$this->load->model('model_crud');
			$res = $this->model_crud->InsertData('novel', $data_insert);
			
			if($res>=1){
				$this->session->set_flashdata('pesan','Tambah Data Sukses');
				redirect('artikel_novel/index');
			}else{
				echo "<h2>Insert Data Gagal</h2>";	
			}
        }
	}
}

	public function edit_data($id='',$img=''){
		$this->load->model('model_crud');
		$novel = $this->model_crud->getedit($id);
		$data = array(
			"id" 			=> $novel[0]['id'],
			"judul_novel" 	=> $novel[0]['judul_novel'],
			"genre"			=> $novel[0]['genre'],
			"thn_terbit"	=> $novel[0]['thn_terbit'],
			"penulis" 		=> $novel[0]['penulis'],
			"sinopsis"		=> $novel[0]['sinopsis'],
			"img"			=> $novel[0]['img']
		);
		$this->load->view('form_edit',$data);
	}

	public function do_update($id=''){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul_novel', 'Judul Novel', 'required|is_unique[novel.judul_novel]',
   			array(
		       'required'      => 'Judul Novel Kosong, silahkan isi terlebih dahulu',
		       'is_unique'     => 'Judul' .$this->input->post('judul_novel'). ' sudah ada.'
		  	));
		$this->form_validation->set_rules('genre', 'Genre', 'required',
   			array(
		       'required'      => 'Genre Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('thn_terbit', 'Tahun Terbit', 'required',
   			array(
		       'required'      => 'Tahun Terbit Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('penulis', 'penulis', 'required',
   			array(
		       'required'      => 'Penulis Kosong, silahkan isi terlebih dahulu'
		 	));
		$this->form_validation->set_rules('sinopsis', 'Sinopsis', 'required',
   			array(
		       'required'      => 'Sinopsis Kosong, silahkan isi terlebih dahulu'
		 	));

		if ($this->form_validation->run() === FALSE)
	    {
	    	
	        $this->load->view('form_edit');
	    } else {

		$config['upload_path']          = 'images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

               print_r($error);
        }
        else
        {
			$result_upload=$this->upload->data();
				
			$id 			= $_POST['id'];
			$judul_novel 	= $_POST['judul_novel'];
			$genre			= $_POST['genre'];
			$thn_terbit 	= $_POST['thn_terbit'];
			$penulis		= $_POST['penulis'];
			$sinopsis		= $_POST['sinopsis'];
			$img			= $result_upload['file_name']; 


			$data_update 	= array(
				'judul_novel' 		=> $judul_novel,
				'genre' 			=> $genre,
				'thn_terbit' 		=> $thn_terbit,
				'penulis' 			=> $penulis,
				'sinopsis' 			=> $sinopsis,
				'img'				=> $img);
			$this->load->model('model_crud');
			$where = array('id' => $id);
			$res = $this->model_crud->UpdateData('novel',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('artikel_novel/');
			}
		}
	}
}

	public function do_delete($id){
		$this->load->model('model_crud');
		$where 	= array('id' => $id);
		$res 	= $this->model_crud->DeleteData('novel',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('artikel_novel/');
			}

	}
}

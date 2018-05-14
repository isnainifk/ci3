<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	public function index(){
		$this->load->model('novel');

		$data['result'] = $this->novel->GetArtikel();

		$this->load->view('DataTable', $data);
	} 

	public function do_preview($id=''){
		$this->load->model('novel');

		$data['result'] = $this->novel->GetPreview($id);

		// echo "<pre>";
		// print_r($data);die();

		$this->load->view('DataTable', $data);

	}

	public function add_data(){
		$this->load->view('formAdd');

	}

	public function do_insert(){
			public function do_insert(){
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
            
			$judul_novel 	= $_POST['judul_novel'];
			$genre			= $_POST['genre'];
			$thn_terbit		= $_POST['thn_terbit'];
			$penulis		= $_POST['penulis'];
			$jenis_cat		= $_POST['jenis_cat'];
			$sinopsis		= $_POST['sinopsis'];
			$img			= $this->upload->data('file_name');

			$data_insert	= array(
									
									'judul_novel' 	=> $judul_novel,
									'genre'			=> $genre,
									'thn_terbit'	=> $thn_terbit,
									'penulis'		=> $penulis,
									'jenis_cat'		=> $jenis_cat,
									'sinopsis'		=> $sinopsis,
									'img'			=> $img
								);

			$this->load->model('tablenovel_model');
			$res = $this->tablenovel_model->InsertData('novel', $data_insert);
			
			if($res>=1){
				$this->session->set_flashdata('pesan','Tambah Data Sukses');
				redirect('data');
			}else{
				echo "<h2>Insert Data Gagal</h2>";	
			}
        }
	}
	
	public function edit_data($id=''){
		$this->load->model('tablenovel_model');
		$artikel = $this->tablenovel_model->getedit($id);
		$data = array(
			"id" 			=> $artikel[0]['id'],
			"judul_novel"	=> $artikel[0]['judul_novel'],
			"genre"			=> $artikel[0]['genre'],
			"thn_terbit"	=> $artikel[0]['thn_terbit'],
			"jenis_cat"		=> $artikel[0]['jenis_cat'],
			"sinopsis"		=> $artikel[0]['sinopsis'],
			"img"			=> $artikel[0]['img']
			
		);
		$this->load->view('formEdit',$data);
	}

	public function do_update(){
			$config['upload_path']          = 'images/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 2000;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 1000;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('userfile'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	               print_r($error);
	        }
	        else
	        {
			$result_upload=$this->upload->data();

			$judul_novel 	= $_POST['judul_novel'];
			$genre			= $_POST['genre'];
			$thn_terbit		= $_POST['thn_terbit'];
			$penulis		= $_POST['penulis'];
			$jenis_cat		= $_POST['jenis_cat'];
			$sinopsis		= $_POST['sinopsis'];
			$img			= $_POST['img'];
			
			$data_update	= array(
									'judul_novel' 	=> $judul_novel,
									'genre' 		=> $genre,
									'thn_terbit' 	=> $thn_terbit,
									'penulis' 		=> $judul_novel,
									'jenis_cat' 	=> $jenis_cat,
									'sinopsis'		=> $sinopsis,
									'img'			=> $img);

			$this->load->model('tablenovel_model');
			$where = array('id' => $id);
			$res = $this->tablenovel_model->UpdateData('novel',$data_update,$where);
			if($res>=1){
				$this->session->set_flashdata('pesan','Update Data Sukses');
				redirect('data');
			}
		
	}

	public function do_delete($id){
		$this->load->model('tablenovel_model');
		$where 	= array('id' => $id);
		$res 	= $this->tablenovel_model->DeleteData('novel',$where);
		if($res>=1){
			$this->session->set_flashdata('pesan','Delete Data Sukses');
			redirect('data');
			}
	}
}
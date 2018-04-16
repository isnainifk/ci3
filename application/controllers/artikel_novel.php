<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_novel extends CI_Controller {

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
		$this->load->model('model_crud');

		$data['res'] = $this->model_crud->GetPreview($id);
		$this->load->view('rev', $data);
	}

	public function add_data(){	
		$this->load->view('form_add');
	}

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

	public function do_update(){
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

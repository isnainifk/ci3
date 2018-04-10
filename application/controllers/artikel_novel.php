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

		// echo "<pre>";
		// print_r($data);die();

		$this->load->view('rev', $data);
	}

}

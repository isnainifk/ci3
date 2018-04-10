<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {
	
	public function GetArtikel(){
		
		$this->db->select('id,judul_novel,genre,thn_terbit,penulis,sinopsis,img');
		$this->db->from('novel');
		$data=$this->db->get();
	
		return $data->result_array();
	}
	public function GetPreview($id=''){
		$res = $this->db->query('SELECT id,judul_novel,genre,thn_terbit,penulis,sinopsis,img FROM novel where id = '.$id);
		return $res->result_array();
	}

	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
		}
}
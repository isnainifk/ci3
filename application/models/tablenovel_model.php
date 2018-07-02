<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tablenovel_model extends CI_Model {
	
	public function GetArtikel(){
		
		$this->db->select('id,judul_novel,genre,thn_terbit,penulis,jenis_cat,sinopsis,img');
		$this->db->from('novel');
		$data=$this->db->get();
	
		return $data->result_array();
	}
	public function GetPreview($id=''){
		$isi = $this->db->query('SELECT judul_novel,genre,thn_terbit,penulis,jenis_cat,sinopsis,img FROM novel where id = '.$id);
		return $isi->result_array();
	}

	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
		}

	public function DeleteData($tabelNama,$where){
		$res = $this->db->delete($tabelNama,$where);
		return $res;
		}

	public function getedit($id=''){
		$data = $this->db->query('SELECT judul_novel,genre,thn_terbit,penulis,jenis_cat,sinopsis,img FROM novel where id  = '.$id);
		return $data->result_array();
	}

	public function UpdateData($tabelNama,$data,$where){
		$res = $this->db->update($tabelNama,$data,$where);
		return $res;
		}
}
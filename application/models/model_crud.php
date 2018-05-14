<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {
	function __construct()
    {
    	parent::__construct();
    }

// tampil home
	public function GetArtikel($limit = FALSE, $offset = FALSE){
		
		
		if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
        
        $this->db->order_by('novel.id', 'DESC');

		$this->db->select('id,nama,judul_novel,genre,thn_terbit,penulis,sinopsis,img');

		$this->db->join('kategori', 'kategori.id_cat = novel.jenis_cat');

		$this->db->from('novel');
		$data=$this->db->get();
	
		return $data->result_array();

		// $this->db->join('kategori', 'kategori.id_cat = novel.jenis_cat');
		// $query = $this->db->get('novel');
		// return $query->result();
	}

	//tampil detail lek di klik
	public function GetPreview($id=''){
		

		$res = $this->db->query('SELECT id,judul_novel,genre,thn_terbit,penulis,sinopsis,img FROM novel where id = '.$id);
		return $res->result_array();
	}

	public function get_total() 
    {
        // Dapatkan jumlah total artikel
        return $this->db->count_all("blog");
    }


//create
	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
		}

// DELETE
		public function DeleteData($tabelNama,$where){
		$res = $this->db->delete($tabelNama,$where);
		return $res;
		}

// UPDATE
	public function getedit($id=''){
		$data = $this->db->query('SELECT id,judul_novel,genre,thn_terbit,penulis,sinopsis,img FROM novel where id = '.$id);
		return $data->result_array();
	}


	public function UpdateData($tabelNama,$data,$where){
		$res = $this->db->update($tabelNama,$data,$where);
		return $res;
	}
}
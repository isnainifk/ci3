<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        $this->db->order_by('nama');

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function create_category()
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'deskripsi'   => $this->input->post('deskripsi')
        );

        return $this->db->insert('kategori', $data);
    }

    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('kategori', array('id_cat' => $id));
        return $query->row();
    }

    public function update_category($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'kategori', $data, array('id_cat'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete_category($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('kategori', array('id_cat'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    public function generate_cat_dropdown()
    {
        $this->db->select ('
            kategori.id_cat,
            kategori.nama
        ');

        $this->db->order_by('nama');

        $result = $this->db->get('kategori');
        
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                
                $dropdown[$row['id_cat']] = $row['nama'];
            }
        }

        return $dropdown;
    }
}

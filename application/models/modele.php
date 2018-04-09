<?php
/**
*  
*/
class Modele extends CI_Model
{
	public function getInformation(){
		$data=array(
				'name'=>array('firstname'=> "Isnaini",'lastname' => "Faridatul Khasanah"),
				'address'=>"Jl. Gadang Gg VIII/8",
				'email'=>"isnainifk13@gmail.com"
			);
		return $data;
	}
}
?>
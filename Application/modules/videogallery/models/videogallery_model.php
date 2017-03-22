<?php
class Videogallery_model extends CI_Model
{
	function __construct() {
parent::__construct();
}

function get_table() {
$table = "videos";
return $table;
}

function count_all($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}


function get_all($perPage,$uri,$id) {
$table = $this->get_table();
	$getData = $this->db->where('groupId',$id)
		     ->order_by('id','DESC')		
		 	 ->get($table, $perPage, $uri);
		
		if($getData->num_rows() > 0)
			return $getData->result();
		else
			return null;
	}

	}
?>
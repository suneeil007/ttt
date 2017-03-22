<?php
class Blog_model extends CI_Model
{
	function __construct() {
parent::__construct();
}

function get_table() {
$table = "blog";
return $table;
}

function get_all() {
$table = $this->get_table();
	$getData = $this->db->order_by('id','ASC')		
		 	 ->get($table);

			return $getData->result();
	}

    function get_LatestBlog(){

	$table = $this->get_table();
    $query =  $this->db 						
					 
					  ->limit(2)
      			      ->get($table) ;
	return $query->result() ;
  }	 

}


?>
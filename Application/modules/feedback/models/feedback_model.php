<?php
class Feedback_model extends CI_Model
{
	function __construct() {
parent::__construct();
}

function get_table() {
$table = "feedbacks";
return $table;
}

function get_all() {
$table = $this->get_table();
	$getData = $this->db->order_by('id','DESC')		
		 	 ->get($table);

			return $getData->result();
	}
}
?>
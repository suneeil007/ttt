<?php
class Testimonial_model extends CI_Model
{
	function __construct() {
parent::__construct();
}

function get_table() {
$table = "testimonials";
return $table;
}

function get_all($perPage,$uri) {
$table = $this->get_table();
	$getData = $this->db->where('status', 1)
					    ->order_by('id','DESC')		
		 	            ->get($table, $perPage, $uri);
		
		if($getData->num_rows() > 0)
			return $getData->result();
		else
			return null;
	}


	
	function count_tests(){
		$table = $this->get_table();
		$getData = $this->db->where('status', 1)
							->get($table);
		
		$num_rows = $getData->num_rows();
		return $num_rows;
		
	}
	
	function get_All_tests(){

	$table = $this->get_table();
    $getData =  $this->db->order_by('id','desc')
      			      ->get($table) ;

			return $getData->result();
  }	
  
    function publish_unpublish($tid){
  		$table = $this->get_table();

		$row = $this->general_db_model->getById( $table, 'id', $tid) ;
 		
		if($row->status == 1)
			$stat = 0;
		else
			$stat = 1;
			
		$result = $this->db->where('id', $tid)
		 			       ->update($table, array("status"=>$stat));							   
  }	

    function get_LatestTests(){

	$table = $this->get_table();
    $query =  $this->db ->where('status', 1)						
					  ->order_by('id','desc')
					  ->limit(1)
      			      ->get($table) ;
	return $query->result() ;
  }	 
	
}
?>
<?php
class General_Db_Model extends CI_Model
{ 
	function __construct()
	{ 
		parent::__construct();
	}
	  
	function update( $table, $array ,$where)
	{ 
		$this->db->where($where);
		return  $this->db->update($table, $array);
	}

	function insert( $table, $array, $url=NULL  )
	{ 
		$this->db->set( $array );
		$this->db->insert($table);
		//die(print_r($array)); 
		
		if ($url)
		{ 
			$this->session->set_flashdata('statusMsg','User SuccessFully Updated');
			redirect($url); 
			exit; 
		} 
		return $this->db->insert_id(); 
	}

	function getById( $table, $fieldId, $id, $select='*') 
	{ 
		$this->db->select($select);
		$this->db->where( $fieldId ." = '". $id ."'" ); 
		$query = $this->db->get( $table ); 
		return $query->row(); 
	}

	function getAll( $table, $orderBy=NULL, $where=NULL, $select=NULL, $group_by=NULL)
	{ 
		if($select)
		 {
		   $this->db->select($select);
		 }
		
		if($where)
			$this->db->where($where);
		if ($orderBy)
			$this->db->order_by($orderBy);
		
		if($group_by)
		  $this->db->group_by($group_by);
		$query = $this->db->get( $table ); 
		
		return $query->result(); 
	}  
	 
	function get_with_limit( $table , $num, $offset ,$orderBy = NULL,$search=NULL) 
	{
		if($search)
		 $this->db->where($search);
		if ($orderBy)
		 $this->db->order_by($orderBy);
		$query = $this->db->get( $table, $num, $offset );
		//print_r($this->db->last_query());
		return $query;
		
	}
	
        function row_exist($table, $where){
            if($where)
                $this->db->where($where);
            
            $this->db->from($table);
            if($this->db->count_all_results() > 0)
                return true;
            else
                return false;
        }
        
	function countTotal($table, $where=NULL)
	{
		if($where)
			$this->db->where($where);
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	function getLast($table)
	{
		$query = $this->db->get($table);
		return $query->row();
	}   
	
	function delete($table,$where)
	{
	  $this->db->where($where);
	  $this->db->delete($table);
	}
	
	function get_attribute($table,$attribute,$where) 
	{ 
		$this->db->select($attribute);
		$this->db->where($where);
		$query = $this->db->get( $table ); 
		if ($query->num_rows() == 1 ) 
			return $query->row(); 
		else if ($query->num_rows() > 1 ) 
			return $query->result(); 
	}
	
	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

	
	function get_ByTbl_Col($table ,$col, $id){
		$this->db->select('*');
		$this->db->where( $col ." = '". $id ."'" ); 
		$query = $this->db->get($table); 
		return $query->result(); 
	}
	
} 
 
?>
<?php
class Categories {

    private $ci;            // para CodeIgniter Super Global Referencias o variables globales --defaults --	
	private $id_menu        = 'class="menu"';
    private $class_menu     = 'class="menu"';
	private $act 	;
	
    function __construct(){
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }
   
   //for creating menu
	function build__category_menu(){
     
	 	$query = $this->ci->db->query("SELECT * FROM categories where parent_id = 0 ORDER BY categories.order ASC"); 
		
		$html_out  = '<div '.$this->id_menu.' '.$this->class_menu.'>';
       // $html_out  = '<div id="id_menu" class="class_menu">'; 
		$html_out .= '<ul class="menu">';


      foreach ($query->result() as $row){
		$id = $row->id;               
		$name = strtolower($row->name);
		$parent_id = $row->parent_id;
		$description = $row->description;
		$order = $row->order;
		   {
			 if($row->id == $this->ci->uri->segment(3) && $this->ci->uri->segment(1) == 'products'){
					 $this->act =  array('id'=>'active-cat') ;
			   }else{
					 $this->act =  '' ;
			   }
				$html_out .= '<li>'.anchor('tours/'.decode_title($name).'/'.$id, $name, $this->act);	
		   }
		   $html_out .= $this->get_childs($id);      
		}
		          
	    $html_out .= '</li></ul></div>';
    
        return $html_out;
    }  



	//for creating sub menus
    function get_childs($id){ 
		$has_subcats = FALSE;

        $html_out  = '';
        $html_out .= '<ul class="menu">';

	    $query = $this->ci->db->query("SELECT * FROM categories WHERE parent_id = $id ORDER BY categories.order ASC ");
		
		 foreach ($query->result() as $row){
                $id = $row->id;               
                $name = strtolower($row->name);
                $parent_id = $row->parent_id;
                $description = $row->description;
                $order = $row->order;
			
			    $has_subcats = TRUE;
				
			 if($row->id == $this->ci->uri->segment(3)&& $this->ci->uri->segment(1) == 'products'){
				 $this->act =  array('id'=>'active-sub-cat') ;
			   }else{
					 $this->act =  '' ;
			   }
				
		  $html_out .= '<li>'.anchor('tours/'.decode_title($name).'/'.$id, $name , $this->act);               
          $html_out .= $this->get_childs($id); 
		}
				
		$html_out .= '</li></ul>';

        return ($has_subcats) ? $html_out : FALSE;
	
    	}

          
     function get_childs1($id){ 
		$has_subcats = FALSE;

        $html_out  = '';
        $html_out .= '<ul class="menu">';

	    $query = $this->ci->db->query("SELECT * FROM categories WHERE parent_id = $id ORDER BY categories.order ASC ");
		
		 foreach ($query->result() as $row){
                $id = $row->id;               
                $name = $row->name;
                $parent_id = $row->parent_id;
                $description = $row->description;
                $order = $row->order;
			
			    $has_subcats = TRUE;
				
			 if($row->id == $this->ci->uri->segment(3)&& $this->ci->uri->segment(1) == 'products'){
				 $this->act =  array('id'=>'active-sub-cat') ;
			   }else{
					 $this->act =  '' ;
			   }
				
		  $html_out .= '<li>'.anchor('tours/'.decode_title($name).'/'.$id, $name , $this->act);               
          $html_out .= $this->get_childs($id); 
		}
				
		$html_out .= '</li></ul>';

        return ($has_subcats) ? $html_out : FALSE;
	
    	}



	}


	


// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  
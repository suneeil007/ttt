<?php
/*
 * Dynmic_menu.php
 */
class Dynamic_menu {

    private $ci;            // para CodeIgniter Super Global Referencias o variables globales --defaults --
/*    private $id_menu        = 'id="menu"';
    private $class_menu        = 'class="menu"';
    private $class_parent    = 'class="parent"';
    private $class_last        = 'class="last"'; */
	
	private $id_menu        = '';
    private $class_menu     = '';
    private $class_parent   = 'class="parent"';
    private $class_last     = 'class="last"'; 
	
    // --------------------------------------------------------------------
    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }
    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return   string    $html_out using CodeIgniter achor tags.
     */
   
	function build_menu($type)
    {
        $menu = array();

	 $query = $this->ci->db->query("select * from cms_groups where cms_grouptype_id= $type AND publish = 'yes' ORDER BY weight ASC"); 

        // now we will build the dynamic menus.
		
//        $html_out  = "\t".'<div '.$this->id_menu.'>'."\n";

        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */
		 $html_out = '';
        switch ($type)
        {
            case 0:            // 0 = top menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            case 1:            // 1 = horizontal menu
				$this->id_menu = 'id="templatemo_menu"';
				$this->class_menu = 'class="ddsmoothmenu"';
				
		        $html_out  = "\t".'<div '.$this->id_menu.' '.$this->class_menu.'>'."\n";
                $html_out .= "\t\t".'<ul>'."\n";
                break;

            case 2:            // 2 = sidebar menu
				$this->id_menu = 'id="vMenu"';
				$this->class_menu = 'class="vMenu"';
				
		        $html_out  = "\t".'<div ' .$this->id_menu.'>'."\n";
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            case 3:            // 3 = footer menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";
                break;

            default:        // default = horizontal menu
                $html_out .= "\t\t".'<ul '.$this->class_menu.'>'."\n";

                break;
        }


      foreach ($query->result() as $row)
            {
                $id = $row->id;
                $title = $row->title;
                $link_type = $row->link_type;
                $contents = $row->contents;
                $shortcontents = $row->shortcontents;
                $cms_grouptype_id = $row->cms_grouptype_id;
                $weight = $row->weight;
                $photo = $row->photo;
                $parent_id = $row->parent_id;
                $is_parent = $row->is_parent;
                $publish = $row->publish;
				$onDate = $row->onDate;
	          {
		if ($publish == 'yes' && $parent_id == 0)   // are we allowed to see this menu?
		{
					
		if($row->id == $this->ci->uri->segment(3)){
			$myClass = array('id' => 'active-sub-cat');
		}else{
			$myClass = '' ; 	
		}
		 
		 $html_out .= "\t\t\t".'<li>'.anchor('pages/'.decode_title($title).'/'.$id, $title , $myClass);		          
	   }
          
 	 }
		   $html_out .= $this->get_childs($id);      
          // print_r($id);		   
		}
		 // loop through and build all the child submenus.
                  
	    $html_out .= '</li>'."\n";
        $html_out .= "\t\t".'</ul>' . "\n";
        $html_out .= "\t".'</div>' . "\n";

        return $html_out;
    }  
	 /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $id
     * @param    string    $id usuario
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($id) 
    { 
		$has_subcats = FALSE;

        $html_out  = '';
   //     $html_out .= "\n\t\t\t\t".'<div>'."\n";
        $html_out .= "\t\t\t\t\t".'<ul>'."\n";

	    $query = $this->ci->db->query("select * from cms_groups where parent_id = $id AND publish = 'yes' ORDER BY weight ASC");
		
		 foreach ($query->result() as $row)
            {
                $id = $row->id;
                $title = $row->title;
                $link_type = $row->link_type;
                $contents = $row->contents;
                $shortcontents = $row->shortcontents;
                $cms_grouptype_id = $row->cms_grouptype_id;
                $weight = $row->weight;
                $photo = $row->photo;
                $parent_id = $row->parent_id;
                $is_parent = $row->is_parent;
                $publish = $row->publish;
				$onDate = $row->onDate;
			
			    $has_subcats = TRUE;
				
			$myClass = '' ; 			
			if($row->id== $this->ci->uri->segment(3)){
				$myClass = array('id' => 'active-sub-cat');
			}else{
			$myClass = '' ; 	
		}
		
   $html_out .= "\t\t\t\t\t\t".'<li>'.anchor('pages/'.decode_title($title).'/'.$id, $title, $myClass);
                // Recurse call to get more child submenus.
                   $html_out .= $this->get_childs($id); 
		}		
	  $html_out .= '</li>' . "\n";
	  $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
    //  $html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
	
    }
	
	function getAll(){
		 $query = $this->ci->db->query("select * from cms_grouptypes ORDER BY id ASC"); 		 
		 return $query->result()  ;
	} 
}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  
<?php  
class Packages_model extends MX_Controller {

	function __construct()
	{
		parent::__construct();	
		
	}
	
	function get_table() {
		$table = "products";
		return $table;
	}

	function _insert($data){
	$table = $this->get_table();
	$this->db->insert($table, $data);
	}
		
		
	function get_all($perPage, $uri, $id) {
	$table = $this->get_table();
	$getData = $this->db->where('cat_id',$id)
		     			->order_by('order','ASC')		
		 	 			->get($table, $perPage, $uri);
		
		if($getData->num_rows() > 0)
			return $getData->result();
		else
			return null;
	}
	
	
	function search(){
	
	$strSearch 					= $this->input->post("keyword", TRUE); 
		
	$xQuery 					= '' ;	
	//if the title field is empty or not 
	if(count($strSearch)>0){
		$arry = explode(" ", $strSearch);
		
	// append the search tags in or condition
	 foreach($arry as $item){		
		$xQuery .= " or model like '%$item%' or  name like '%$item%'";		
		}
	}
	
	
	$query = $this->general_db_model->_custom_query('SELECT * FROM products where model like "'.$strSearch.'" OR  name like "'.$strSearch.'"'.$xQuery.' ORDER BY products.viewed DESC') ;
	//		echo $this->db->last_query(); die();
	
	if($strSearch != ''){		
			return $query->result(); 		
		}else{
			return ;
		}	
	}
	
	function first_subCategory_products($perPage, $uri, $parent_cat_id){
		$query  =	$this->general_db_model->_custom_query('SELECT p.* FROM products  AS p INNER JOIN (SELECT c.id FROM categories AS c WHERE c.parent_id = '.$parent_cat_id.' ORDER BY c.order ASC LIMIT 1) subq ON subq.id = p.cat_id ORDER BY p.order  LIMIT '.$uri.', '.$perPage) ;
	
		return $query->result();	
	}
	
	function price_status($id){
		$table = $this->get_table();
		$row = $this->general_db_model->getById($table, 'id', $id) ;
		
		if($row->hide_price == 'yes')
			$stat = 'no';
		else
			$stat = 'yes';
			
		$result = $this->db->where('id', $id)
		 			       ->update($table, array("hide_price"=>$stat));							   
  } 
  
  function delete_product_variety($id) {	
		$row = $this->general_db_model->getById( 'product_veriety', 'id', $id);

		if($row && !empty($row->image)){						
			unlink(VERITIES_DIR.'/'.$row->image) ;		
		}
		if($row){		
			$this->general_db_model->delete('product_veriety', 'id = '.$id);			
		}
	}
	
	function delete_product_color($id) {	
		$row = $this->general_db_model->getById( 'product_color', 'id', $id);
		
		if($row && !empty($row->image)){						
			unlink(COLORS_DIR.'/'.$row->image) ;		
		}
		if($row){
			$this->general_db_model->delete('product_color', 'id = '.$id);			
		}
	}

	function update_visit_count($product_id){
		
		$this->db->query('UPDATE products SET viewed = (viewed + 1) WHERE id ='. $product_id);		
	}	
	
	function get_popular_products(){
		$query  =	$this->general_db_model->_custom_query('SELECT * FROM products ORDER BY viewed DESC LIMIT 6');
			
		return $query->result();
	}
	
	function get_chosed_product($choice, $limit = NULL){
		$howmany  = '';
		
		if($limit == 1){
			$howmany = ' LIMIT 1';
		}
	
		$query  =	$this->general_db_model->_custom_query('SELECT categories.name AS cat_name, products.name, products.id, products.model, categories.id AS cat_id, products.currency, products.price, products.hide_price,products.image FROM product_choice_type JOIN products ON products.id = product_choice_type.product_id LEFT JOIN categories ON categories.id =  products.cat_id WHERE product_type = "'.$choice.'" 	ORDER BY product_choice_type.id DESC '.$howmany);
		
		if($limit ==1){	
			return $query->row();
		}else{
			return $query->result();
		}
	} 

	function get_all_chosed_product($choice, $perpage , $offset){

		$limit  = ' LIMIT '.$offset.','.$perpage ;

		$query  =	$this->general_db_model->_custom_query('SELECT categories.name AS cat_name, products.name, products.id, products.model, categories.id AS cat_id, products.currency, products.price, products.hide_price,products.image FROM product_choice_type JOIN products ON products.id = product_choice_type.product_id LEFT JOIN categories ON categories.id =  products.cat_id WHERE product_type = "'.$choice.'" 	ORDER BY product_choice_type.id DESC '.$limit);
		
			return $query->result();		
	}

  function look_up_id($slug){

          $query  =	$this->general_db_model->_custom_query('SELECT slug FROM products');

          return $query->result();
   }
    
}
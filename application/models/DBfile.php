<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBfile extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
    
    public function get_data( $table_name, $where = array(), $field = '*', $order = array() , $limit = ""){
        $this->db->select( $field );
		$this->db->from( $table_name );
		if( !empty($where) ){
			$this->db->where( $where );
		}
		if(!empty($order)){
			foreach($order as $k=>$v){
				$this->db->order_by($k, $v);
			}
		}
		if( !empty($limit) )
			$this->db->limit($limit);

		$query = $this->db->get();
        return $query->result_array();   
    }
    
    public function put_data( $table_name, $what = array() ){
        $this->db->insert($table_name,$what);
		return $this->db->insert_id();
    }
    
    public function set_data( $table_name, $what = array() , $where = array()){
        $this->db->where($where);
		$this->db->update($table_name,$what);
    }
	
	public function delete_data( $table_name, $what = array() ){
        $this->db->delete( $table_name, $what);
    }
	
	public function get_data_limit( $table_name, $where = array(), $field = '*', $limit = array(), $orderby = '', $order = '', $where_in = array()){
		$this->db->select( $field );
		$this->db->from( $table_name );
		if( !empty($where) ){
			$this->db->where( $where );
		}
		if( !empty($where_in) ){
			foreach($where_in as $k=>$v){
				$this->db->where_in( $k, $v );
			}
		}
		
		if($limit==1)
			$this->db->limit($limit);
		elseif(isset($limit[1]) && $limit[1] !== '' && $limit[0] !== ''){
			$this->db->limit($limit[1], $limit[0]);
		}
		
		if($orderby != '' && $order != ''){
			$this->db->order_by($orderby, $order);
		}
		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	public function search_Mediadata( $table_name, $where = array(), $like = '', $value = '', $pos = '' ){
		$this->db->select( '*' );
		$this->db->from( $table_name );
		if( !empty($where) ){
			$this->db->where( $where );
		}
		
		if(!empty($like)){
			if($pos == '')
				$this->db->like($like, $value);
			else
				$this->db->like($like, $value, $pos);
		}
		//$this->db->limit(24, 0);
		$this->db->order_by('id', 'desc');
		
		$query = $this->db->get();		
		return $query->result_array();
		
	}
	
	public function get_join_data( $table_name, $join_table, $on, $where = array(), $field = '*', $order = array(), $join = 'inner', $group = '' , $limit = ''){
		$this->db->select( $field );
		$this->db->from( $table_name );
		
		if(!empty($join_table) && !empty($on)){
			$this->db->join( $join_table, $on, $join );
		}
		
		if( !empty($where) ){
			$this->db->where( $where );
		}
		
		if(!empty($order)){
			foreach($order as $k=>$v){
				$this->db->order_by($k, $v);
			}
		}
		
		if( !empty($group) ){
			$this->db->group_by( $group ); 
		}

		if( !empty($limit) ){
			$this->db->limit($limit);
		}
		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	public function get_inornot_data( $table_name, $where = array(), $field = '*', $target, $where_in, $in , $limit = '',$orderby=''){
		$this->db->select( $field );
		$this->db->from( $table_name );
				
		if( !empty($where_in) ){
			if($in == 'yes'){
				$this->db->where_in( $target, $where_in );
			}else{
				$this->db->where_not_in( $target, $where_in );
			}
		}
		
		if( !empty($where) ){
			$this->db->where( $where );
		}

		if( !empty($limit) ){
			$this->db->limit($limit);
		}

		if( !empty($orderby) ){
			$this->db->order_by($orderby[0], $orderby[1]);
		}
		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	public function get_multijoin_data( $table_name, $join_table = array(), $where = array(), $field = '*', $join = 'left', $group = '' , $orderby = '' , $limit = '' ){
		$this->db->select( $field );
		$this->db->from( $table_name );
		
		if(!empty($join_table)){
			foreach($join_table as $table=>$on){
				$this->db->join( $table, $on, $join );
			}
		}
		
		if( !empty($where) ){
			$this->db->where( $where );
		}
		
		if( !empty($group) ){
			$this->db->group_by( $group ); 
		}
		
		if( !empty($limit) ){
			$this->db->limit($limit[0], $limit[1]);
		}
		
		if( !empty($orderby) ){
			$this->db->order_by($orderby[0], $orderby[1]);
		}
		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	public function get_like_data( $table_name, $where = array(), $like = array() , $field = '*', $group = '', $orderby = '' ) {
		$this->db->select( $field );
		$this->db->from( $table_name );
		if( !empty($where) ){
			$this->db->where( $where );
		}
		if( !empty($group) ){
			$this->db->group_by( $group ); 
		}
		if( !empty($like) ){
			$this->db->like($like[0], $like[1] );
		}
		if( !empty($orderby) ){
			$this->db->order_by($orderby[0], $orderby[1]);
		}
		$query = $this->db->get();
        return $query->result_array();
	}
	
	public function query( $query, $return = true ){
		$query = $this->db->query( $query );
		if($return){
			return $query->result_array();
		}
	}
	
}
?>
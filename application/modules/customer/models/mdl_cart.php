<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_cart extends CI_Model 
{

function __construct() 
{
	parent::__construct();
}

//All Table Name
function get_cart_table() 
{
	$table = "customer_cart";
	return $table;
}

function cartitem_insert($data) 
{
	$table = $this->get_cart_table();
	$this->db->insert($table, $data);
}

function get_cart_item_data($itemid)
{
	$this->db->where('id', $itemid);
	$query=$this->db->get('add_clothes');
	return $query;
}
function remove_item($del_id)
{
	$table = $this->get_cart_table();
	$this->db->where('id', $del_id);
	$this->db->delete($table);
}
}
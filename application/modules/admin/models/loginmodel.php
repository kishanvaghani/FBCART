<?php
defined('BASEPATH') OR exit('No direct script access allowed');

public function insert($array)
{
	return $this->db->insert('add_clothes',$array);
}
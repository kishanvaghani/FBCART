<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller 
{	 
	
	function index()
	{
		$data['clothes']=$this->db->get('add_clothes');
		$this->load->view('home',$data);
	}
	function home1()
	{
		$data['clothes']=$this->db->get('add_clothes');
		$this->load->view('home1',$data);
	}
	function cus_view()
	{
		$data['clothes']=$this->db->get('add_clothes');
		$this->load->view('cus_view',$data);
	}
	function cus_img_view()
	{
		$data['id']=$id=$this->input->get("id");
		$this->db->where("id",$id);
		$data['clothes']=$this->db->get('add_clothes');
		$this->load->view('cus_img_view',$data);
	}
}

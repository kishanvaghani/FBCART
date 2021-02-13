<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller 
{

	
	public function Seller_profile()
	{
		$seller_id = ($this->session->userdata['seller_logged_in']['seller_id']);
		$this->db->where("id",$seller_id);

		$data['seller']=$this->db->get('seller_data');
		$this->load->view('seller_profile',$data);
	}
	public function Update_detail()
	{
		$seller_id = ($this->session->userdata['seller_logged_in']['seller_id']);
		$submit= $this->input->post("submit");
		$sid=$this->input->get("id");

		if ($submit=="submit") 
		{
        $this->load->library("form_validation");
		$this->form_validation->set_rules("first_name","Seller Name","required");
		$this->form_validation->set_rules("last_name","Seller Name","required");
		$this->form_validation->set_rules("email","Seller Email","required");
		$this->form_validation->set_rules("mobile","Seller Mobile","required");
		$this->form_validation->set_rules("address","Seller Address");
		$this->form_validation->set_rules("city","Seller city","required");
		$this->form_validation->set_rules("district","Seller District","required");
		$this->form_validation->set_rules("gender","Seller gender","required");
		$this->form_validation->set_rules("pin_code","Seller Pincode","required");

			if ($this->form_validation->run()== True) 
			{
			
			$data["first_name"]=$this->input->post("first_name",True);
			$data["last_name"]=$this->input->post("last_name",True);
			$data["email"]=$this->input->post("email",True);
			$data["gender"]=$this->input->post("gender",True);
			$data["address"]=$this->input->post("address",True);
			$data["city"]=$this->input->post("city",True);
			$data["district"]=$this->input->post("district",True);
			$data["pin_code"]=$this->input->post("pin_code",True);
			$this->db->where("id",$sid);
			$this->db->update("seller_data",$data);
			redirect("admin/profile/seller_profile");
			$this->session->set_flashdata("Success", "Sorry");
				
			}
			$this->session->set_flashdata("flashSuccess", "Sorry! its not true");
		redirect("admin/profile/seller_profile");
	    }
	    
	}
	
}

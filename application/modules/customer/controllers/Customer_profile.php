<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_profile extends MX_Controller 
{	 
	
	function index()
	{
		$customer_id =$this->session->userdata['customer_logged_in']['c_id'];
		$this->db->where("id", $customer_id);
		$data['customer']=$this->db->get('customer_data');
		$this->load->view('customer_profile',$data);
	}

	function order_list()
	{
		 $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
        $this->db->where("customer_id", $customer_id);
		$data['customer']=$this->db->get('customer_cart');
		
         
		 $this->load->view("order_list",$data);
	}
	function cancel_order()
	{
		date_default_timezone_set("Asia/Kolkata");
		 $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
         $data['order_status']='cancel';
         $data['cancel_by']="Customer";
		$data['d_date']=date("Y-m-d h:i:sa");
		$cid=$this->input->get('id');
		
		$this->db->where('id',$cid);
		$this->db->update('customer_cart',$data);
		redirect('customer/customer_profile/order_list');
	}

	function invoice()
	{
		 $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
         $data['customer_id']=$customer_id;
         $data['order_id']=$this->input->get('order_id');
         $data['oid']=$this->input->get('id');
         $data['cloth_name']=$this->input->get('cloth_name');
         $data['date']=$this->input->get('date');
         $data['img']=$this->input->get('img');
         $data['box_price']=$this->input->get('box_price');
         $data['size']=$this->input->get('size');
         $data['address']=$this->input->get('address');
         $data['quantity']=$this->input->get('quantity');
         $data['order_status']=$this->input->get('order_status');
         $data['total']=$this->input->get('total');
         $data=$this->security->xss_clean($data);
		 $this->load->view("invoice", $data);
	}

	function change_password()
{
	$submit=$this->input->post('submit');
	 
	 $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
	
	$submit= $this->input->post('submit',TRUE);
    if($submit == "Change Password")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldpassword','Old Password','required');
		$this->form_validation->set_rules('newpassword','Password','required|min_length[04]|max_length[20]');
		$this->form_validation->set_rules('cnewpassword','Re enter Password','required|min_length[04]|max_length[20]|matches[newpassword]');

		if($this->form_validation->run()==TRUE)
		{	
				
				$oldp=$this->input->post('oldpassword',TRUE);
				$this->db->select('password');
				$this->db->where('id',$customer_id);
				$query=$this->db->get('customer_data');
				foreach($query->result() as $row)
				{
					if($oldp==$row->password)
					{
						$data['password']=$this->input->post('newpassword',TRUE);
						$data['rpassword']=$this->input->post('newpassword',TRUE);
						$data=$this->security->xss_clean($data);
						$this->db->where('id',$customer_id);
						$this->db->update('customer_data',$data);
						$this->session->set_flashdata('ok','New Password Successfully Changed!');
						redirect('customer/customer_profile/change_password');
					}else
					{
						 $this->session->set_flashdata('error','Your Current Password is Not Correct!');
						 redirect('customer/customer_profile/change_password');
					}
				}

		}


	}


	$this->db->where("id",$customer_id);
	$data['customer']=$this->db->get("customer_data");
    $this->load->view('change_password',$data);
}


	function profile_photo()
	{
		$customer_id =$this->session->userdata['customer_logged_in']['c_id'];
				
	 			$config['upload_path']          = './clothesimage/';
                $config['allowed_types']        = 'gif|jpg|png';
                
                $config['file_name']            = $customer_id.time();
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                $cus_id = $this->uri->segment(3);

                $submit= $this->input->post('submit',TRUE);
			    if($submit == "Upload Photo")

				{
					 
					 if (!$this->upload->do_upload('cphoto'))
                	{
                        $data['error'] = $this->upload->display_errors(); 
                       $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
						$this->db->where("id",$customer_id);
						$mydata=$this->db->get("customer_data");
						$myrow=$mydata->row();
						$data['img']=$myrow->img;
						$data=$this->security->xss_clean($data);
                        $this->load->view('change_profile_photo',$data);	
                	}
                	else
                	{
                		
                		$data = $this->upload->data();    					
                	    $mydata['img']=$data['file_name'];
                        $this->db->where("id",$customer_id);
                        $this->db->update("customer_data",$mydata);
		   		 		$this->session->set_flashdata('flashSuccess', 'Profile Photo successfully updated');       
                        redirect('customer/customer_profile/profile_photo');	

                	}
					
				}  
		$this->load->view("change_profile_photo");
	}

	function view_detail()
	{
		 $customer_id =$this->session->userdata['customer_logged_in']['c_id'];
		 $data['customer_id']=$customer_id;
         $data['order_id']=$this->input->get('order_id');
         $data['cloth_name']=$this->input->get('cloth_name');
         $data['date']=$this->input->get('date');
         $data['img']=$this->input->get('img');
         $data['box_price']=$this->input->get('box_price');
         $data['size']=$this->input->get('size');
         $data['address']=$this->input->get('address');
         $data['quantity']=$this->input->get('quantity');
         $data['order_status']=$this->input->get('order_status');
         $data['total']=$this->input->get('total');
		
         
		 $this->load->view("view_detail1",$data);
	}
}
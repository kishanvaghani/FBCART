<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MX_Controller 
{	 
	
	function add_to_cart()
 {
	$session_id = $this->session->session_id;
		$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
	
	$submit= $this->input->post('submit',TRUE);
	

	if($submit=="buy")
	{
		$data['session_id'] = $session_id;
		$data['customer_id'] = $customer_id;
		$data['order_id'] = $this->input->post('order_id',TRUE);
		$data['cloth_name'] = $this->input->post('cloth_name',TRUE);
		$data['cloth_size'] = $this->input->post('cloth_size',TRUE);
		$data['box_price'] = $this->input->post('box_price',TRUE);
		$data['img'] = $this->input->post('img',TRUE);
		$data['quantity'] = $this->input->post('quantity',TRUE);
		$data['ip_address'] = $this->input->ip_address();
		$data['order_status'] ='pending';
		$data['tax'] = '0';
		$data=$this->security->xss_clean($data);
		$this->load->model('mdl_cart');
		$this->mdl_cart->cartitem_insert($data);
		
	}
	redirect('customer/cart/show_cart');
 }
 function payment()
{
	$session_id = $this->session->session_id;
	
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
		date_default_timezone_set("Asia/Kolkata");
		$data['order_status'] = "waiting";
		
		$data['date']=date("Y-m-d h:i:sa");
		$this->db->where('order_status','pending');
		$this->db->where('customer_id',$customer_id);
		$this->db->update('customer_cart',$data);
		
	}else
	{
		redirect("customer/authenticate/login");
	}
	$this->load->view('payment');
}
function cart_done()
{
	$this->load->view('cart_done');
}
 function order_overview()
{
	$session_id = $this->session->session_id;
	$customer_id ='';

	
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$customer_id =$this->session->userdata['customer_logged_in']['c_id'];
		$this->db->where('customer_id', $customer_id);
		$mycart=$data['query']=$this->db->get('customer_cart');
	}else
	{
		$this->db->where('session_id', $session_id);
		$mycart=$data['query']=$this->db->get('customer_cart');
	}

	$data['countitem'] = $mycart->num_rows();
	$this->load->view('order_overview',$data);
}
 function delete_address()
 {

	$address_id=$this->uri->segment(4);
	$this->db->where('id',$address_id);
	$this->db->delete('customer_address');
	redirect('customer/cart/shipping_address');
 }
  function update_quantity()
	{
		$id=$this->uri->segment(4);

		$mm=$data['quantity'] = $this->input->post('boxquantity',TRUE);
		$this->db->where('id',$id);
		$this->db->update('customer_cart',$data);
		redirect('customer/cart/show_cart');
	}
function removeitem()
  {
	$remove_id = $this->uri->segment(4);
	$this->load->model('mdl_cart');
	$this->mdl_cart->remove_item($remove_id);
	$refer_url = $_SERVER['HTTP_REFERER'];
	redirect($refer_url);
  }
  function delivery_address()
{
	$session_id = $this->session->session_id;
	
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
		$data['address'] = $this->uri->segment(4);
		$this->db->where('order_status','pending');
		$this->db->where('customer_id',$customer_id);
		$this->db->update('customer_cart',$data);
		
	}else
	{
		$data['address'] = $this->uri->segment(4);
		$this->db->where('order_status','pending');
		$this->db->where('session_id',$session_id);
		$this->db->update('customer_cart',$data);
	}


	redirect('customer/cart/order_overview');
	
}
function delivery_address1()
{
	$session_id = $this->session->session_id;
	
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
		$data['address'] = $this->uri->segment(4);
		$this->db->where('order_status','pending');
		$this->db->where('customer_id',$customer_id);
		$this->db->update('customer_cart',$data);
		
	}else
	{
		$data['address'] = $this->uri->segment(4);
		$this->db->where('order_status','pending');
		$this->db->where('session_id',$session_id);
		$this->db->update('customer_cart',$data);
	}


	redirect('customer/cart/order_overview');
	
}
   function save_address()
 {
	$session_id = $this->session->session_id;
	
	$customer_id =0;
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
		
	}

	$submit= $this->input->post('submit',TRUE);	
	$data['session_id'] = $session_id;
	$data['customer_name'] = $this->input->post('fullname',TRUE);
	$data['customer_mobile'] = $this->input->post('mobile',TRUE);
	$data['customer_alt_mobile'] = $this->input->post('altmobile',TRUE);
	$data['customer_city'] = $this->input->post('city',TRUE);
	$data['customer_state'] = $this->input->post('state',TRUE);
	$data['customer_zip_code'] = $this->input->post('zipcode',TRUE);
	$data['customer_address'] = $this->input->post('address',TRUE);
	$data['customer_full_address']= $this->input->post('fullname',TRUE).'<br/>'.$this->input->post('address',TRUE).'</br>'.$this->input->post('city',TRUE).'</br>'.$this->input->post('state',TRUE).'</br>Zip Code:'.$this->input->post('zipcode',TRUE);
	$data['ip_address'] = $this->input->ip_address();
	$data=$this->security->xss_clean($data);
	if($submit=='SAVE_NEW_ADDRESS')
	{
		$data['customer_id'] = $customer_id;
		$this->db->insert('customer_address',$data);
	}else
	{
		$this->db->where('id',$this->uri->segment(4));
		$this->db->update('customer_address',$data);
	}
	redirect('customer/cart/shipping_address');

	
 }

  function shipping_address()
{
	$edit=$this->input->get('edit');
	$submit=$this->input->post('submit',TRUE);
	$data['address_function']='SAVE_NEW_ADDRESS';
	$data['fullname']='';
	$data['mobile']='';
	$data['altmobile']='';
	$data['city']='';
	$data['state']='';
	$data['zipcode']='';
	$data['address']=''; 
	if($edit=='yes')
	{
		$address_id=$this->input->get('address_id');
		$this->db->where('id',$address_id);

		$query=$this->db->get('customer_address');
		foreach($query->result() as $row)
		{
			
			$data['fullname']=$row->customer_name;
			$data['mobile']=$row->customer_mobile;
			$data['altmobile']=$row->customer_alt_mobile;
			$data['city']=$row->customer_city;
			$data['state']=$row->customer_state;
			$data['zipcode']=$row->customer_zip_code;
			$data['address']=$row->customer_address;
			$data['address_function']='SAVE_EDIT_ADDRESS';

		}
	}
	$session_id = $this->session->session_id;
	$id='';
	$data['addresss']='';
	if(isset($this->session->userdata['customer_logged_in']['c_id']))
	{
		$id = $this->session->userdata['customer_logged_in']['c_id'];
		$this->db->where('customer_id',$id);
		$data['addresss']=$this->db->get('customer_address');
	}else
	{
		$this->db->where('session_id',$session_id);
		$data['addresss']=$this->db->get('customer_address');
	}

	$this->load->view('shipping_address',$data);

}

	function show_cart()
	{
		$session_id = $this->session->session_id;
		$customer_id='';
		if(isset($this->session->userdata['customer_logged_in']['c_id']))
		{
			$customer_id = $this->session->userdata['customer_logged_in']['c_id'];
		}
		
		
		if($customer_id>'0')
		{
			$this->db->where('customer_id', $customer_id);
			$mycart=$data['query']=$this->db->get('customer_cart');
			
		}else
		{
			redirect("customer/authenticate/login");
		}
		$data['countitem'] = $mycart->num_rows();
		$this->load->view('show_cart',$data);
	}

	function review()
	{
		$submit=$this->input->post("submit");
		if ($submit="review") 
		{
			$this->form_validation->set_rules('name','Enter valid Name','required');
			$this->form_validation->set_rules('email','Enter Valid Email','required'); 
			$this->form_validation->set_rules('subject','Enter Valid subject','required');
			$this->form_validation->set_rules('star','Select Your Rating','required');
			$this->form_validation->set_rules('review','Enter Your Opening For This Product','required');
			if($this->form_validation->run()==TRUE)
			{
			   
				$data['name'] = $this->input->post('name',TRUE);
				$data['star'] = $this->input->post('star',TRUE);
				
				$data['email'] = $this->input->post('email',TRUE);
				$data['subject'] = $this->input->post('subject',TRUE);	
				$data['review'] = $this->input->post('review',TRUE);
$data=$this->security->xss_clean($data);
				$this->db->insert("review", $data);
				redirect("custome/cart/review");
			}	
		}
		$this->load->view("cus_img_view");
	}
	function order_list()
  {
	$this->load->view("order_list");
  }
}

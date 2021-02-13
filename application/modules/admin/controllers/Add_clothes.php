<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_clothes extends MX_Controller 
{
	
	public function index()
	{	
		$submit= $this->input->post('submit',TRUE);
		
	    if($submit == "submit")
	    {
	    	$this->form_validation->set_rules('cloth_name','Enter Cloth name','required');
	    	$this->form_validation->set_rules('cloth_value','Enter Cloth Value','required|numeric');
	    	$this->form_validation->set_rules('cloth_desc','Enter About Material','required');
	    	$this->form_validation->set_rules('clothes_size[]','Enter Cloth Size','required');

	    	if($this->form_validation->run()==TRUE)
			{ 
				$data['cloth_name']=$cloth_name = $this->input->post('cloth_name',TRUE);
				$data['cloth_value']=$cloth_value = $this->input->post('cloth_value',TRUE);
				$data['cloth_desc']=$cloth_desc = $this->input->post('cloth_desc',TRUE);
				$data=$this->security->xss_clean($data);
				$allsize="";
				foreach($_POST['clothes_size'] as $selected)
				{
					$allsize=$allsize.$selected.' ';
				} 
				
				
				$clothes_size['clothes_size'] = $allsize;

				   	 $session_data = array(
				   	 	'cloth_name' => $cloth_name,
				   	 	'cloth_value'=> $cloth_value,
				   	 	'clothes_size'=>$clothes_size,
				   	 	'cloth_desc'=> $cloth_desc, 			   	
				   	 ); 

				   	  
				   	 $this->session->set_userdata('add_clothes', $session_data);
				   	 $this->session->set_flashdata('success', 'Please Insert Cloth Image');
				redirect('admin/add_clothes/add_image');
            } 
	    }
	    
		$this->load->view('add_clothes');
	}	
	//public function update_clothes()
	//{
		//$data['id']= $id =$this->uri->segment(4);
    	//$this->db->where('id',$id);
    	//$query=$this->db->get('add_clothes');
    	//print_r($query); exit();
    	//foreach($query->result() as $row)
       // {
        //		$data['cloth_value']=$row->cloth_value;
        //		$data['cloth_name']=$row->cloth_name;
        //		$data['operation']="Update clothes";
        //		print_r($data); exit();
        		  
       // }
       // $this->load->view('change',$data);
	//}
	function change()
	{
		$submit= $this->input->post('submit',TRUE);
		$uid=$this->input->get('uid');
	    if($submit == "change")
	    {
            $this->form_validation->set_rules('cloth_name','Enter Cloth name','required');
	    	$this->form_validation->set_rules('cloth_value','Enter Cloth Value','required|numeric');
	    	if($this->form_validation->run()==TRUE)
			{ 
				$data['cloth_name']=$cloth_name = $this->input->post('cloth_name',TRUE);
				$data['cloth_value']=$cloth_value = $this->input->post('cloth_value',TRUE);
                $data=$this->security->xss_clean($data);
                $this->db->where("id",$uid);
				$this->db->update("add_clothes",$data);
				 $this->session->set_flashdata('success', 'Please Insert Cloth Image');
				redirect('admin/add_clothes/view_clothes');
			}

	    }
	    $this->db->where('id',$uid);
    	$query=$this->db->get('add_clothes');
    	foreach($query->result() as $row)
        {
        	    $data['uid']=$row->id;
        		$data['cloth_name']=$row->cloth_name;
        		$data['cloth_value']=$row->cloth_value;	
        		$data['operation']="Update Price";
        }				
	    $this->load->view("change",$data);
	}
	
	
	public function add_image()
	{
		$seller_id = ($this->session->userdata['seller_logged_in']['seller_id']);
		$cloth_name = ($this->session->userdata['add_clothes']['cloth_name']);
		$cloth_value = ($this->session->userdata['add_clothes']['cloth_value']);
		$clothes_size = ($this->session->userdata['add_clothes']['clothes_size']);
		$cloth_desc = ($this->session->userdata['add_clothes']['cloth_desc']);
		$seller_name = ($this->session->userdata['seller_logged_in']['seller_name']);


			        date_default_timezone_set("Asia/Kolkata");
				    $config['upload_path'] = './clothesimage/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']             = 10000;
					$config['file_name']            = $seller_id.time();
					 $config['overwrite']           = TRUE;

					 $this->load->library('upload', $config);
					 $this->upload->initialize($config);
			        $submit= $this->input->post('submit');	
			        
				    if($submit == "upload image")
				    {    	
				    	if ($this->upload->do_upload("img"))
				    	{     
				    	        $data = $this->upload->data();
						        $mydata['date'] = date('Y-m-d H:i:s');  
						        $mydata['img']=$data['file_name'];
					    	    $mydata['cloth_name']=$cloth_name;
					    	    $mydata['cloth_value']=$cloth_value;
					    	    $mydata['cloth_desc']=$cloth_desc;
					    	    $mydata['clothes_size']=implode(',',$clothes_size);
					    	     $mydata['seller_name']=$seller_name; 
					    	     $mydata['active_cloth']="1";

					    	    $mydata['seller_id']=$seller_id;
					    	    $data=$this->security->xss_clean($data);
					            $this->db->insert("add_clothes",$mydata);
							 	$this->session->set_flashdata('success', 'Photo successfully upload');       
					            redirect('admin/add_clothes');
					        
				        }else
				        {
				        	 $this->session->set_flashdata('message', 'please enter valid image');
				        		redirect('admin/add_clothes/add_image');
				        }
				    }
		$this->load->view('add_image');
	}
	public function view_clothes()
	{
		$seller_id = ($this->session->userdata['seller_logged_in']['seller_id']);
		$this->db->where('seller_id',$seller_id);
		$data['clothdata']=$this->db->get('add_clothes');
		$this->load->view('view_clothes',$data);
	}
	public function delete_clothes()
	{
		$id=$this->input->get('id');
    	$this->db->where('id',$id);
    	$this->db->delete('add_clothes');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/add_clothes/view_clothes');
	}
	
	public function delete_img()
	{
		$did=$this->input->get('id');
    	$this->db->where('id',$did);
    	$this->db->delete('add_clothes');
    	 $this->session->set_flashdata("message","Record has been successfully deleted !");
    	redirect('admin/add_clothes/view_cloth');
	}
	function activate_cloth()
	{
		$id=$this->input->get('id');
		
		{
			$data['active_cloth']="0";
		}
		$this->db->where('id',$id);
		$this->db->update('add_clothes',$data);
		redirect("admin/add_clothes/view_clothes");
	}
	function deactivate_cloth()
	{
		$id=$this->input->get('id');
		
		{
			$data['active_cloth']="1";
		}
		$this->db->where('id',$id);
		$this->db->update('add_clothes',$data);
		redirect("admin/add_clothes/view_clothes");
	}
	
}


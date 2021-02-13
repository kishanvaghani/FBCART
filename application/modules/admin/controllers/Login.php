<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Login extends MX_Controller 
{
	function mail_send($to,$content)
    {
      //Load email library
      $this->load->library('email');
      //SMTP & mail configuration
      $config = array(
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'kishan@lecollege.ac.in',
          'smtp_pass' => 'kishan1999',
          'mailtype'  => 'html',
          'charset'   => 'utf-8'

      );
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");
      $htmlContent = $content;
      $this->email->to($to);
      $this->email->from('kishan@lecollege.ac.in','FBCART');
      $this->email->subject('Welcome to FBcart');
      $this->email->message($htmlContent);
      //Send email
      $this->email->send();
    }
 
   public function index()
   {		
		$submit = $this->input->post('submit',TRUE);
		if($submit=="login")
		{ 
			    $this->load->library('form_validation');           
				$this->form_validation->set_rules('s_mob','Enter Mobile','required|trim');
				$this->form_validation->set_rules('s_password','Enter Password','required|trim');
				if($this->form_validation->run()==TRUE)
				{					

					$value1=$this->input->post('s_mob',TRUE);
					$col1="mobile"; 
					$col2="email";
	                $value2=$this->input->post('s_mob',TRUE);
	                $pass=$this->input->post('s_password',TRUE);


	                $this->db->where($col1,$value1);
	                $this->db->or_where($col2,$value2);
	                $query = $this->db->get('seller_data');

	                if($query->num_rows()=='1')

	                {
	                	foreach($query->result() as $row)
	                	{
	                		$user_id = $row->id;
	                		$seller_name=$row->first_name;
	                		$got_password=$row->password;
	                		 
	                	
	                	}
	                	if($pass==$got_password)
	                	{

	                	 $session_data = array(
						'seller_id' => $user_id,
						'seller_name'=>$seller_name,			
						);
						$this->session->set_userdata('seller_logged_in', $session_data);  
						$this->mail_send($row->email,'<p>Dear '.$seller_name.'</p><br/><p>Thank You For Login Your Seller Account In FBCART !</p><p>You can maintain your profile via FBCART Seller portal');	            
			        	redirect('admin/home');
			        	}else
			        	{
			        		$this->session->set_flashdata('flashSuccess', 'Sorry! password is not correct');
	          				redirect('admin/login');
			        	}
	                }else
	                {
	                	$this->session->set_flashdata('flashSuccess', 'Sorry! Username is not correct');
	          				redirect('admin/login');	
	                }
	                
		        }else
		        {
		        $this->session->set_flashdata('flashSuccess', 'Sorry! Username or password is not correct');
		        redirect('admin/login');		
				}

		}

			
		$data="";
	
		$this->load->view('login',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata("message","Successfully Logout");
		redirect('admin/login');
	}	
}
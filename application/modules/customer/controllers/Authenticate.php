<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate extends MX_Controller 
{
	
	public function Register()
	{
		 $submit=$this->input->post('submit');
		 if($submit=="done")
		  {   
		   
		    $this->form_validation->set_rules('name','Firstname','required');
		   
		    $this->form_validation->set_rules('email',' Email Id','valid_email|required|is_unique[customer_data.email]');
		    $this->form_validation->set_rules('mobile','Enter Mobile Number','required|numeric|exact_length[10]|is_unique[customer_data.mobile]');
		   
		    $this->form_validation->set_rules('password','Password','required|min_length[04]|max_length[20]');
		    $this->form_validation->set_rules('rpassword','Re-enter Password','required|min_length[04]|max_length[20]|matches[password]');

		      if($this->form_validation->run()==TRUE)
		      {

		        $data['name'] = $this->input->post('name',TRUE);
		        $data['email'] = $this->input->post('email',TRUE);
		        $data['mobile'] = $this->input->post('mobile',TRUE); 
		        $data['img'] = "card.jpg";  
		        
		        $data['password'] = $this->input->post('password',TRUE);
		        $data['rpassword'] = $this->input->post('rpassword',TRUE);
		       
		         
		             $flash_msg="You are Registered Successfully !!";
		           $value= '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$flash_msg.'</strong></div>';
$data=$this->security->xss_clean($data);
		           $this->db->insert("customer_data",$data);
		           $this->mail_send($this->input->post('email',TRUE),'<p>Dear '.$this->input->post('name',TRUE).'</p><br/><p>Thank you for your Registartion !</p><p>You can maintain your profile via FBCART portal. </p><p><strong>Enjoy Your Window Shopping With FBCART And Get Exclusive Price and New collection Of clothes.. </strong></p><br/>Email:'.$this->input->post('email',TRUE).'<br/>Mobile Number:'.$this->input->post('mobile',TRUE).'<br/>Password:'.$this->input->post('password',TRUE));
		          $this->session->set_flashdata('flash_Success', 'You are Registered Successfully !!'); 
		           
		         redirect('customer/authenticate/login');          
		      }
		        

		  }
		$this->load->view('register');
	}
	
	public function login()
   {		
		$submit = $this->input->post('submit',TRUE);
		if($submit=="login")
		{ 
			    $this->load->library('form_validation');           
				$this->form_validation->set_rules('email','Enter email','required');
				$this->form_validation->set_rules('password','Enter Password','required');
				if($this->form_validation->run()==TRUE)
				{					

					$value1=$this->input->post('email',TRUE);
					$col1="mobile"; 
					$col2="email";
	                $value2=$this->input->post('email',TRUE);
	                $pass=$this->input->post('password',TRUE);


	                $this->db->where($col1,$value1);
	                $this->db->or_where($col2,$value2);
	                $query = $this->db->get('customer_data');

	                if($query->num_rows()=='1')

	                {
	                	foreach($query->result() as $row)
	                	{
	                		$c_id = $row->id;
	                		$customer_name=$row->name;
	                		$got_password=$row->password;
	                		$email=$row->email;
	                		$mobile=$row->mobile;
	                	
	                	}
	                	if($pass==$got_password)
	                	{

	                	 $session_data = array(
						'c_id' => $c_id,
						'customer_name'=>$customer_name,
						'email'=>$email,
						'mobile'=>$mobile,			
						);
						$this->session->set_userdata('customer_logged_in', $session_data);   
						$this->mail_send($email,'<p>Dear '.$customer_name.'</p><br/><p>Thank You For Login Your Customer Account In FBCART !</p><p>You can maintain your profile via FBCART Customer portal');           
			        	redirect('customer/home/home1');
			        	}else
			        	{
			        		$this->session->set_flashdata('flashSuccess', 'Sorry! password is not correct');
	          				redirect('customer/Authenticate/login');
			        	}
	                }else
	                {
	                	$this->session->set_flashdata('flashSuccess', 'Sorry! Username is not correct');
	          				redirect('customer/Authenticate/login');	
	                }
	                
		        }else
		        {
		        $this->session->set_flashdata('flashSuccess', 'Sorry! Username or password is not correct');
	          				redirect('customer/Authenticate/login');		
				}
		}
			
		$data="";
	
		$this->load->view('login',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata("message","Successfully Logout");
		redirect('customer/home');
	}	
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
	function forget_password()
	{
		$submit = $this->input->post('submit',TRUE);

		if($submit=="Getpassword")
		{ 
			    $this->load->library('form_validation'); 
			            
				$this->form_validation->set_rules('email',' Email ID','required');			

				if($this->form_validation->run()==TRUE)
				{
					$email = $this->input->post('email',TRUE);
					$this->db->where('email',$email);
					$query=$this->db->get('customer_data');
					$row=$query->num_rows();
					if($row>0)
					{
						foreach($query->result() as $row)
	                	{
	                		$got_password = $row->password;
	                		$email = $row->email;
	                		$name=$row->name;
	                		
	                		$this->mail_send($email,'<p>Dear '.$name.',</p> 
				                <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
				                <br/>
				                <br/>
				                <br/>Not need to reset your password, Because your password is already was stored in Database
				                <br/> Please Do not share your password to someome else <br/><br/> <strong>Your Password Is</strong> :'. $got_password);
			                $this->session->set_flashdata('flashSuccess', 'We have send your Password on your registered mail ID.');
			                redirect('customer/authenticate/login');
	                	}
					}
					 $this->session->set_flashdata('flashSuccess', 'Your Email Id is not registered');
			         redirect('customer/authenticate/forget_password');				
					
				}
		}
		$this->load->view('forget_password');

	}
}
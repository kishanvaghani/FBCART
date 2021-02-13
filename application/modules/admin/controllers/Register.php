<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MX_Controller {


  
  public function index()
{

  $submit=$this->input->post('submit');
  if($submit=="Register")
  {   
    $this->form_validation->set_rules('dob','Date of Birth','required'); 
    $this->form_validation->set_rules('first_name','Firstname','required');
    $this->form_validation->set_rules('last_name','Lastname','required');
    $this->form_validation->set_rules('email',' Email Id','valid_email|required|is_unique[seller_data.email]');
    $this->form_validation->set_rules('mobile','Enter Mobile Number','required|numeric|exact_length[10]|is_unique[seller_data.mobile]');
    $this->form_validation->set_rules('gender','Select Gender','required');
    $this->form_validation->set_rules('city','Select City','required');
    $this->form_validation->set_rules('district','Select Distric','required');
    $this->form_validation->set_rules('pin_code','Enter Pincode','required|numeric|exact_length[6]');
    $this->form_validation->set_rules('password','Password','required|min_length[04]|max_length[20]');
    $this->form_validation->set_rules('rpassword','Re-enter Password','required|min_length[04]|max_length[20]|matches[password]');

      if($this->form_validation->run()==TRUE)
      {
        $data['dob'] = $this->input->post('dob',TRUE);
        $data['first_name'] = $this->input->post('first_name',TRUE);
         
        $data['last_name'] = $this->input->post('last_name',TRUE);
        $data['email'] = $this->input->post('email',TRUE);
        $data['mobile'] = $this->input->post('mobile',TRUE);  
         $data['img']='seller_image.jpg';
        $data['gender'] = $this->input->post('gender',TRUE);
         
        $data['city'] = $this->input->post('city',TRUE);
        $data['district'] = $this->input->post('district',TRUE);
        $data['pin_code'] = $this->input->post('pin_code',TRUE);
        $data['password'] = $this->input->post('password',TRUE);
        $data['rpassword'] = $this->input->post('rpassword',TRUE);
        $data['img']='seller_profile.jpg';
        $data['status']='P';
        $data=$this->security->xss_clean($data);
         
             $flash_msg="You are Registered Successfully !!";
           $value= '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$flash_msg.'</strong></div>';

           $this->db->insert("seller_data",$data);
           $this->mail_send($this->input->post('email',TRUE),'<p>Dear '.$this->input->post('name',TRUE).'</p><br/><p>Thank you for your Seller Registartion !</p><p>You can maintain your profile via FBCART portal. </p><p><strong>Your Account will Acticate In Just 2 Day After Veified By Our Admin. </strong></p><br/>Email:'.$this->input->post('email',TRUE).'<br/>Mobile Number:'.$this->input->post('mobile',TRUE).'<br/>Password:'.$this->input->post('password',TRUE));
          $this->session->set_flashdata('Success', 'You are Registered Successfully !! Please Login After Verified Mail Recieve By FBcart.'); 
           
         redirect('admin/login');          
      }
        

  }
  $this->load->view('seller_register');  
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
          $query=$this->db->get('seller_data');
          $row=$query->num_rows();
          if($row>0)
          {
            foreach($query->result() as $row)
                    {
                      $got_password = $row->password;
                      $email = $row->email;
                      $name=$row->first_name;
                      
                      $this->mail_send($email,'<p>Dear '.$name.',</p> 
                        <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                        <br/>
                        <br/>
                        <br/>Not need to reset your password, Because your password is already was stored in Database
                        <br/> Please Do not share your password to someome else <br/><br/> <strong>Your Password Is</strong> :'. $got_password);
                      $this->session->set_flashdata('flashSuccess', 'We have send your Password on your registered mail ID.');
                      redirect('admin/login');
                    }
          }
           $this->session->set_flashdata('flashSuccess', 'Your Email Id is not registered');
               redirect('admin/register/forget_password');       
          
        }
    }
    $this->load->view('forget_password');

  }
}

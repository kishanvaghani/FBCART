<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Order_detail extends MX_Controller 
{
  
  
  public function index()
  {
           $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);
           $this->db->select("add_clothes.*,customer_cart.*");
           $this->db->from("add_clothes");
           $this->db->join("customer_cart","customer_cart.order_id=add_clothes.id");
           $this->db->where("seller_id",$seller_id);
           $this->db->where("order_status","waiting");
           $data["cloth"]=$this->db->get();
          
     $this->load->view("order_detail",$data);
  }
   public function deliver_order()
  {
           $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);
           $this->db->select("add_clothes.*,customer_cart.*");
           $this->db->from("add_clothes");
           $this->db->join("customer_cart","customer_cart.order_id=add_clothes.id");
           $this->db->where("seller_id",$seller_id);
           $this->db->where("order_status","deliver");
           $data["cloth"]=$this->db->get();
          
     $this->load->view("deliver_order",$data);
  }
   public function Cancel_order()
  {
           $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);

           $this->db->select("add_clothes.*,customer_cart.*");
           $this->db->from("add_clothes");
           $this->db->join("customer_cart","customer_cart.order_id=add_clothes.id");
           $this->db->where("seller_id",$seller_id);
           $this->db->where("order_status","cancel");
           
           $data["cloth"]=$this->db->get();
          
     $this->load->view("Cancel_order",$data);
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
  public function Cancel_update()
  {
           date_default_timezone_set("Asia/Kolkata");
           $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);
           $name=$this->input->get('c_name');
           $total=$this->input->get('total');
           $qty=$this->input->get('qty');
           $data["order_status"]="cancel";
           $data["cancel_by"]="Seller";
           $data["d_date"]=date("Y-m-d h:i:sa");
           $oid=$this->input->get("id");
           $this->db->where("id",$oid);
           $this->db->update("customer_cart",$data);
           $this->mail_send($this->input->get('email'),'<p>Dear '.$this->input->get('c_name').'</p><br/><p>Your Order Is Cancel By Seller !</p><p>This Item is Not Avaible In Stock So Our Seller Cancel Your Order . </p><p> Order No:-'.$oid.'-'.$this->input->get('order_id').'<p></br> item :-'.$name.'<p></br> Value:-'.$total.'<p></br> Qty:-'.$qty.'..');
           
          
     redirect("admin/order_detail");
  }
   public function deliver_update()
  {
           
            date_default_timezone_set("Asia/Kolkata");
           $seller_id = ($this->session->userdata["seller_logged_in"]["seller_id"]);
           $data["order_status"]="deliver";
           $data["d_date"]=date("Y-m-d h:i:sa");
           $oid=$this->input->get("id");
           $this->db->where("id",$oid);
           $this->db->update("customer_cart",$data);
     redirect("admin/order_detail");
  }
  function invoice()
  {
    $data["id"]=$this->input->get("id");
    $data["order_id"]=$this->input->get("order_id");
    $data["cloth_name"]=$this->input->get("cloth_name");
    $data["qty"]=$this->input->get("qty");
    $data["total"]=$this->input->get("total");
    $data["cloth_value"]=$this->input->get("cloth_value");
    $data["cloth_size"]=$this->input->get("cloth_size");
    $data["status"]=$this->input->get("status");
    $data["c_id"]=$this->input->get("c_id");
    $c_name=$data["c_name"]=$this->input->get("c_name");
    $data["c_email"]=$this->input->get("c_email");
    $data["c_mobile"]=$this->input->get("c_mobile");
    $data["c_address"]=$this->input->get("c_address");
    $data["d_date"]=$this->input->get("d_date");
    $data["img"]=$this->input->get("img");
    $data["des"]=$this->input->get("des");
    
    $this->load->view("invoice",$data);
  }
  
}

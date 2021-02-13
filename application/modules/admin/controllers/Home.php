<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller 
{

	
	public function index()
	{
		$seller_id = ($this->session->userdata['seller_logged_in']['seller_id']);
		if ($seller_id==null) 
		{
			redirect('admin/login');
		}
		$this->load->view('home');
	}
	function generateQR($url, $width = 150, $height = 150) {
        $url    = urlencode($url);
        $image  = '';
         
        return $image;
    }
	function saveImage($your_url, $width, $height, $file) 
	{
 
        $your_url    = urlencode($your_url);
        $url  = 'http://chart.apis.google.com/chart?chs='.$width.'x'.$height.'&cht=qr&chl='.$your_url'';
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
         
        $rawdata = curl_exec($ch);
        curl_close($ch);
         
        
        $img = imagecreatefromstring($rawdata);
       
        imagedestroy($img);
    } 
}

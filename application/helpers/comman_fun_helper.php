<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('checkLogin')){
   function checkLogin(){
	   $ci =& get_instance();
	   if($ci->session->userdata('user_id') && $ci->session->userdata('user_email'))
	   {
			$user_id  		= encryptids("D",$ci->session->userdata('user_id'));
			$user_email  	= encryptids("D",$ci->session->userdata('user_email'));
			if($user_id>0)
				return true;
			else 
				return false;
			
			// if($logged_in == 1001)
			// 	return true;
			// else 
			// 	return false;
		}
		else{
		   return false;
		}
	   
   }
}
if ( ! function_exists('ShowUserAlert')){
   function ShowAlert($msg,$alert_type){
		switch($alert_type)
		{
			case "SS":
				$alert = '<div class="alert alert-success background-success">
						
						'.$msg.'
						</div>';
			break;
			case "DD":
				$alert = '<div class="alert alert-danger background-danger">
							
							'.$msg.'
							</div>';
			break;
		}
		
		return $alert;
	   
   }
}
// ================commented code from above alert==============
// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 							<i class="icofont icofont-close-line-circled text-white"></i>
// 							</button>


if(! function_exists('xss_clean'))
{
	function xss_clean($data)
	{
		// Fix &entity\n;
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		// Remove any attribute starting with "on" or xmlns
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		// Remove jav * ascript: and vb * script: protocols
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		// Only works in IE: <span st yle="width: ex * pression(alert('Ping!'));"></span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		// Remove namespaced elements (we do not need them)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		// Remove quotes and angular brackets
		$data = preg_replace('/<.*?>/', '', $data);

		// encode htmlcharacters

		$data = htmlentities($data);
		//$data = urlencode ($data);

		do
		{
			// Remove really unwanted tags
			$old_data = $data;
		   $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

		// we are done...
		return $data;
	}
}
if ( ! function_exists('clearText')){
	function clearText($str)
	{
		if($str==null)
		{
			$str="";
		}
		$input_text = preg_replace("/[^a-zA-Z0-9@]+-_/", "", $str);
		$input_text = xss_clean($input_text);
		return trim(strip_tags($input_text));
		
	}
}
if ( ! function_exists('GetCurrentDateTime')){
	function GetCurrentDateTime($format)
	{
		date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
		/* $now = date('Y-m-d H:i:s'); */
		$now = date($format);
		return $now;
	}
}
if( ! function_exists('encryptids'))
{
	function encryptids($action,$string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'PENSIONAPP2021p3s6v9y$B&E)H@McQeThWmZq4t7w!z%C*F-JaNdRgUjXn2r5u8x/A?D(G+KbPeSh';
		$secret_iv = 'p3s6v9y$B&E)H@McQeThWmZq4t7w!z%C*F-JaNdRgUjXn2r5u8x/A?D(G+KbPeShPENSIONAPP2021';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == "E" ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
			$output = urlencode($output);
		} else if( $action == "D" ) {
			if($string != ""){
				$string = urldecode($string);
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}
			
			
		}
		return $output;
	}
}
if(! function_exists('Formatdate')){
	function Formatdate($input_date,$format)
	{
		date_default_timezone_set('Asia/Kolkata');
		if($input_date && $format)
		{
			$date = new DateTime($input_date);
			return $date->format($format);
		}
		else 
			return false;
	}
}
if(! function_exists('strLimit'))
{
	function strLimit($str,$limit)
	{
		return mb_substr($str,0,$limit);
	}
}
if(! function_exists('convrtemail'))
{
	function convrtemail($str)
	{
		$search 	= ["@","."];
		$replace   	= ["[at]","[dot]"];

		$newPhrase = str_replace($search, $replace, $str);
		return $newPhrase;
	}
}
if(! function_exists('base64UrlEnc'))
{
	function base64UrlEnc($action,$value)
	{
		if($action == "E")
		{
			return urlencode(base64_encode($value));
		}
		else{
			return base64_decode(urldecode($value));
		}
	}
}
if(! function_exists('time_ago')){
	function time_ago( $time )
	{
		date_default_timezone_set("Asia/Kolkata");  
		$time = strtotime($time);
		$time_difference = time() - $time;

		if( $time_difference < 1 ) { return 'less than 1 second ago'; }
		$condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
					30 * 24 * 60 * 60       =>  'month',
					24 * 60 * 60            =>  'day',
					60 * 60                 =>  'hour',
					60                      =>  'minute',
					1                       =>  'second'
		);

		foreach( $condition as $secs => $str )
		{
			$d = $time_difference / $secs;

			if( $d >= 1 )
			{
				$t = round( $d );
				return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
			}
		}
	}
}
if(! function_exists('UploadFile'))
{
	function UploadFile($user_file,$save_path,$file_type,$max_size)
	{
		$CI =& get_instance();
		if($file_type == "pdf_doc")
		{
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['encrypt_name']     	= false;
		}
		else if($file_type == "excel")
		{
			$config['allowed_types']        = 'xlsx|xls';
			$config['encrypt_name']     	= false;
		}
		else if($file_type == "image")
		{
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['encrypt_name']     	= true;
		}
		else if($file_type == "pdf_image")
		{
			$config['allowed_types']        = 'pdf|jpg|png|jpeg';
			$config['encrypt_name']     	= true;
		}
		$config['upload_path']          = $save_path;
		$config['max_size']             = $max_size;
		$config['file_ext_tolower']     = true;
		
		$CI->load->library('upload', $config);
		$response = false;
		if ( ! $CI->upload->do_upload($user_file))
		{ 
			$msg = $CI->upload->display_errors();
			if(strpos($msg, 'size') != false) {
				$msg = "File size should not be greater than ".($max_size/1024). "MB.";
			}
			if(strpos($msg, 'filetype')) {
				$msg = "File type should be ".$config['allowed_types'];
			}
			$response = array("status" =>"error", "MSG"=>$msg,"RESP"=>false);
		}
		else
		{
			$data = $CI->upload->data();
			if(!empty($data['file_name']))
			{
				$response = array("status" =>"success", "MSG"=>$data['file_name'],"RESP"=>true);
			}
				
		}
		return $response;
	}
}
if(!function_exists('createPagination'))
{
	function createPagination($limit_per_page,$tot_rec,$pagi_url)
	{
		$CI =& get_instance();
		$config = array();

		// Set base_url for every links
		$config["base_url"] = $pagi_url;

		// Set total rows in the result set you are creating pagination for.
		$config["total_rows"] = $tot_rec;

		// Number of items you intend to show per page.
		$config["per_page"] = $limit_per_page;

		// Use pagination number for anchor URL.
		$config['use_page_numbers'] = FALSE;

		//Set that how many number of pages you want to view.
		$config['num_links'] = $tot_rec;
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		// Open tag for CURRENT link.
		$config['cur_tag_open'] = '<li class="active"><a href="#">';

		// Close tag for CURRENT link.
		$config['cur_tag_close'] = '</a></li>';

		// By clicking on performing NEXT pagination.
		
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		// By clicking on performing PREVIOUS pagination.
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';

		// To initialize "$config" array and set to pagination library.
		$CI->pagination->initialize($config);

		// Create link.
		return $CI->pagination->create_links();
	}
}
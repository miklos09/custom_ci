<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - AMSC Controller
| @Author: Miklos Herald
| @Date: 02/11/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{
	
	public $template = '';
	
	function __construct(){
		parent::__construct();
	}
	public function render(){
		/*
		 * if render and no template is present
		 * error on the My_controller will show 
		 */
		
		if(empty($this->template) ){
			show_error("No template views specified.", "500");
		}
		$config_template = $this->config->item('template');
		
		$views = array();
		if( isset($this->template) ){
			if( is_array($this->template) ) 
				$views = $this->template;
		}
		if(!$views){
			return false;
		}
		else{
			$arrange_views = $this->arrange_views($views);
			foreach($arrange_views as $view){
				$view_src = $config_template.'/views/'.$view;
				
				$data = isset($this->data)?$this->data:array();
				
				$this->load->view($view_src, $data);
			}
		}
	}
	public function arrange_views($views){
		
		// this function must arrange
		// the views array making the
		// header placed at index 0 and
		// footer placed at the index(n-1)
		
		$header_loc = 'common/header';
		$footer_loc = 'common/footer';
		
		$narr = array();
		foreach($views as $key => $val){
			if($val == $header_loc){
				unset($views[$key]);
				array_unshift($views, $header_loc);
			}
			if($val == $footer_loc){
				unset($views[$key]);
				array_push($views, $footer_loc);
			}
		}
		return $views;
	}
	
	public function authenticate(){
		$this->load->library('users');
		
		$email = $this->session->userdata('email');
		$password = $this->session->userdata('password');
		
		if( !$this->users->authenticate($email, $password) ){
			redirect(base_url().'login');
		}
		else
			return true;
		
		
		/* $email = $this->input->post('email');
		$password = $this->encrypt->sha1( $this->input->post('password') );
		*/
	}
}


/*--------------  end of file ---------------*/
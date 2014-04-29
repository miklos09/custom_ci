<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Login Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends My_Controller{
	
	function __construct(){
		parent::__construct();
	}
	public function index(){
		
	
		$this->tmpl = array(
			'common/footer',
			'common/header',
			'account/login',
		);
		$this->data['title'] = 'Login';
		$this->data['userinfo'] = array(
			'accountName' => 'SHkoreaplayer',
			'accoundId' => '1',
		);
		$this->data['title'] = 'Login';
	
		
		$this->render();
	}
}	

/* End of file login.php */
/* Location: ./application/config/login.php */
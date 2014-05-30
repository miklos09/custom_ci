<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Dashboard Controller
| @Author: Miklos Herald
| @Date: 02/11/2013
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends My_Controller{
	
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->tmpl = array(
			'common/header',
			'account/login',
			'common/footer',
		);
		$this->data['title'] = 'Login';
		$this->data['userinfo'] = array(
			'accountName' => 'SHkoreaplayer',
			'accoundId' => '1',
		);
		
		$accountinfo = new Accountinfo;
		$accountinfo->accountId = 1;
		
		$this->render();
	}
}


/*--------------  end of file ---------------*/
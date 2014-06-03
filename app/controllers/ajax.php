<?php 
/*
|--------------------------------------------------------------------------
| AMS Central 1.0 - Login Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends My_Controller{
	
	function __construct(){
		parent::__construct();
		$this->authenticate();
	}
	public function index(){
		
	}
}	

/* End of file login.php */
/* Location: ./application/config/login.php */
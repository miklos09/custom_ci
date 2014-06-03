<?php 
/*
|--------------------------------------------------------------------------
| Custom CI 1.0 - Dashboard Controller
| @Author: Miklos Herald
| @Date: 2014/04/10/
|--------------------------------------------------------------------------
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends My_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('users');
		$this->authenticate();
	}
	public function index(){
		$this->template = array(
			'common/footer',
			'common/header',
			'common/left_navi',
			'content/dashboard',
		);
		$this->data['title'] = 'Dashboard';
		$this->render();
	}
}	

/* End of file login.php */
/* Location: ./application/config/login.php */
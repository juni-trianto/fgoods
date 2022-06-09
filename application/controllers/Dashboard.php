<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	
	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    

	}

	public function index()
	{
		
        $data = array (
        
                        'title' => 'Product Data',
						'css' => 'content/dashboard/css',
						'content' => 'content/dashboard/index',
						'script' => 'content/dashboard/script'

						) ;
		$this->load->view('template', $data);
	}

}

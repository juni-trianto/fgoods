<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {


	public function index()
	{
		
        $data = array (
                        
                        'title' => 'Product Data',
						'css' => 'content/dashboard/css',
						'content' => 'error404',
						'script' => 'content/dashboard/script'

						) ;
		$this->load->view('template', $data);
	}
}

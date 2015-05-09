<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view("contact");		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
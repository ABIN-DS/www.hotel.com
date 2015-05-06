<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_login");
	}
	
	public function index()
	{
		$this->load->view("login");		
	}
	
	/*
	 * 验证用户登录信息
	 */
	public function submit_login()
	{
		//获取参数
		$_telephone = $this->input->post("telephone");
		$_password = $this->input->post("password");
		$_jmp = $this->input->get("jmp");
		$_jmp = !empty($_jmp)?$_jmp:$this->config->site_url();
		
		//验证用户
		if($this->service_login->user_login($_telephone, $_password))
		{
			ajax_success("登陆成功！", FALSE, $_jmp);
		}
		else
		{			
			ajax_success("用户名或密码错误，登陆失败！", FALSE, $this->config->site_url()."login");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
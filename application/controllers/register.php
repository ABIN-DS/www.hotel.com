<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_register");
	}
	
	public function index()
	{
		$this->load->view("register");		
	}
	
	/*
	 * 验证用户登录信息
	 */
	public function submit_register()
	{
		//获取参数
		$_telephone = $this->input->post("telephone");
		$_password = $this->input->post("password");
		$_jmp = $this->input->get("jmp");
		$_jmp = !empty($_jmp)?$_jmp:$this->config->site_url();
		
		//验证用户
		if($this->service_register->user_register($_telephone, $_password))
		{
			ajax_success("用户注册成功！", FALSE, $_jmp);
		}
		else
		{
			ajax_success("该电话已被注册，注册失败！", FALSE, $this->config->site_url()."register");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
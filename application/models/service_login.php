<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_user_model");
	}
	
	/*
	 * 检查该用户是否有权限登陆
	 */
	function user_login($telephone, $password)
	{
		return $this->dao_user_model->check_user_login($telephone, $password);
	}
	
	/*
	 * 注销登陆
	 */
	function user_logout()
	{
		$this->session->destroy();
		exit("<script>window.location='".$this->config->item("base_url")."';</script>");
	}
}
/* End of file */
/* Location: */
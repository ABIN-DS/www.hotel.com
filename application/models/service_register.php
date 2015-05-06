<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_register extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_user_model");
	}
	
	/*
	 * 检查该用户是否有权限登陆
	 */
	function user_register($telephone, $password)
	{
		if($this->dao_user_model->user_exists($telephone, "normal"))
			return FALSE;
		return $this->dao_user_model->add_user($telephone, $password, "normal");
	}

}
/* End of file */
/* Location: */
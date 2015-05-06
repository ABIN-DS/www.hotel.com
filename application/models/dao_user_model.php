<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dao_user_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	private $table_name = "user";
	
	/*
	 * 检查用户是否有权限登陆
	 */
	public function check_user_login( $telephone, $password)
	{		
		$data["condition"] = array(
				"telephone"	=>	$telephone,
				"password"	=>	encrypt_password($password)
		); 
		$result = $this->my_dao_model->my_get($this->table_name, $data);		
		if(!$this->my_dao_model->hasError() 
				&& count($result)>0 
				&& $result[0]["is_allow_login"]=="yes")
		{
			$this->_init_login($result[0]);
			return TRUE;
		}
		return FALSE;
	}
	
	/*
	 * 设置用户登陆信息
	 */
	private function _init_login($user_info)
	{
		//设置SESSION
		unset($user_info["password"]);
		$this->session->set_userdata($user_info);
		
		//设置数据库信息
		$data = array(
				"condition"	=>	array("id"=>$user_info["id"]),
				"data"		=>	array("last_login_time"=>time())	
		);
		$this->my_dao_model->my_update($this->table_name, $data);
	}
		
	/*
	 * 禁止用户登陆
	 */
	public function disable_login($user_id)
	{
		$this->_set_allow_login($user_id, "no");
	}
	
	/*
	 * 允许用户登陆
	*/
	public function enable_login($user_id)
	{ 
		$this->_set_allow_login($user_id, "yes");
	}
	
	/*
	 * 设置用户登陆权限
	 */
	private function _set_allow_login($user_id, $value)
	{
		//设置数据库信息
		$data = array(
				"condition"	=>	array("id"=>$user_id),
				"data"		=>	array("is_allow_login"=>$value)
		);
		$this->my_dao_model->my_update($this->table_name, $data);
	}
	
	/*
	 * 检测用户的注册内容
	 */
	public function user_exists( $telephone, $role)
	{		
		$data["condition"] = array(
				"telephone"	=>	$telephone,
				"role"		=>	$role
		);
		$result = $this->my_dao_model->my_get($this->table_name, $data);
		if(!$this->my_dao_model->hasError()
				&& count($result)<1)
		{
			return FALSE;
		}
		return TRUE;
	}
	
	/*
	 * 添加用户
	 */
	public function add_user($telephone, $password, $role)
	{
		$data = array(
				"nick_name"	=>	$telephone,
				"telephone"	=>	$telephone,
				"password"	=>	encrypt_password($password),
				"role"		=>	$role,
				"is_allow_login"	=>	"yes",
				"last_login_time"	=>	time()
		);
		$result = $this->my_dao_model->my_insert($this->table_name, $data);
		if(!$this->my_dao_model->hasError()
				&& $result==TRUE)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	/*
	 * 修改用户信息
	 */
	public function update_user($user_id, $data)
	{
		$data = array(
				"condition"	=>	array("id"=>$user_id),
				"data"		=>	$data
		);
		return $this->my_dao_model->my_update($this->table_name, $data);
	}
}
/* End of file */
/* Location: */
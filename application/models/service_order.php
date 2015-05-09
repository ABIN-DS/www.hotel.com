<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_order extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_order_model");
	}
	
	/*
	 * 构造主页所需数据
	 */
	public function get_data($user_id)
	{
		$data["order_list"] = $this->dao_order_model->get_all_order_by_id($user_id);
		$data["category"] = "all";
		$data["categorys"] = array("all", "business", "meeting", "cheap", "shortcut");
		$data["category_name"] = get_room_category_name("all");
		return $data;		
	}

}
/* End of file */
/* Location: */
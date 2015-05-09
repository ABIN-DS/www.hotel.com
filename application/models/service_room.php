<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_room extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_room_model");
		$this->load->model("dao_order_model");
	}
	
	/*
	 * 构造主页所需数据
	 */
	public function get_data($category)
	{
		$data["category"] = $category;
		$data["categorys"] = array("all", "business", "meeting", "cheap", "shortcut");
		$data["category_name"] = get_room_category_name($category);
		if($category == "all")
		{
			$data["room_list"] = $this->dao_room_model->get_all_room();
		}
		else
		{
			$data["room_list"] = $this->dao_room_model->get_all_room_by_category($category);
		}
		return $data;
	}
	
	/*
	 * 构造订房信息订单页所需数据
	 */
	public function get_reverse_data($category)
	{
		$data["categorys"] = array("all", "business", "meeting", "cheap", "shortcut");
		$data["category_name"] = get_room_category_name($category);
		$data["nick_name"]	= $this->session->userdata("nick_name");
		$data["user_id"] = $this->session->userdata("id");
		return $data;
	}
	
	/*
	 * 保存订单信息
	 */
	public function save_order($data)
	{
		return $this->dao_order_model->save_order($data);
	}

}
/* End of file */
/* Location: */
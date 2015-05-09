<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class room extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_room");
	}
	
	public function index()
	{
		$_type = $this->input->get("type");
		if(empty($_type))
		{
			$_type = "all";
		}
		
		$data = $this->service_room->get_data($_type);
		$this->load->view("room", $data);		
	}
	
	/*
	 * 填写订单信息页面
	*/
	public function room_reserve()
	{	
		//获取提交参数
		$_category = $this->input->get("category");
		if(empty($_category))
		{
			ajax_error("请从下单页进入！", "/room", FALSE);
		}
		//检测用户是否登陆
		$_telephone = $this->session->userdata("telephone");
		if(empty($_telephone))
		{
			ajax_error("您还没有登陆，请登录或注册后再下订单！", "/login?jmp=/room/room_reserve&category=".$_category, FALSE);
		}
		$data = $this->service_room->get_reverse_data($_category);
		$data["telephone"] = $_telephone;
		$data["category"] = $_category;		
		$this->load->view("room_reserve", $data);
	}
	
	/*
	 * 提交预订信息请求
	*/
	public function room_submit_reserve()
	{		
		$data = $_POST;
		$data["start_time"] = strtotime($data["start_time"]);
		$data["end_time"] = strtotime($data["end_time"]);
		$data["create_time"] = time();		
		if($this->service_room->save_order($data))
		{
			ajax_success("订单提交成功！", FALSE, "/order?user_id=".$this->session->userdata("id"));
		}
		else
		{
			ajax_error("订单提交失败!", "/room/room_reserve", FALSE);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
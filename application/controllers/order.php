<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_order");
	}
	
	public function index()
	{
		$user_id = $this->session->userdata("id");
		if(empty($user_id))
		{
			ajax_error("请先登陆！", "/login", FALSE);
		}
		$data = $this->service_order->get_data($user_id);
		$this->load->view("order", $data);		
	}
	
	/*
	 * 提交预订信息请求
	*/
	public function order_cancel()
	{		
		$data = $_POST;
		$data["start_time"] = strtotime($data["start_time"]);
		$data["end_time"] = strtotime($data["end_time"]);
		$data["create_time"] = time();		
		if($this->service_room->save_order($data))
		{
			ajax_success("订单提交成功！", FALSE, "/room/order?user_id=".$this->session->userdata("id"));
		}
		else
		{
			ajax_error("订单提交失败!", "/room/room_reserve", FALSE);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
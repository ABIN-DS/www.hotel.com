<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_home");
	}
	
	public function index()
	{
		$data = $this->service_home->get_data();
		$this->load->view("home", $data);		
	}
	
	/*
	 * 关于我们介绍页
	 */
	public function about_us()
	{
		$this->load->view("about_us");
	}
	
	/*
	 * 新闻详情页
	 */
	public function news_detail()
	{
		$_news_id = $this->input->get("news_id");
		
		//检测id是否设置
		if(is_null($_news_id))
		{
			ajax_error("请求参数有误！", "/home");
		}
		
		//获取数据
		$data = $this->service_home->get_news_detail_data($_news_id);
		$this->load->view("news_detail", $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
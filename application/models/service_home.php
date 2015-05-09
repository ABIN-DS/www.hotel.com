<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_home extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_news_list_model");		
	}
	
	/*
	 * 构造主页所需数据
	 */
	public function get_data()
	{
		$data["news_list"] = $this->dao_news_list_model->get_all_news_list();
		return $data;
	}
	
	/*
	 * 构造新闻详情页所需数据
	*/
	public function get_news_detail_data($news_id)
	{
		$data = $this->dao_news_list_model->get_one_news_by_id($news_id);
		return $data;
	}

}
/* End of file */
/* Location: */
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dao_news_list_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	private $table_name = "news_list";
	
	/*
	 * 获取新闻列表
	 */
	public function get_all_news_list()
	{		
		return $this->my_dao_model->my_get($this->table_name);
	}
	
	/*
	 * 获取新闻详情
	 */
	public function get_one_news_by_id($id)
	{
		$data["condition"]["id"] = $id;
		$result = $this->my_dao_model->my_get($this->table_name, $data);
		if(count($result) == 0)
		{
			$result[0] = array(
					"title"=>"无",
					"create_time"=>time(), 
					"content"=>"无");			
		}
		return $result[0];
	}
}
/* End of file */
/* Location: */
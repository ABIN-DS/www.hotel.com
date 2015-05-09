<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dao_room_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	private $table_name = "room";
	
	/*
	 * 获取所有的数据
	 */
	public function get_all_room()
	{
		$categorys = get_room_categorys();
		$result = array();
		foreach($categorys as $category)
		{
			$tempResult = $this->get_all_room_by_category($category);
			$room_count = count($tempResult);
			for($i=0; $i<$room_count; ++$i)
			{
				$tempResult[$i]["room_count"] = $room_count; 
			}
			$result = array_merge($result, $tempResult);
		}
		return $result;
	}
	
	/*
	 * 依据类型获取房间数据
	 */
	public function get_all_room_by_category($category)
	{
		$data["condition"]["category"] = $category;
		$data["condition"]["status"] = "available";
		return $this->my_dao_model->my_get($this->table_name, $data); 
	}
}
/* End of file */
/* Location: */
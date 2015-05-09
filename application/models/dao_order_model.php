<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dao_order_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	private $table_name = "order";
	
	public function save_order($data)
	{
		$result = $this->my_dao_model->my_insert($this->table_name, $data);
		return $result;
	}
	
	public function get_all_order_by_id($user_id)
	{
		$data["condition"] = array("user_normal_id" => $user_id);		
		$result = $this->my_dao_model->my_get($this->table_name, $data);
		return $result;
	}
}
/* End of file */
/* Location: */

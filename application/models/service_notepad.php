<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class service_notepad extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("dao_note_model");		
	}
	
	/*
	 * 构造主页所需数据
	 */
	public function get_data()
	{
		$data["note_list"] = $this->dao_note_model->get_all_note_list();
		return $data;
	}
	
	/*
	 * 保存留言
	 */
	public function save_note($data)
	{
		return $this->dao_note_model->save_note($data);
	}

}
/* End of file */
/* Location: */
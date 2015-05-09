<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dao_note_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	private $table_name = "note";
	
	public function get_all_note_list()
	{		
		return $this->my_dao_model->my_get($this->table_name);
	}
	
	public function save_note($data)
	{
		return $this->my_dao_model->my_insert($this->table_name, $data);
	}
}
/* End of file */
/* Location: */
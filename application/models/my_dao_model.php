<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class my_dao_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	private $errors = array();
	/*
	 * 每个SQL语句都被分为：select_part,from_part,where_part,limit_part,order_part
	 */
	function my_get($tableName, $data)
	{	
		//参数提取和设置
		if(isset($data["select"]))
			$this->db->select($data["select"]);
		else 
			$this->db->select('*');
		//condition_part部分的处理		
		if(!isset($data["condition"]))
			$data["condition"] = array();
		foreach($data["condition"] as $key=>$val)
		{
			if(!$this->db->field_exists($key, $tableName))
			{
				$this->addError("query", "field[".$key."] not exists!");
				return FALSE;
			}
			$this->db->where($key, $val);
		}
		//order_part部分的处理
		if(!isset($data["order"]))
			$data["order"] = array();
		foreach($data["order"] as $field=>$order)
		{
			if(!$this->db->field_exists($field, $tableName))
			{
				$this->addError("query", "field[".$field."] not exists!");
				return FALSE;
			}
			$this->db->order_by($field, $order);
		}
		//limit_part部分处理
		if(isset($data["limit"]))
			$this->db->limit($data["limit"][0], $data["limit"][1]);
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*
	 * 更新数据库
	 * $data->"data","condition"
	 */
	function my_update($tableName, $data)
	{
		//检查更新的字段是否存在
		foreach ($data["data"] as $key=>$val)
		{
			if(!$this->db->field_exists($key, $tableName))
			{
				$this->addError("update", "field[".$key."] not exists!");
				return FALSE;
			}
		}
		//condition_part部分的处理
		if(!isset($data["condition"]))
			$data["condition"] = array();
		foreach($data["condition"] as $key=>$val)
		{
			if(!$this->db->field_exists($key, $tableName))
			{
				$this->addError("update", "field[".$key."] not exists!");
				return FALSE;
			}
			$this->db->where($key, $val);
		}
		return $this->db->update($tableName, $data["data"]);
	}
	
	/*
	 * 删除记录
	 * $data->"condition"
	 */
	function my_delete($tableName, $condition)
	{
		foreach($condition as $key=>$val)
		{
			if(!$this->db->field_exists($key, $tableName))
			{
				$this->addError("delete", "field[".$key."] not exists!");
				return FALSE;
			}
			$this->db->where($key, $val);
		}
		return $this->db->delete($tableName);
	}
	
	/*
	 * 插入数据
	 * $data
	 */
	function my_insert($tableName, $data)
	{
		foreach($data as $key=>$val)
		{
			if(!$this->db->field_exists($key, $tableName))
			{
				$this->addError("insert", "field[".$key."] not exists!");
				return FALSE;
			}			
		}
		return $this->db->insert( $tableName, $data);
	}
	
	/*
	 * 执行SQL代码，直接返回结果
	 */
	function my_query($sql)
	{
		return $this->db->query($sql);
	}
	
	/*
	 * 获取最近一次执行的SQL语句
	 */
	function getLastSQL()
	{
		return $this->db->last_query()." : ".$this->db->insert_string().
				" : ".$this->update_string();
	}
	
	/*
	 * 查看本次请求是否存在ERROR
	 */
	function hasError()
	{
		return empty($this->errors)?FALSE:TRUE;
	}
	
	/*
	 * 添加错误信息
	 */
	function addError($key, $val)
	{
		$this->errors[$key] = $val;
	}

	/*
	 * 获取Error数组
	 */
	function getErrors()
	{
		return $this->errors;
	}
	
	/*
	 * 获取Error的字符串标示
	 */
	function getErrorsString()
	{
		return "QUERY->".$this->errors["query"]." : UPDATE->".$this->errors["update"]." : DELETE->".
			$this->errors["delete"]." : INSERT->".$this->errors["insert"];
	}
	
	/*
	 * 清空Errors数组
	 */
	function clearErrors()
	{
		$this->errors = array();
	}
}

/* End of file */
/* Location: */
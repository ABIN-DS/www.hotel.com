<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notepad extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("service_notepad");
	}
	
	public function index()
	{
		$user_id = $this->session->userdata("id");
		if(empty($user_id))
		{
			ajax_error("请先登陆！", "/login", FALSE);
		}
		$data = $this->service_notepad->get_data();
		$data["user_normal_id"] = $user_id;
		$this->load->view("notepad", $data);		
	}

	public function note_submit()
	{
		$data = $_POST;
		$data["create_time"] = time();
		
		if($this->service_notepad->save_note($data))
		{
			ajax_success("留言提交成功！", FALSE, "/notepad");
		}
		else
		{
			ajax_error("留言提交失败!", "/notepad", FALSE);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
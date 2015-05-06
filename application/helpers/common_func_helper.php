<?php
/*
 * 密码加密算法
 */
function encrypt_password($original)
{
	return md5($original);
} 

/*
 * 密码解密算法
 */
function decrypt_password($ciphertext)
{
	
}

/**
 * @param string
 * @param Boolen
 * @param string  the url,when this error return
 * @param int
 */
function ajax_error($message='访问出错',$jump_url='/home',$is_ajax =TRUE,$type='JSON',$statusCode ='')
{
	header('content-type:text/html;charset=utf-8;');
	if(!empty($is_ajax) && $is_ajax ===TRUE)
	{
		$result  =  array();
		$result['message']      =  'failed';
		$result['error']        =  $message;
		$result['jump_url']     =  $jump_url;

		if(!empty($satusCode))
		{
			header("Status: $statusCode");
		}
		if(strtoupper($type)=='JSON')
		{
			// 返回JSON数据格式到客户端 包含状态信息
			exit(json_encode($result));
		}
		else if(strtoupper($type)=='XML')
		{
			// 返回xml格式数据
			exit(xml_encode($result));
		}
		else if(strtoupper($type)=='EVAL')
		{
			// 返回可执行的js脚本
			exit($data);
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('",$message,"');window.location ='",$jump_url,"'</script>";
	}
}
/*
 * @Param  Boolen
* @param  (array || string)  psot to  front page
* @param string
* @param string
*/
function ajax_success($data = '', $is_ajax = TRUE, $jump_url = '/home', $type='JSON')
{
	header('content-type:text/html;charset=utf-8;');
	if(!empty($is_ajax) && $is_ajax === TRUE)
	{
		$result = array();
		$result ['message'] = 'success';
		if(!empty($data))
		{
			$result['data'] = $data;
		}

		header("Status: 200");
		if(strtoupper($type)=='JSON')
		{
			// 返回JSON数据格式到客户端 包含状态信息
			exit(json_encode($result));
		}
		else if(strtoupper($type)=='XML')
		{
			// 返回xml格式数据
			exit(xml_encode($result));
		}
		else if(strtoupper($type)=='EVAL')
		{
			// 返回可执行的js脚本
			exit($data);
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('",$data,"');window.location = '",$jump_url,"'</script>";
	}
}
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登陆</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/Validform_v5.3.2_min.js"></script>
    <script src="js/register.js"></script>
</head>
<body>
<!--head start-->
<?php
	$this->load->view("layout/header.php");
?>
<!--head end-->
    <!--main-->
    <div class="wrapper mainout">
    	<div class="wrap0 clearfix main">
        	<div class="main-register">
            	<h2><span class="blue">欢迎登录</span>如没有账号，请<a href="<?php echo $this->config->site_url();?>register">点此注册</a></h2>
                <form id="form-register" action="<?php echo $this->config->site_url();?>login/submit_login" method="post">
                    <p><label class="fl">手机号</label>
                    	<input class="fl" type="text" placeholder="请输入11位手机号" datatype="m" nullmsg="请输入联系人手机号！" errormsg="请输入正确的手机号！" sucmsg="" name="telephone">
                    	<span class="Validform_checktip error"></span>
                    </p>
                    <!--<p><label class="fl">邮箱</label>
                    	<input class="fl" type="text" placeholder="请输入您的邮箱" datatype="e" nullmsg="请输入您的邮箱！" errormsg="请输入正确的邮箱格式！" sucmsg="">
                    	<span class="Validform_checktip error"></span>
                    </p>-->
                    <p><label class="fl">密码</label>
                    	<input class="fl" type="password" placeholder="请输入6-16位的密码" name="password" nullmsg="请再次输入密码！" datatype="*6-16" errormsg="请输入6~16位的字母、数字！" sucmsg="">
                    	<span class="Validform_checktip error"></span>
                    </p>
                    <!--<p><label class="fl">重复密码</label>
                    	<input class="fl" type="password" placeholder="请再次输入密码" recheck="userpassword" datatype="*"
                         name="userpassword2" nullmsg="请再次输入密码" sucmsg="">
                    	<span class="Validform_checktip error"></span>
                    </p>-->
                    <p>
                    	<input class="btn-register" type="submit" value="登 录">
                    </p>
                </form>
            </div>
        </div>
    </div>
<!--footer start-->
<footer>

</footer>
<!--footer end-->
</body>
</html>

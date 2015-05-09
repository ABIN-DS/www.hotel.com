<?php 
$role = $this->session->userdata("role");
if(!is_null($role) && $role='normal')
{
?>
	<div class=" clearfix head ">
	    <div class="wrap">
	        <div class="fl fs30 white mr30">酒店管理系统</div>
	        <ul class="fl white fs16 ml10">
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/home"?"cur":""?>" href="/home">首页</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/room"?"cur":""?>" href="/room">酒店预订</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/order"?"cur":""?>" href="/order">订房信息</a></li>	            
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/notepad"?"cur":""?>" href="/notepad">留言板</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/contact"?"cur":""?>" href="/contact">联系我们</a></li>	            
	        </ul>
	        <div class="fl clearfix ml40 ">
	            <a class="pr10 green" href="<?php echo $this->config->site_url()."login?jmp=".$_SERVER['REQUEST_URI'];?>">登录</a>|<a class="pl10 white " href="<?php echo $this->config->site_url()."register?jmp=".$_SERVER['REQUEST_URI'];?>">免费注册</a>
	        </div>
	    </div>
	
	</div>
<?php 
}
else 
{	
?>
	<div class=" clearfix head ">
	    <div class="wrap">
	        <div class="fl fs30 white mr30">酒店管理系统</div>
	        <ul class="fl white fs16 ml10">
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/home"?"cur":""?>" href="/home">首页</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/room"?"cur":""?>" href="/room">房间管理</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/room"?"cur":""?>" href="/room">订单管理</a></li>
	            <li class="fl p5"><a class="<?php echo $_SERVER["REQUEST_URI"]=="/home"?"cur":""?>" href="management.html">用户管理</a></li>
	            <li class="fl p5"><a href="contact.html">新闻管理</a></li>
	            <li class="fl p5"><a href="liuyan.html">留言管理</a></li>	            
	        </ul>
	        <div class="fl clearfix ml40 ">
	            <a class="pr10 green" href="<?php echo $this->config->site_url()."login?jmp=".($_SERVER['PHP_SELF']=="index.php/login"?'':$_SERVER['PHP_SELF']);?>">登录</a>|<a class="pl10 white " href="<?php echo $this->config->site_url()."register?jmp=".($_SERVER['PHP_SELF']=="index.php/register"?'':$_SERVER['PHP_SELF']);?>">免费注册</a>
	        </div>
	    </div>
	</div>
<?php 
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>入住登记</title>
<?php
	$this->load->view("layout/source_base"); 
?>
	<script type="text/javascript" src="/js/room_reserve.js"></script>
</head>
<body>
<!--head start-->
<?php
	$this->load->view("layout/header"); 
?>
<!--head end-->
<!--banner start-->
<div class="banner  center ">
    <a href="/home"><img src="/images/banner1.jpg"></a>
</div>
<!--banner end-->
<div class="mt15 wrap">
    <div class="fl reserve">
        <p>客房分类</p>
        <ul class="classify">
        <?php        	
        	foreach($categorys as $val)
        	{ 
        ?>
        	<li><a href="/room?type=<?php echo $val;?>" class="fl <?php echo $category==$val?"current":"";?>"><?php echo get_room_category_name($val);?></a></li>
         <?php
        	} 
         ?>
        </ul>
        <p>工作时间</p>
        <ul class="time">
            <li>周一至周五：8:30-20:00</li>
            <li>周六至周日：9:00-21:00</li>
        </ul>
        <p>酒店电话</p>
        <ul class="time">
            <li>15010238227</li>
        </ul>
    </div>
    <div class="fr success success1">
        <h3 class="blue">在线预订:<span class="ml10 fs14"><?php echo $telephone;?></span></h3>
        <h4>您的信息:</h4>
        <p>请仔细填写，以确保我们能更好的为您服务</p>

        <form method="post" action="/room/room_submit_reserve" id="fm_submit_reserve">
            <p>
                <label class="mr10">预订数量:</label>
                <input type="text" name="room_count">
            </p>
            <p>房间类型：<spana><?php echo $category_name;?></spana></p>
            <p>
                <label class="mr10">入住日期:</label>
                <input type="date" name="start_time"  value=""/>
            </p>
            <p>
                <label class="mr10">离店日期:</label>
                <input type="date" name="end_time" value=""/>
            </p>
            <p>
                <label class="mr10">客人姓名:</label>
                <input type="text" name="customer_name" value="<?php echo $nick_name;?>">
            </p>
            <p>
                <label class="mr10">联系电话:</label>
                <input type="text" name="telephone" value="<?php echo $telephone;?>">
            </p>
            
            <h3 class="red">入住请携带您的有效证件！</h3>
            <h4 class="blue">系统信息：</h4>
            <p>
                <label class="mr10">接待人员:</label>
                <input type="text" value="前台"></input>
                <input type="hidden" name="user_receive_id" value="1"></input>
            </p>
            <p>
                <label class="mr10">所需费用:</label>
                <input type="text" name="money" value="123">
            </p>
            <p>
                <label class="mr10">房间号码列表:</label>
                <input type="text" name="room_nums" value="">
            </p>            
            <p class="center">
                <a href="" id="a_submit_reserve" class="button">立即下订单</a>
            </p>
            <input type="hidden" name="user_normal_id" value="<?php echo $user_id;?>"></input>
        </form>
    </div>
</div>
</body>
</html>
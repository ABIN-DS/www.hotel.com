<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>酒店管理系统</title>
<?php
	$this->load->view("layout/source_base"); 
?>
	<style type="text/css">
		.fr{
			float: left;
		}
	</style>
</head>
<body>
<!--head start-->
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
    <?php
    	foreach ($order_list as $order)
    	{ 
    ?>
    <div class="fr success">
        <h3 class="blue">在线预订:<span class="ml10 fs14"><?php echo $order["id"];?></span></h3>
        <h4>您的信息:</h4>
        <div class="mt20">
            <p>预订数量:<span><?php echo $order["room_count"]?></span></p>
            <p>房间类型:<span><?php echo "type"?></span></p>
            <p>入住日期:<span><?php echo date("Y-m-d", $order["start_time"]);?></span></p>
            <p>离店日期:<span><?php echo date("Y-m-d", $order["end_time"]);?></span></p>
            <p>客人姓名:<span><?php echo $order["customer_name"];?></span></p>
            <p>客人电话:<span><?php echo $order["telephone"]?></span></p>
        </div>
        <div class="org">恭喜您，订单成功！</div>
    </div>
    <?php
    	} 
    ?>
</div>
</body>
</html>
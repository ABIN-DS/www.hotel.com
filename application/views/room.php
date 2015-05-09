<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>订房(员)</title>
    <?php
    	$this->load->view("layout/source_base"); 
    ?>
</head>
<body>
<!--head start-->
<?php
	echo $this->load->view("layout/header"); 
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
    <div class="fr xiang ">
        <h2 class="fs16">服务项目</h2>
        <p class="pre">当前条件：<?php echo $category_name;?></p>
        <?php
        	foreach($room_list as $room) 
        	{
        ?>
        <div class="clearfix">
            <img class="fl mt15 ml15" src="<?php echo $room["picture"]?>">
            <div class="fl ml40">
                <div class="org price mb10 mt15">￥<span><?php echo $room["price"];?></span></div>
                <p><a href="#"><span class="org">364</span>条点评</a></p>
                <p>客房面积：<?php echo $room["area_mearsure"]?>平方米</p>
                <p class="org">房间总数：<?php echo $room["room_count"]?>间</p>
                <p>使用时间&nbsp&nbsp24小时接待</p>
                <p>预约提示&nbsp&nbsp请至少提前一天致电预约</p>
                <p class="org">预约电话：15010238227</p>
                <div class="qiang center mt15"><a class="white" href="/room/room_reserve?category=<?php echo $room["category"]?>">抢购</a></div>
            </div>
        </div>
        <p class="pre"></p>
		<?php
        	} 
		?>
    </div>
</div>
</body>
</html>
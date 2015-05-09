<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>酒店管理系统</title>
    <?php
		$this->load->view("layout/source_base"); 
	?>
    <script src="/js/home.js"></script>
</head>
<body>
<!--head start-->
	<?php 
		$this->load->view("layout/header");
	?>
<!--head end-->
<!--banner start-->
    <div class="banner  center ">
        <a href="<?php echo $this->config->site_url();?>home"><img src="images/banner1.jpg"></a>
    </div>
<!--banner end-->
<!--main start-->
    <div class="wrap">
        <div class="clearfix ">
            <div class="fl select mt20">
                <h2 class="fs20 pl15 pt15 pb10">酒店预订</h2>
                <form class="clearfix" id="fm_date" action="home" method="post">
                    <div class="ml20 blue fl">
                        <label class="mr10">入住日期</label>
                        <input type="date" name="date_start" />
                    </div>
                    <div class="ml40 blue fl">
                        <label class="mr10">离店日期</label>
                        <input type="date" name="date_end" />
                    </div>
                </form>
                <a href="" id="a_search" class="sou center fs16 fr mr30 mt20">搜索</a>
            </div>
            <div class="fr">
                <div class="mt20 price">
                    <h3 class="org">放心的价格</h3>
                    <p>极具竞争力的全球酒店价格</p>
                    <p>价格真实可订，无附加服务费</p>
                </div>
                <div class="mt20 fu">
                    <h3 class="org">放心的服务</h3>
                    <p>大量真实住客的认真点评</p>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap clearfix mt40 mb50">
        <div class="fl about">
            <h2>关于我们</h2>
            <div class="clearfix">
                <img class="fl" src="images/1.png">
                <div class="fr mt20">
                    <p>可能是打飞机的建设科技 市地税局开始觉得开始开始觉得开始开始觉得是肯定</p>
                    <p>搜索山东快书时间的开始的内裤女生的卡了卡刷卡空间啊连接的鞍
                        的拉大打开的内裤女生的卡了卡刷卡空间啊连接的鞍山的拉大打开的
                        垃圾啦的开始觉得蓝色垃圾啦的内裤女生的卡了卡刷卡空间啊连接的鞍
                        山的拉大打开的垃圾啦的开始觉得蓝色开始觉得蓝色的阿卡卡是的是的
                        <a class="blue ml10" href="home/about_us">查看更多</a></p>
                </div>
            </div>
        </div>
        <div class="fr management">
            <h2>酒店管理知识</h2>
            <ul>
            <?php
            	foreach($news_list as $val)
            	{ 
            ?>
                <li class="clearfix"><a class="fl" href="home/news_detail?news_id=<?php echo $val["id"];?>"><?php echo $val["title"];?></a><span class="fr"><?php echo date("Y-m-d", $val["create_time"]);?></span></li>
             <?php
            	} 
             ?>
            </ul>
        </div>
    </div>
<!--main end-->
<!--footer start-->
    <footer>

    </footer>
<!--footer end-->
</body>
</html>
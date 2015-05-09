<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>联系我们（员 ）</title>
    <?php
    	$this->load->view("layout/source_base"); 
    ?>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
</head>
<body>
<!--head start-->
<?php
	$this->load->view("layout/header"); 
?>
<!--head end-->
<div class="mt15 wrap">
    <div class="fl reserve">
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
    <div class="fl ml20 ">
        <div id="map_canvas" style="width:680px; height:500px; border:#ccc 4px solid;">
        </div>
    </div>
</div>

</body>
</html>
<script type="text/javascript">
    var map = new BMap.Map("map_canvas");
    var point = new BMap.Point(118.178273,39.66881);
    map.centerAndZoom(point, 16);
    map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
    map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
    map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
    var opts = {
        width : 160,     // 信息窗口宽度
        height: 35,     // 信息窗口高度
        title : "我们在这里" // 信息窗口标题

    }
    var infoWindow = new BMap.InfoWindow("15010238227", opts);  // 创建信息窗口对象
    map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口
</script>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>酒店管理系统</title>
	<?php
		$this->load->view("layout/source_base"); 
	?>
	<style>
		.fr{
			float: left;
		}
	</style>
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
        <div class="fr xiang ">
            <h2 class="fs16"><?php echo $title;?></h2>
            <p class="pre">酒店新闻 <?php echo date("Y-m-d", $create_time);?></p>
            <div class="clearfix">                
                <p><?php echo $content;?></p>
            </div>
        </div>
    </div>
</body>
</html>
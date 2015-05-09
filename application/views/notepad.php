<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>留言</title>
<?php
	$this->load->view("layout/source_base"); 
?>
	<script type="text/javascript" src="/js/notepad.js"></script>
</head>
<body>
<!--head start-->
<?php
	$this->load->view("layout/header"); 
?>
<!--head end-->
    <form class="liu wrap mt20 p10" id="fm_commit" method="post" action="/notepad/note_submit">
        <p>
        	<input type="hidden" name="user_normal_id" value="<?php echo $user_normal_id;?>"></input>
            <textarea class="fs14" cols="120" rows="3" name="content" placeholder="说点什么吧:"></textarea>
            <a href="" id="a_commit" class="con org">评论</a>
        </p>
    </form>
    <div class="wrap">
        <ul>
        <?php
        	foreach($note_list as $note)
        	{
        ?>
            <li class="item mt15  p10">
                <div class="clearfix">
                    <span class="fl gray fs16"><?php echo $note["user_normal_id"]?></span>
                    <span class="fr"><?php echo date("Y-m-d", $note["create_time"])?></span>
                </div>
                <p class="mt10"><?php echo $note["content"]?></p>
            </li>
         <?php
        	} 
         ?>
        </ul>
    </div>
</body>
</html>
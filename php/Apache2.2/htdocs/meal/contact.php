<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- 注册模块开始 --><!-- 注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
   		<?php
   			$sql_show=mysql_query("select * from tb_contactus order by id desc limit 0,1",$conn); 
			$info_show=mysql_fetch_array($sql_show);
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="contact.php?mod=contact">联系我们</a></div>
            <!-- 文章列表BANNER开始 --> 
            <div class="txt-banner"><img src="images/c-banner.png" /></div>
            <!-- 文章列表BANNER结束 -->
            <!-- 文章详细查看开始 -->
            <div class="show-main-box">
                <div class="nwes-view-tit">联系我们</div>
                <div class="nwes-view-lmname margin-top-20">
                </div>          	

<p>联系人：18716447934(张同学)&nbsp;&nbsp;&nbsp;&nbsp;18883717794(梅同学)</p>
<p>邮箱：634962821#qq.com</p>
<p>QQ：<a target="_blank" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=424321913&amp;Menu=no">854984535</a></p>
<p>地址：重庆市沙坪坝区重庆大学</p>
          </div>
            <!-- 文章详细查看结束 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
   <?php include("bottom.php");?>
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
        <!-- 左边结束 -->/
   		<!-- 右边开始 -->
   		<?php
		     $id=$_GET[id];
			 $sql=mysql_query("select * from tb_gonggao where id='".$id."'",$conn);
			 $info=mysql_fetch_array($sql);
		     include("function.php");
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="showgonggao.php">系统公告</a>- <?php echo unhtml($info[title]);?></div>
            <!-- 文章列表BANNER开始 --> 
            <div class="txt-banner"><img src="images/banner_1.png" /></div>
            <!-- 文章列表BANNER结束 -->
            <!-- 文章详细查看开始 -->
            <div class="show-main-box">
                <div class="nwes-view-tit"><?php echo unhtml($info[title]);?></div>
                <div class="nwes-view-lmname">
                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li>发布时间：<?php echo $info[time];?></li>
                    <li>点击：24</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </div>
            	<?php echo unhtml($info[content]);?>
            </div>
            <!-- 文章详细查看结束 -->
            
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
   <?php include("bottom.php");?>
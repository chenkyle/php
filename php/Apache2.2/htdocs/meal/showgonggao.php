<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- 注册模块开始 -->
    <div class="banner">
        <?php include("zhuce.php");?>
	</div>
    <!-- 注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - 系统公告</div>
            <!-- 文章列表BANNER开始 --> 
            <div class="txt-banner"><img src="images/banner_1.png" /></div>
            <!-- 文章列表BANNER结束 -->
            <div class="list-menu">
                <li class="sort-menu-active"><a href="#">系统公告</a></li>
            </div>
            <!-- 文章列表开始 -->
            <!-- 文章盒子开始 -->
            <?php 
            $sql_showgg=mysql_query("select * from tb_gonggao order by time desc",$conn);
			$info_showgg=mysql_fetch_array($sql_showgg);
			if($info_showgg==false)
			{
				echo "本站暂无该类信息!";
			}
			else
			{
				do
				{
			?>
            <div>
                <li class="txt_title"><span class="txt_title"><a href="showgg.php?id=<?php echo $info_showgg[id];?>"><?php echo $info_showgg[title];?></a></span></li>
                <li class="txt_con"><a href="showgg.php?id=<?php echo $info_showgg[id];?>">
                <?php echo substr($info_showgg[content],0,300);
				if(strlen($info_showgg[content])>300){echo "...";} 
				?></a>
                </li>
                <li class="txt_other"><span class"txt_time">发表于<?php echo $info_showgg[time];?></span>
                <span class="txt_hit">点击：<font color="red">24</font></span><a href="showgg.php?id=<?php echo $info_showgg[id];?>">[查阅全文]</a></li>
            </div>
            <?php }while($info_showgg=mysql_fetch_array($sql_showgg));}?>
            <!-- 文章盒子结束 -->
            
            <!-- 文章列表结束 -->
            <!-- 页码开始 -->
            <div class="page-bottom">
                <span class="page-start"><a href="#" title="上一页"></a></span>
                <span class="page-cur">1</span>
                <a href="#" class="page-no">2</a>
                <a href="#" class="page-no">3</a>
                <a href="#" class="page-no">4</a>
                <a href="#" class="page-no">5</a>
                <span class="page-break">...</span>
                <span class="page-prev"><a href="#" title="下一页"></a></span>
                <li class="page-skip">共9页 到第<input class="page-skip-input" type="text" name="jumpto" id="jumpto" size="3" value="1"/>页 <input class="page-skip-button" type="submit" class="page-skip-button"  value="" title="确定"></li>
			</div>
            <!-- 页码结束 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
   <?php include("bottom.php");?>
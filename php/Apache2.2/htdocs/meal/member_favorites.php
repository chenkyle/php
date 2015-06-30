<?php
session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<!-- 首页注册模块开始 -->
<!-- 首页注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<?php include("member_left.php");?>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 我的收藏夹</div>
            <!-- 会员中心右边首页开始 -->
        	<div class="list-menu">
                    <li class="sort-menu-active"><a>我的收藏</a></li>
            </div>
        	<!-- 商品盒子开始 -->
        	<?php
			$sql_favorites=mysql_query("select sp.*,f.id as fid from tb_shangpin as sp,tb_favorites as f where f.user_name='".$_SESSION[username]."' and sp.id=f.sp_id",$conn);
			$info_favorites=mysql_fetch_array($sql_favorites);
			if($info_favorites==false)
			{
				echo "<br><h1 class=no-info>你还没有添加收藏!</h1>";
			}
			else
			{
				do
				{
			?>
        	<div class="list-column">
            	<div class="list-column-img">
            	<a href="show.php?id=<?php echo $info_favorites[id];?>" title="<?php echo $info1[mingcheng];?>">
            	<?php
				if($info_favorites[tupian]=="")
				{
					echo "暂无图片!";
				}
				else
				{
				?> 
            	<img src="<?php echo "./".$info_favorites[tupian];?>" />
            	</a><?php }	?>
            	</div>
                <div class="list-column-tit">
                <li class="list-column-title"><a href="show.php?id=<?php echo $info_favorites[id];?>" title="<?php echo $info1[mingcheng];?>"><?php echo $info_favorites[mingcheng];?></a></li>
                <li><span class="line-through">订餐价： <?php echo $info_favorites[shichangjia];?>元</span></li>
                <li>会员价： <span class="bold-red"><?php echo $info_favorites[huiyuanjia];?>元</span></li>
                </div>
                <form action="shopping/addgouwuche.php?id=<?php echo $info_favorites[id];?>" method="post">
                <div class="list-column-text">
                    <li>订购数量： <input name="shuliang" class="list-column-no" type="text" value="1" maxlength="2"></li>
                    <li>
                        <select name="pay-Style" id="pay-Style" class="pay-Style">
                            <option value="0">付款方式：</option>
                            <option value="货到付款">货到付款</option>
                        </select>
                    </li>
                </div>
                <div class="list-column-buy">
                    <li class="buy-menu" class="hot-min-box-space">
                   
					</li>
					<li class="shopping-car">
					
                </div>
                </form>
                <div class="list-column-buy">
                	<li><a href="user/deletefavorites.php?id=<?php echo $info_favorites[fid];?>" title="删除收藏">删除收藏</a></li>
                    <li><a href="show.php?id=<?php echo $info_favorites[id];?>#pl" title="查看评价">查看评价</a></li>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php }while($info_favorites=mysql_fetch_array($sql_favorites));}?>
            <!-- 商品盒子结束 -->
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
                <li class="page-skip">
                        共9页 到第<input class="page-skip-input" type="text" name="jumpto" id="jumpto" size="3" value="1"/>页 <input class="page-skip-button" type="submit" class="page-skip-button"  value="" title="确定">
                </li>
			</div>
            <!-- 页码结束 -->
        </div>
        <!-- 会员中心右边首页结束 -->
        </div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
     <?php include("bottom.php");?>
<div class="list-right">
<div class="show-submenu"><a href="index.php">系统首页</a> - 会员中心</div>
<!-- 会员中心右边首页开始 -->
<div class="member-right-tit">我的会员管理</div>
<!-- 会员中心个人资料卡开始 -->
<div class="member-right-box">
<div class="member-right-main">
<li class="member-right-main-tit"><?php echo $_SESSION[username];?></li>
<?php 
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
$sql_u=mysql_query("select r.rank as aa,u.* from tb_user u,tb_rank r where u.rank=r.id and u.name='".$_SESSION[username]."'",$conn); 
$info_u=mysql_fetch_array($sql_u);
?>
<li class="member-right-main-txt">您是我们的（<span class="FF3300"><?php echo $info_u[aa] ;?></span>），欢迎登陆会员管理中心，我们希望为您提供更快捷、方便、周全的订餐服务，感谢您的支持！</li>
<li class="member-right-main-txt">您现在的积分为：<span class="C0099CC"><?php echo $info_u[hisintegral] ;?></span>分，会员信用度：<span
	class="C0099CC"><?php echo $info_u[credit] ;?></span></li>
<li class="member-right-main-menu"><a href="member_info.php">修改资料</a></li>
<li class="member-right-main-menu"><a href="member_pingjia.php">查看评价</a></li>
<li class="member-right-main-menu"><a href="member_shop_allorder.php">我的订单</a></li>
<li class="member-right-main-menu"><a href="member_favorites.php">查看收藏</a></li>
<li class="clearfix "></li>


<li class="member-right-main-gwc">您的购物车共订购了（<span class="FF3300"><?php
$arraygwc=explode("@",$_SESSION[producelist]);//把字符串分割为数组
$num=0;
for($i=0;$i<count($arraygwc);$i++){
	if($arraygwc[$i]!="")
		$num++;
}
echo $num;?></span>）个菜式，点此查看（<a
	href="member_shop_car.php">购物车</a>）</li>
</div>
<!-- 会员中心个人资料卡开始 --> <!-- 会员中心首页订单开始 -->
<div class="member-right-title">最新订单</div>
<div class="member-right-sc">
<?php include("myorder.php");?>
</div>
<!-- 会员中心首页订单结束 --></div>
<!-- 会员中心右边首页开始 --></div>

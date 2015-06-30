<?php
session_start();
include("conn/conn.php");
include("top.php");
?>
<!-- 首页注册模块开始 -->
<div class="banner">
<?php include("zhuce.php");?>
</div>
<!-- 首页注册模块结束 -->

<!-- 首页主体开始 -->
<div class="main"><!-- 首页热门模块开始 -->
<div class="hot">
<div class="hot-menu">
<li class="hot-active"><a href="javascript:void(0)" onclick="show_it.call(this,0)">今日推荐</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,1)">新鲜菜式</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,2)">特价套餐</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,3)">营养套餐</a></li>
</div>

<div class="hot-big-box" id="center_4" style="display: none">
<?php
$sql1=mysql_query("select * from tb_shangpin where tuijian=4 order by addtime desc limit 0,4",$conn);
$info1=mysql_fetch_array($sql1);
if($info1==false)
{
	echo "<li class=no-info>本站暂无营养套餐!</li>";
}
else
{
	do
	{
		?>
<div class="hot-min-box">
<div class="hot-min-box-img">
<a  href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"> <?php
	if($info1[tupian]=="")
	{
		echo "<li class=no-info>暂无图片!</li>";
	}
	else
	{
		?> <img height="100" width="100" src="<?php echo "./".$info1[tupian];?>" /> </a><?php }	?></div>
		<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
		<input type="hidden" name="sid" value=<?php echo $info1[salerID]; ?>>
<div class="hot-min-box-txt">
<ul>
	<a href="lookinfo.php?id=<?php echo $info1[id];?>"
		title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a>
</ul>
<ul class="hot-min-box-price">
	订餐价:
	<?php echo $info1[huiyuanjia];?>
	元
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="放到购物车" value="&nbsp;">
</ul>
</div>
</form>
<div class="clearfix"></div>
</div>
	<?php
	}while($info1=mysql_fetch_array($sql1));
}
?>
</div>


<div class="hot-big-box" id="center_3" style="display: none">
<?php
$sql1=mysql_query("select * from tb_shangpin where tuijian=3 order by addtime desc limit 0,4",$conn);
$info1=mysql_fetch_array($sql1);
if($info1==false)
{
	echo "<li class=no-info>本站暂无特价套餐!</li>";
}
else
{
	do
	{
		?>
<div class="hot-min-box">
<div class="hot-min-box-img">
<a  href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"> <?php
	if($info1[tupian]=="")
	{
		echo "<li class=no-info>暂无图片!</li>";
	}
	else
	{
		?> <img height="100" width="100" src="<?php echo "./".$info1[tupian];?>" /> </a><?php }	?></div>
		<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
		<input type="hidden" name="sid" value=<?php echo $info1[salerID]; ?>>
<div class="hot-min-box-txt">
<ul>
	<a href="lookinfo.php?id=<?php echo $info1[id];?>"
		title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a>
</ul>
<ul class="hot-min-box-price">
	订餐价:
	<?php echo $info1[huiyuanjia];?>
	元
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="放到购物车" value="&nbsp;">
</ul>
</div>
</form>
<div class="clearfix"></div>
</div>
	<?php
	}while($info1=mysql_fetch_array($sql1));
}
?>
</div>
<div class="hot-big-box" id="center_2" style="display: none">
<?php
$sql1=mysql_query("select * from tb_shangpin where tuijian=2 order by addtime desc limit 0,4",$conn);
$info1=mysql_fetch_array($sql1);
if($info1==false)
{
	echo "<li class=no-info>本站暂无最新菜式!</li>";
}
else
{
	do
	{
		?>
<div class="hot-min-box">
<div class="hot-min-box-img">
<a  href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"> <?php
	if($info1[tupian]=="")
	{
		echo "<li class=no-info>暂无图片!</li>";
	}
	else
	{
		?> <img  height="100" width="100"  src="<?php echo "./".$info1[tupian];?>" /> </a><?php }	?></div>
<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">	
<input type="hidden" name="sid" value=<?php echo $info1[salerID]; ?>>	
<div class="hot-min-box-txt">
<ul>
	<a href="lookinfo.php?id=<?php echo $info1[id];?>"
		title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a>
</ul>
<ul class="hot-min-box-price">
	订餐价:
	<?php echo $info1[huiyuanjia];?>
	元
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="放到购物车" value="&nbsp;">
</ul>
</div>
</form>
<div class="clearfix"></div>
</div>
	<?php
	}while($info1=mysql_fetch_array($sql1));
}
?>
</div>
<div class="hot-big-box" id="center_1"><?php
$sql=mysql_query("select count(*) as total from tb_shangpin where tuijian=1 ",$conn);
$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0)
{
	echo "<li class=no-info>本站暂无推荐菜式!</li>";
}
else
{
	$sql1=mysql_query("select * from tb_shangpin where tuijian=1 order by addtime desc limit 0,4",$conn);
	while($info1=mysql_fetch_array($sql1))
	{
		?>
<div class="hot-min-box">
<div class="hot-min-box-img">
<a  href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"> <?php
	if($info1[tupian]=="")
	{
		echo "<li class=no-info>暂无图片!</li>";
	}
	else
	{
		?> <img height="100" width="100" src="<?php echo "./".$info1[tupian];?>" /> </a><?php }	?></div>
<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
<input type="hidden" name="sid" value=<?php echo $info1[salerID]; ?>>
<div class="hot-min-box-txt">
<ul>
	<a href="show.php?id=<?php echo $info1[id];?>"
		title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a>
</ul>
<ul class="hot-min-box-price">
	订餐价:
	<?php echo $info1[huiyuanjia];?>
	元
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="放到购物车" value="&nbsp;">
</ul>
</div>
</form>
<div class="clearfix"></div>
</div>
	<?php
	}
}
?></div>
</div>
<!-- 首页热门模块结束 --> 
<!-- 首页商品分类模块开始 -->
<div class="sort">
<div class="sort-menu">
<li class="sort-menu-active"><a href="javascript:void(0)" onclick="show_itlb.call(this,0)">菜谱分类</a></li>
</div>
<div class="sort-box" id="center1">
<?php
$sql_lb=mysql_query("select * from tb_type order by id desc limit 0,7",$conn);
$info_lb=mysql_fetch_array($sql_lb);
if($info_lb==false)
{
	echo "<li class=no-info>本站暂无该类菜式!</li>";
}
else
{
	do
	{
		?>
<ul>
	<li class="sort-box-tit"><a href="#"><?php echo $info_lb[typename];?></a></li>
	<?php
$sql_zs=mysql_query("select * from tb_shangpin where typeid='".$info_lb[id]."' order by typeid desc limit 0,5",$conn);
$info_zs=mysql_fetch_array($sql_zs);
if($info_zs==false)
{
	echo "<li class=no-info>本站暂无该类菜式!</li>";
}
else
{
	do
	{
		?>
	<li class="sort-box-txt"><a href="show.php?id=<?php echo $info_zs[id];?>">
	<?php
		if($info_zs[tuijian]=="1"){
			echo "<span class='commend'>";
			echo substr($info_zs[mingcheng],0,12);
			if(strlen($info_zs[mingcheng])>12){echo "...";} 
			echo "</span>";
		}else{
			echo substr($info_zs[mingcheng],0,12);
			if(strlen($info_zs[mingcheng])>12){echo "...";} 
		}
	?>
	</a></li>
	<?php }while($info_zs=mysql_fetch_array($sql_zs));
}
	?>
</ul>
<?php }while($info_lb=mysql_fetch_array($sql_lb));
}
	?>
</div>
</div>
<!-- 首页商品分类模块结束 --></div>
<?php include("bottom.php");?>
<?php
session_start();
include("conn/conn.php");
include("top.php");
?>
<!-- ��ҳע��ģ�鿪ʼ -->
<div class="banner">
<?php include("zhuce.php");?>
</div>
<!-- ��ҳע��ģ����� -->

<!-- ��ҳ���忪ʼ -->
<div class="main"><!-- ��ҳ����ģ�鿪ʼ -->
<div class="hot">
<div class="hot-menu">
<li class="hot-active"><a href="javascript:void(0)" onclick="show_it.call(this,0)">�����Ƽ�</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,1)">���ʲ�ʽ</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,2)">�ؼ��ײ�</a></li>
<li class="hot-menu-off"><a href="javascript:void(0)" onclick="show_it.call(this,3)">Ӫ���ײ�</a></li>
</div>

<div class="hot-big-box" id="center_4" style="display: none">
<?php
$sql1=mysql_query("select * from tb_shangpin where tuijian=4 order by addtime desc limit 0,4",$conn);
$info1=mysql_fetch_array($sql1);
if($info1==false)
{
	echo "<li class=no-info>��վ����Ӫ���ײ�!</li>";
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
		echo "<li class=no-info>����ͼƬ!</li>";
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
	���ͼ�:
	<?php echo $info1[huiyuanjia];?>
	Ԫ
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;">
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
	echo "<li class=no-info>��վ�����ؼ��ײ�!</li>";
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
		echo "<li class=no-info>����ͼƬ!</li>";
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
	���ͼ�:
	<?php echo $info1[huiyuanjia];?>
	Ԫ
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;">
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
	echo "<li class=no-info>��վ�������²�ʽ!</li>";
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
		echo "<li class=no-info>����ͼƬ!</li>";
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
	���ͼ�:
	<?php echo $info1[huiyuanjia];?>
	Ԫ
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;">
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
	echo "<li class=no-info>��վ�����Ƽ���ʽ!</li>";
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
		echo "<li class=no-info>����ͼƬ!</li>";
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
	���ͼ�:
	<?php echo $info1[huiyuanjia];?>
	Ԫ
</ul>
<ul class="buy-menu" class="hot-min-box-space">
	<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
</ul>
<ul class="shopping-car">
	<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;">
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
<!-- ��ҳ����ģ����� --> 
<!-- ��ҳ��Ʒ����ģ�鿪ʼ -->
<div class="sort">
<div class="sort-menu">
<li class="sort-menu-active"><a href="javascript:void(0)" onclick="show_itlb.call(this,0)">���׷���</a></li>
</div>
<div class="sort-box" id="center1">
<?php
$sql_lb=mysql_query("select * from tb_type order by id desc limit 0,7",$conn);
$info_lb=mysql_fetch_array($sql_lb);
if($info_lb==false)
{
	echo "<li class=no-info>��վ���޸����ʽ!</li>";
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
	echo "<li class=no-info>��վ���޸����ʽ!</li>";
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
<!-- ��ҳ��Ʒ����ģ����� --></div>
<?php include("bottom.php");?>
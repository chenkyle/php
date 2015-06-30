<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>查看订单</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script src="../css/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	if(top.checkBoxList)top.checkBoxList($(".checkBoxList-item"),$(".checkBoxList-btn"));
});
</script>
</head>
<body>
<div class="main"><?php
include("../conn/conn.php");
?> 
<?php

$now_date=date("Y-m-j");
$now_time=date("H:i:s");
$now=$now_date." ".$now_time;

$sql_breakfast=mysql_query("select * from tb_dingcantime where type='0' order by id desc limit 0,1",$conn);
$sql_lunch=mysql_query("select * from tb_dingcantime where type='1' order by id desc limit 0,1",$conn);
$sql_dinner=mysql_query("select * from tb_dingcantime where type='2' order by id desc limit 0,1",$conn);

$info_breakfast=mysql_fetch_array($sql_breakfast);
$info_lunch=mysql_fetch_array($sql_lunch);
$info_dinner=mysql_fetch_array($sql_dinner);

$begintime="";
$endtime="";
$text="";
$key='未作任何处理';

if($info_breakfast[begintime]<$now_time && $now_time<$info_breakfast[endtime]){
	$begintime=$now_date." ".$info_breakfast[begintime];
	$endtime=$now_date." ".$info_breakfast[endtime];
	$text="今日早餐未处理订单信息";
	$sql=mysql_query("select count(*) as total from tb_dingdan where isdelete=1 and time>='".date($begintime)."' and time<='".date($endtime)."' and zt like '%".$key."%'",$conn);
}else if($info_lunch[begintime]<$now_time && $now_time<$info_lunch[endtime]){
	$begintime=$now_date." ".$info_lunch[begintime];
	$endtime=$now_date." ".$info_lunch[endtime];
	$text="今日午餐未处理订单信息";
	$sql=mysql_query("select count(*) as total from tb_dingdan where isdelete=1 and time>='".date($begintime)."' and time<='".date($endtime)."' and zt like '%".$key."%'",$conn);
}else if($info_dinner[begintime]<$now_time && $now_time<$info_dinner[endtime]){
	$begintime=$now_date." ".$info_dinner[begintime];
	$endtime=$now_date." ".$info_dinner[endtime];
	$text="今日晚餐未处理订单信息";
	$sql=mysql_query("select count(*) as total from tb_dingdan where isdelete=1 and time>='".date($begintime)."' and time<='".date($endtime)."' and zt like '%".$key."%'",$conn);
}else{
	$text="今日未处理订单信息";
	$sql=mysql_query("select count(*) as total from tb_dingdan where isdelete=1 and TO_DAYS(time)=TO_DAYS(NOW()) and zt like '%".$key."%'",$conn);
}
$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0){
	echo "本站暂无订单!";
}
else{
	$pagesize=10;
	if ($total<=$pagesize){
		$pagecount=1;
	}
	if(($total%$pagesize)!=0){
		$pagecount=intval($total/$pagesize)+1;
	}else{
		$pagecount=$total/$pagesize;
	}
	if(($_GET[page])==""){
		$page=1;
	}else{
		$page=intval($_GET[page]);
	}
	if($begintime=="" && $endtime==""){
		$sql1=mysql_query("select * from tb_dingdan where isdelete=1 and TO_DAYS(time)=TO_DAYS(NOW()) and zt like '%".$key."%' order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
	}else{
		$sql1=mysql_query("select * from tb_dingdan where isdelete=1 and time>='".date($begintime)."' and time<='".date($endtime)."' and zt like '%".$key."%' order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
	}
	$info1=mysql_fetch_array($sql1);
	?>
<form name="form1" method="post" action="../delete/deletedd.php">
<table>
	<tr>
		<td colspan="8">
		<div class="main-title"><?php echo $text;?></div>
		</td>
	</tr>
	<tr class="main-tit">
		<td>下单时间</td>
		<td>订单号</td>
		<td>订餐人</td>
		<td>收货人</td>
		<td>金额总计</td>
		<!--        <td>付款方式</td>-->
		<td>订单状态</td>
		<td>操作</td>
	</tr>
	<?php
	do{
		?>
	<tr>
		<td><?php echo $info1[time];?></td>
		<td><?php echo $info1[dingdanhao];?></td>
		<td><?php echo $info1[xiadanren];?></td>
		<td><?php echo $info1[shouhuoren];?></td>
		<td><?php echo $info1[total];?></td>
		<td><?php echo $info1[zt];?></td>
		<td><input name="button2" type="button" class="buttoncss" id="button2"
			onClick="javascript:window.location='../show/showdd.php?id=<?php echo $info1[id];?>';"
			value="查看"> &nbsp;
			</td>
	</tr>
	<?php
	}while($info1=mysql_fetch_array($sql1));
	?>
	<tr>
		<td colspan="6">
		<div class="main-bottom">本站共有订单 <?php
		echo $total;
		?> &nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;
		<?php
		if($page>=2)
		{
			?> <a href="../look/lookfadd.php?page=1" title="首页"><font size="3">首页 </font></a>
		<a
			href="../look/lookfadd.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>"
			title="前一页"><font size="3">前一页 </font></a> <?php
		}
		if($pagecount<=4){
			for($i=1;$i<=$pagecount;$i++){
		  ?> <a href="../look/lookfadd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
		  <?php
			}
		}else{
			for($i=1;$i<=4;$i++){
		  ?> <a href="../look/lookfadd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
		  <?php }?> <a href="../look/lookfadd.php?page=<?php echo $page+1;?>"
			title="后一页"><font size="3"> 后一页 </font></a> <a
			href="../look/lookfadd.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>"
			title="尾页"><font size="3"> 尾页 </font></a> <?php }?></div>
		</td>

	</tr>
</table>
		  <?php
}
?></form>
</div>
</body>
</html>

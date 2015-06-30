<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>销售统计</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<?php
include("conn/conn.php");
?>
<body>
<div class="main">
<form name="form1" method="post" action="adminquartersale.php">
<div align="center"><input type="radio" name="conditions"
	value="1000000" >一天&nbsp;&nbsp; <input type="radio"
	name="conditions" value="7000000" checked>一周&nbsp;&nbsp; <input type="radio"
	name="conditions" value="100000000">一月&nbsp;&nbsp; <input type="radio"
	name="conditions" value="10000000000">一年
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="hidden"
	value="show_find" name="show_find"> <input type="submit" value="统计" /></div>
</form>
<?php
if($_POST[show_find]!=""){
	$conditions=$_POST[conditions];
	$sql=mysql_query("select * from tb_dingdan where now()-time<'".$conditions."'",$conn);
	//	$sql=mysql_query("select * from 表 where now()-time<7000000",$conn);	
	$info=mysql_fetch_array($sql);
	if($info==false){
		echo "<div algin='center'><br><h2>对不起,没有查找到该记录!</h2></div>";  
	}
	else{
		?>
<table>
	<tr>
		<td colspan="5"><div class="main-title">查询结果</td>
	</tr>
			<tr class="main-tit">
				<td>订单号</td>
				<td>下单时间</td>
				<td>收货人</td>
				<td>金额</td>
				<td>操作</td>
			</tr>
			<?php
			do{
				?>
			<tr>
				<td><?php echo $info[dingdanhao];?></td>
				<td><?php echo $info[time];?></td>
				<td><?php echo $info[shouhuoren];?></td>
				<td><?php echo $info[total];?></td>
				<td><a href="show/showsale.php?spc=<?php echo $info[spc];?>&slc=<?php echo $info[slc];?>&dingdanhao=<?php echo $info[dingdanhao];?>&total=<?php echo $info[total];?>">查看明细</a></td>
			</tr>
			<?php
			$sum_total+=$info[total];
			}while($info=mysql_fetch_array($sql));
			?>
			<tr>
				<td colspan="5"><div class="main-bottom">总销售额为：<?php echo $sum_total;?></div>
				</td>
			</tr>
</table>
			<?php
	}
}
?>
</div>
</body>
</html>

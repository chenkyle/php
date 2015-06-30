<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>销售统计</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
<script src="js/Calendar.js"></script>
</head>
<script language="javascript">
	function chkinput3(form){if((form.fromdate.value=="")&&(form.todate.value=="")){alert("请输入查询时间");form.fromdate.select();return(false);}return(true);}
</script>
<?php
include("conn/conn.php");

session_start();
$salename = $_SESSION["salername"];

$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='卖家'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];



?>
<body>
<div class="main">
<form name="form1" method="post" action="admintimesale.php"
	onSubmit="return chkinput3(this)">
<div align="center">从&nbsp;<input type="text" name="fromdate" readOnly
	onclick="setDayHM(this);"> 到&nbsp;<input type="text" name="todate"
	readOnly onClick="setDayHM(this);">&nbsp;期间销售记录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" value="show_find" name="show_find"> <input
	type="submit" value="统计" /></div>
</form>
<?php
if($_POST[show_find]!=""){
	$fromdate=$_POST[fromdate];
	$todate=$_POST[todate];
	$sql=mysql_query("select * from tb_dingdan where salerid='".$salerid."' and time between '".$fromdate."' and '".$todate."' order by time",$conn);
	$info=mysql_fetch_array($sql);
	if($info==false){
		echo "<div algin='center'><br><h2>对不起,没有查找到该记录!</h2></div>";
	}
	else{
		?>
<table>
	<tr>
		<td colspan="5"><div class="main-title">查询结果</div></td>
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
				<td><a href="show/showsale.php?spc=<?php echo $info[spc];?>&slc=<?php echo $info[slc];?>&dingdanhao=<?php echo $info[dingdanhao];?>&total=<?php echo $info[total];?>">查看明细</a>
				</td>
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

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����ͳ��</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<?php
include("conn/conn.php");
?>
<body>
<div class="main">
<form name="form1" method="post" action="adminquartersale.php">
<div align="center"><input type="radio" name="conditions"
	value="1000000" >һ��&nbsp;&nbsp; <input type="radio"
	name="conditions" value="7000000" checked>һ��&nbsp;&nbsp; <input type="radio"
	name="conditions" value="100000000">һ��&nbsp;&nbsp; <input type="radio"
	name="conditions" value="10000000000">һ��
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="hidden"
	value="show_find" name="show_find"> <input type="submit" value="ͳ��" /></div>
</form>
<?php
if($_POST[show_find]!=""){
	$conditions=$_POST[conditions];
	$sql=mysql_query("select * from tb_dingdan where now()-time<'".$conditions."'",$conn);
	//	$sql=mysql_query("select * from �� where now()-time<7000000",$conn);	
	$info=mysql_fetch_array($sql);
	if($info==false){
		echo "<div algin='center'><br><h2>�Բ���,û�в��ҵ��ü�¼!</h2></div>";  
	}
	else{
		?>
<table>
	<tr>
		<td colspan="5"><div class="main-title">��ѯ���</td>
	</tr>
			<tr class="main-tit">
				<td>������</td>
				<td>�µ�ʱ��</td>
				<td>�ջ���</td>
				<td>���</td>
				<td>����</td>
			</tr>
			<?php
			do{
				?>
			<tr>
				<td><?php echo $info[dingdanhao];?></td>
				<td><?php echo $info[time];?></td>
				<td><?php echo $info[shouhuoren];?></td>
				<td><?php echo $info[total];?></td>
				<td><a href="show/showsale.php?spc=<?php echo $info[spc];?>&slc=<?php echo $info[slc];?>&dingdanhao=<?php echo $info[dingdanhao];?>&total=<?php echo $info[total];?>">�鿴��ϸ</a></td>
			</tr>
			<?php
			$sum_total+=$info[total];
			}while($info=mysql_fetch_array($sql));
			?>
			<tr>
				<td colspan="5"><div class="main-bottom">�����۶�Ϊ��<?php echo $sum_total;?></div>
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

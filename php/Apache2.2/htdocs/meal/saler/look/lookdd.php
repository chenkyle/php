<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���¶���</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script type="text/javascript" src="../js/bookorder.js"></script>
</head>
<div class="main">
<table>
	<tr>
		<td>
		<div class="main-title">���¶���</div>
		</td>
	</tr>
</table>
<?php
include("../conn/conn.php");
session_start();
$salename = $_SESSION["salername"];

$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='����'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];



$key='δ���κδ���';

	//$sql1=mysql_query("select * from tb_dingdan where TO_DAYS(time)=TO_DAYS(NOW())  and id > ".$lastId." and zt='".$key."' order by time asc",$conn);
$sql1=mysql_query("select * from tb_dingdan where salerid='".$salerid."' and zt='".$key."' order by time asc",$conn);
//echo "select * from tb_dingdan where and salerid='".$salerid."' and zt='".$key."' order by time asc";
?>


<form name="form1" method="post" action="lookdd_save.php">
<div id="msgDiv"></div>
<table>
<?php
	while($info1=mysql_fetch_array($sql1))
	{?>
	<tr>
		<td colspan="8">
		<input type="checkbox" name="<?php echo $info1[id]; ?>" value="<?php echo $info1[id]; ?>">
		</td>
		<td>�ͻ���&nbsp;&nbsp;<?php echo $info1[xiadanren]; ?>&nbsp;&nbsp;��&nbsp;&nbsp;<?php echo $info1[time]; ?>&nbsp;&nbsp;���ͣ�������Ϊ��&nbsp;&nbsp;<a href="../show/showdd.php?id=<?php echo $info1[id]; ?>"><?php echo $info1[dingdanhao]; ?></a></td>
	</tr>
		
	<?php }

?>
<tr align="left"><td>&nbsp;&nbsp;<input type="submit" name="submit" value="����" class="buttoncss"></td></tr>
</table>
</form>

</div>
</body>
</html>

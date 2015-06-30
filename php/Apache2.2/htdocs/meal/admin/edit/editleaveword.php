<html>
<head>
<title>编辑留言</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
include("../conn/conn.php");
$id=$_GET[id];
$sql=mysql_query("select * from tb_leaveword where id='".$id."'",$conn);
$info=mysql_fetch_array($sql);
?>
<body>
<div class="main">
<table>
	<tr>
		<td colspan="2">
		<div class="main-title">留言编辑</div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">留言主题:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[title];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">留言时间:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[time];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">留言内容:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[content];?></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<div align="center">&nbsp;<input type="button" value="返回"
			class="buttoncss" onClick="javascript:history.back();"></div>
		</td>
	</tr>
</table>

</body>
</html>

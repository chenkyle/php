<html>
<head>
<title>查看消息</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
include("../conn/conn.php");
$id=$_GET[id];
$sql=mysql_query("select * from tb_message where id='".$id."'",$conn);
$info=mysql_fetch_array($sql);
$sql_user=mysql_query("select * from tb_user where id='".$info[user_id]."'",$conn);
$info_user=mysql_fetch_array($sql_user);
$sql_senduser=mysql_query("select * from tb_admin where id='".$info[send_id]."'",$conn);
$info_senduser=mysql_fetch_array($sql_senduser);
?>
<body>
<div class="main">
<table>
	<tr>
		<td colspan="2">
		<div class="main-title">查看消息</div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">标题:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[title];?></div>
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
		<td>
		<div align="center">时间:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[time];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">收件人:</div>
		</td>
		<td>
		<div align="left"><?php echo $info_user[name];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">发件人:</div>
		</td>
		<td>
		<div align="left"><?php echo $info_senduser[name];?></div>
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

<html>
<head>
<title>�鿴��Ϣ</title>
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
		<div class="main-title">�鿴��Ϣ</div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">����:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[title];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">��������:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[content];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">ʱ��:</div>
		</td>
		<td>
		<div align="left"><?php echo $info[time];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">�ռ���:</div>
		</td>
		<td>
		<div align="left"><?php echo $info_user[name];?></div>
		</td>
	</tr>
	<tr>
		<td>
		<div align="center">������:</div>
		</td>
		<td>
		<div align="left"><?php echo $info_senduser[name];?></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<div align="center">&nbsp;<input type="button" value="����"
			class="buttoncss" onClick="javascript:history.back();"></div>
		</td>
	</tr>
</table>

</body>
</html>

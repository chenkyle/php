<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����ͳ��</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
include("../conn/conn.php");
?>
<body>
<div class="main">
<?php
$spc=explode("@",$_GET[spc]);
$slc=explode("@",$_GET[slc]);
$dingdanhao=$_GET[dingdanhao];
$total=$_GET[total];
?>
<table>
	<tr>
		<td colspan="4"><div class="main-title">������ϸ</div></td>
	</tr>
			<tr class="main-tit">
				<td >������</td>
				<td>�˵���</td>
				<td>����</td>
				<td>����</td>
			</tr>
			<?php
			while((list($value1,$name1)=each($spc))&& (list($value2,$name2)=each($slc)) ){
				$sql=mysql_query("select * from tb_shangpin where id='".$name1."'",$conn);
				$info=mysql_fetch_array($sql);
				if($info==true)
				{
					?>
			<tr>
				<td><?php echo $dingdanhao;?></td>
				<td><?php echo $info[mingcheng];?></td>
				<td><?php echo $info[huiyuanjia];?></td>
				<td><?php echo $name2;?></td>
			</tr>
			<?php
				}
			}
			?>
			<tr>
				<td colspan="4">�ܶ�Ϊ��<?php echo $total;?></td>
			</tr>
</table>
<br>
<input type="button" onClick="history.back();"
	value="����" class="buttoncss">
	</div>
</body>
</html>

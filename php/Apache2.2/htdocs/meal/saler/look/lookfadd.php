<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ѷ�������</title>
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
?> <?php
session_start();
$salename = $_SESSION["salername"];

$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='����'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];

$now_date=date("Y-m-j");
$now_time=date("H:i:s");
$now=$now_date." ".$now_time;

$key='�ѷ���';

$sql=mysql_query("select count(*) as total from tb_dingdan where salerid='".$salerid."' and zt like '%".$key."%'",$conn);


$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0){
	echo "��վ���޶���!";
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
		$sql1=mysql_query("select * from tb_dingdan where salerid='".$salerid."' and zt like '%".$key."%' order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
	}else{
		$sql1=mysql_query("select * from tb_dingdan where salerid='".$salerid."' and zt like '%".$key."%' order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
	}
	$info1=mysql_fetch_array($sql1);
	?>
<form name="form1" method="post" action="../show/showdd_print.php">
<table>
	<tr>
		<td colspan="8">
		<div class="main-title"><?php echo $text;?></div>
		</td>
	</tr>
	<tr class="main-tit">
		<td>�µ�ʱ��</td>
		<td>������</td>
		<td>������</td>
		<td>�ջ���</td>
		<td>����ܼ�</td>
		<td>����״̬</td>
		<td>����</td>
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
			value="�鿴"> &nbsp; <input name="button2" type="button"
			class="buttoncss" id="button2"
			onClick="javascript:window.location='../orderdd.php?id=<?php echo $info1[id];?>';"
			value="ִ��"> <input type="checkbox" class="checkBoxList-item" name=<?php echo $info1[id];?>
			value=<?php echo $info1[id];?>></td>
	</tr>
	<?php
	}while($info1=mysql_fetch_array($sql1));
	?>
	<tr>
		<td colspan="6">
		<div class="main-bottom">��վ���ж��� <?php
		echo $total;
		?> &nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;
		<?php
		if($page>=2)
		{
			?> <a href="../look/lookfadd.php?page=1" title="��ҳ"><font size="3">��ҳ </font></a>
		<a
			href="../look/lookfadd.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>"
			title="ǰһҳ"><font size="3">ǰһҳ </font></a> <?php
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
			title="��һҳ"><font size="3"> ��һҳ </font></a> <a
			href="../look/lookfadd.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>"
			title="βҳ"><font size="3"> βҳ </font></a> <?php }?></div>
		</td>
		<td><input type="hidden" name="page_id" value=<?php echo $page;?>><input
			class="buttoncss-del checkBoxList-btn" type="submit" value="��ӡ����"></td>
	</tr>
</table>
		  <?php
}
?></form>
</div>
</body>
</html>
<?php
include("../conn/conn.php");
$uid=$_GET[uid];
$active=$_GET[active];
$sql=mysql_query("select * from tb_user where id=".$uid,$conn);
$info=mysql_fetch_array($sql);
if($info[isactive]==$active){
	mysql_query("update tb_user set isactive='true' where id='".$uid."'",$conn);
	echo "<script>alert('�˻�����ɹ�!');window.location='../regsiter_seccessful.php?n=".$info[name]."';</script>";
}else{
	echo "<script>alert('".$active."�˻�����ʧ��!');window.location='../regsiter_mail.php?uid=".$uid."&active=".$active."&email=".$info[email]."';</script>";
}
?>
<?php
include("../conn/conn.php");
$uid=$_GET[uid];
$active=$_GET[active];
$sql=mysql_query("select * from tb_user where id=".$uid,$conn);
$info=mysql_fetch_array($sql);
if($info[isactive]==$active){
	mysql_query("update tb_user set isactive='true' where id='".$uid."'",$conn);
	echo "<script>alert('账户激活成功!');window.location='../regsiter_seccessful.php?n=".$info[name]."';</script>";
}else{
	echo "<script>alert('".$active."账户激活失败!');window.location='../regsiter_mail.php?uid=".$uid."&active=".$active."&email=".$info[email]."';</script>";
}
?>
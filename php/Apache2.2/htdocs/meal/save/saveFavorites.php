<?php
session_start();
include("../conn/conn.php");
if($_SESSION[username]==""){
	echo "<script>alert('����û�е�¼!');window.location.href='../login.php';</script>";
	exit;
}
$sp_id=$_GET[sp_id];
$username=$_SESSION[username];

$sql=mysql_query("select count(*) as total from tb_favorites where sp_id=".$sp_id,$conn);
$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0){
	mysql_query("insert into tb_favorites (sp_id,user_name) values ('$sp_id','$username')",$conn);
	echo "<script>alert('����ղؼгɹ�!');history.back();</script>";
}else{
	echo "<script language='javascript'>alert('�ղؼ��Ѵ��ڸò�ʽ��');history.back();</script>";
	exit;
}
?>
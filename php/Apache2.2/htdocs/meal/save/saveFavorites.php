<?php
session_start();
include("../conn/conn.php");
if($_SESSION[username]==""){
	echo "<script>alert('您还没有登录!');window.location.href='../login.php';</script>";
	exit;
}
$sp_id=$_GET[sp_id];
$username=$_SESSION[username];

$sql=mysql_query("select count(*) as total from tb_favorites where sp_id=".$sp_id,$conn);
$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0){
	mysql_query("insert into tb_favorites (sp_id,user_name) values ('$sp_id','$username')",$conn);
	echo "<script>alert('添加收藏夹成功!');history.back();</script>";
}else{
	echo "<script language='javascript'>alert('收藏夹已存在该菜式！');history.back();</script>";
	exit;
}
?>
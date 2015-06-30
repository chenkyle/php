<?php
session_start();
$title=$_POST[title];
$type=$_POST[type];
$content=$_POST[content];
$time=date("Y-m-j");
include("../conn/conn.php");

$sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
$info=mysql_fetch_array($sql);
$userid=$info[id];
mysql_query("insert into tb_leaveword (title,type,content,time,userid) values ('$title','$type','$content','$time','$userid')",$conn);
echo "<script>alert('感谢您的意见建议!');history.back();</script>";
?>
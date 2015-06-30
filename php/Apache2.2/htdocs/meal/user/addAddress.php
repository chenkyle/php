<?php
session_start();
include("../conn/conn.php");
$name=$_POST[name];
$tel=$_POST[tel];
$qq=$_POST[qq];
$address=$_POST[address];
$lianxitel=$_POST[lianxitel];
$email=$_POST[email];
$addtime=date("Y-m-j");
$sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
$info=mysql_fetch_array($sql);
$user_id=$info[id];
mysql_query("insert into tb_address (name,lianxitel,tel,qq,address,addtime,user_id,email) values ('$name','$lianxitel','$tel','$qq','$address','$addtime','$user_id','$email')",$conn);
header("location:../member_add.php");
?>
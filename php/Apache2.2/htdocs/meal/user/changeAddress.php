<?php
session_start();
include("../conn/conn.php");
$addr_id=$_GET[addr_id];
$name=$_POST[name];
$tel=$_POST[tel];
$qq=$_POST[qq];
$address=$_POST[address];
$lianxitel=$_POST[lianxitel];
$email=$_POST[email];
$addtime=date("Y-m-j");
mysql_query("update tb_address set name='".$name."',lianxitel='".$lianxitel."',tel='".$tel."',qq='".$qq."',address='".$address."',addtime='".$addtime."',email='".$email."' where id='".$addr_id."'",$conn);
header("location:../member_add.php");
?>
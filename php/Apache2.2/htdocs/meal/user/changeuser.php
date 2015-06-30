<?php
include("../conn/conn.php");
$email=$_POST[email];
$truename=$_POST[truename];
$tel=$_POST[tel];
$qq=$_POST[qq];
$dizhi=$_POST[dizhi];
$lianxitel=$_POST[lianxitel];
mysql_query("update tb_user set email='$email',truename='$truename',lianxitel='$lianxitel',tel='$tel',qq='$qq',dizhi='$dizhi'",$conn);
//header("location:../member_info.php");
echo "<script>alert('ÐÞ¸Ä³É¹¦!');window.location.href='../member_info.php';</script>";
?>
<?php
include("../conn/conn.php");
$title=$_POST[title];
$content=$_POST[EditorDefault];
$time=date("Y-m-j H:i:s");
mysql_query("insert into tb_contactus(title,content,time)values('$title','$content','$time')",$conn);
echo "<script>alert('添加信息成功!');window.location.href='../admincontactus.php';</script>";
?>
<?php
include("../conn/conn.php");
$title=$_POST[title];
$content=$_POST[EditorDefault];
$time=date("Y-m-j");
$typeid=$_POST[typeid];
mysql_query("insert into tb_health(title,content,time,typeid)values('$title','$content','$time','$typeid')",$conn);
echo "<script>alert('��ʳ������Ϣ��ӳɹ�!');window.location.href='../adminhealth.php';</script>";
?>

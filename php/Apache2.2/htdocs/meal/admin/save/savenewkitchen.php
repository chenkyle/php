<?php
 include("../conn/conn.php");
 $title=$_POST[title];
 $content=$_POST[EditorDefault];
 $time=date("Y-m-j");
 mysql_query("insert into tb_kitchen (title,content,time) values ('$title','$content','$time')",$conn);
 echo "<script>alert('���ӳɹ�!');window.location.href='../adminkitchen.php';</script>";
?>
<?php
 include("../conn/conn.php");
 $title=$_POST[title];
 $content=$_POST['EditorDefault'];
 $time=date("Y-m-j");
 mysql_query("insert into tb_gonggao (title,content,time) values ('$title','$content','$time')",$conn);
 echo "<script>alert('公告添加成功!');window.location.href='../admingonggao.php';</script>";
?>
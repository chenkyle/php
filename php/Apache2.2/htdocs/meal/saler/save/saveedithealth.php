<?php
  $title=$_POST[title];
  $content=$_POST[EditorDefault];
  $time=date("Y-m-j");
  $typeid=$_POST[typeid];
  include("../conn/conn.php");
  mysql_query("update tb_health set title='$title',content='$content',time='$time',typeid='$typeid' where id='".$_POST[id]."'",$conn);
  echo "<script>alert('ÐÞ¸Ä³É¹¦!');window.location.href='../adminhealth.php';</script>";
?>
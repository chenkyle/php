<?php
  $title=$_POST[title];
  $content=$_POST[EditorDefault];
  $time=date("Y-m-j H:i:s");
  include("../conn/conn.php");
  mysql_query("update tb_contactus set title='$title',content='$content',time='$time' where id='".$_POST[id]."'",$conn);
  echo "<script>alert('�޸ĳɹ�!');window.location.href='../admincontactus.php';</script>";
?>
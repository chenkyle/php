<?php
  $title=$_POST[title];
  $content=$_POST[EditorDefault];
  include("../conn/conn.php");
  mysql_query("update tb_gonggao set title='$title',content='$content' where id='".$_POST[id]."'",$conn);
  echo "<script>alert('�����޸ĳɹ�!');window.location.href='../admingonggao.php';</script>";
?>
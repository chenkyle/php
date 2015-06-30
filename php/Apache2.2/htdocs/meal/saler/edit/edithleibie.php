<?php
  $leibie=$_POST[leibie];
  include("../conn/conn.php");
  mysql_query("update tb_health_type set typename='$leibie' where id='".$_POST[lb]."'",$conn);
  echo "<script>alert('类别修改成功!');window.location.href='../show/showhealthleibie.php';</script>";
?>
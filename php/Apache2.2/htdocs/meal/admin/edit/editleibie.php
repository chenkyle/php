<?php
  $leibie=$_POST[leibie];
  include("../conn/conn.php");
  mysql_query("update tb_type set typename='$leibie' where id='".$_POST[lb]."'",$conn);
  echo "<script>alert('����޸ĳɹ�!');window.location.href='../show/showleibie.php';</script>";
?>
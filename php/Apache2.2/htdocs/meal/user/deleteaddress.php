<?php
 include("../conn/conn.php");
  $id=$_GET[id];
  mysql_query("delete from tb_address where id='".$id."'",$conn);
 header("location:../member_add.php");  
?>
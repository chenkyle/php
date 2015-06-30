<?php
 include("../conn/conn.php");
  $id=$_GET[id];
  mysql_query("delete from tb_favorites where id='".$id."'",$conn);
 header("location:../member_favorites.php");  
?>
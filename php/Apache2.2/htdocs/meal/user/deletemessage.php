<?php
 include("../conn/conn.php");
  $id=$_GET[id];
  mysql_query("delete from td_message where id='".$id."'",$conn);
 header("location:../member_mail.php");  
?>
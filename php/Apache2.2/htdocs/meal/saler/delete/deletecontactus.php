<?php
 include("../conn/conn.php");
 while(list($name,$value)=each($_POST))
  {
      mysql_query("delete from tb_contactus where id='".$value."'",$conn);
  }
 header("location:../admincontactus.php"); 
?>
<?php
include("../conn/conn.php");
while(list($name,$value)=each($_POST)){
 mysql_query("delete from tb_health_type where id='".$value."'",$conn);
 }
 header("location:../show/showhealthleibie.php");
?>
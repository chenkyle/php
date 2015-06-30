<?php
include("../conn/conn.php");
while(list($name,$value)=each($_POST))
 {
     $id=$value;
     if($_POST[cz]=='0'){
     	mysql_query("delete from tb_pingjia where id=".$id."",$conn);
     }else if($_POST[cz]=='1'){
     	mysql_query("update tb_pingjia set isshow=1 where id=".$id."",$conn);
     }else{
     	mysql_query("update tb_pingjia set isshow=0 where id=".$id."",$conn);
     }
 }
 echo "<script>alert('ÐÞ¸Ä³É¹¦!');window.location.href='../edit/editpinglun.php';</script>";
?>
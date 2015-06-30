<?php
session_start();
 include("../conn/conn.php");
 $title=$_POST[title];
 $content=$_POST[content];
 $time=date("Y-m-j H:i:s");
 $state=0;
 $is_delete=0;
 $sql1=mysql_query("select * from tb_admin where name='".$_SESSION[admin]."'",$conn);
 $info1=mysql_fetch_array($sql1);
 $sid=$info1[id];
// $uid=$_POST[uid];
// if($uid=="") 

 $sql_uid=mysql_query("select * from tb_user",$conn);
 $info_uid=mysql_fetch_array($sql_uid);
 do{
 	$uid=$info_uid[id];
 	mysql_query("insert into tb_message(title,content,state,time,user_id,send_id,is_delete) values ('$title','$content','$state','$time','$uid','$sid','$is_delete')",$conn);
 }while($info_uid=mysql_fetch_array($sql_uid));
 
 header("location:../adminmessage.php");
?>
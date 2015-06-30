<?php
  $page=intval($_POST[page_id]);
  include("../conn/conn.php");
  while(list($value,$name)=each($_POST))
   {  
//     mysql_query("delete from tb_dingdan where id='".$value."'",$conn);
     mysql_query("update tb_dingdan set isdelete=0 where id='".$value."'",$conn);
   }
// header("location:../look/lookdd.php?page=".$page."");
 echo "<script>alert('¶©µ¥É¾³ý³É¹¦!');window.location.href='../look/lookalldd.php';</script>";
?>
<?php
//  $page=intval($_POST[page_id]);
  include("../conn/conn.php");
  while(list($value,$name)=each($_POST))
   {  
//     mysql_query("delete from tb_message where id='".$value."'",$conn);
	 $sql_is_delete=mysql_query("select is_delete from tb_message where id=".$value."",$conn);
 	 $info_is_delete=mysql_fetch_array($sql_is_delete);
 	 if($info_is_delete[is_delete]==2){
 	 	mysql_query("update tb_message set is_delete=3 where id=".$value."",$conn);
 	 }else{
 	 	mysql_query("update tb_message set is_delete=1 where id=".$value."",$conn);
 	 }
   }
 header("location:../member_mail.php");
?>
<?php
$leibie=$_POST[leibie];
include("../conn/conn.php");
$sql=mysql_query("select * from tb_health_type where typename='".$leibie."'",$conn);
$info=mysql_fetch_array($sql);
if($info!=false){
 echo"<script>alert('������Ѿ�����!');window.location.href='../add/addhealthleibie.php';</script>";
exit;
}
mysql_query("insert into tb_health_type(typename) values ('$leibie')",$conn);
echo"<script>alert('�������ӳɹ�!');window.location.href='../show/showhealthleibie.php';</script>";
?>
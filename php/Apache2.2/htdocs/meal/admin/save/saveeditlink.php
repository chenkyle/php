<?php
 include("../conn/conn.php");
$lid=$_POST['linkid'];
$lname=$_POST['linkname'];
$linfo=$_POST['linkinfo'];
echo $lid;
echo $lname;
echo $linfo;
$sql=mysql_query("UPDATE tb_link SET linkid='$lid',linkname='$lname',linkinfo='$linfo' where linkid='$lid'",$conn);
if($sql=TRUE)
echo"<script>alert('修改信息成功!');window.location.href='../show/showalllink.php';</script>";
?>
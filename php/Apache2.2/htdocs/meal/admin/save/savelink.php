<?php
 include("../conn/conn.php");
$lid=$_POST['linkid'];
$lname=$_POST['linkname'];
$linfo=$_POST['linkinfo'];
echo $lid;
echo $lname;
echo $linfo;
$sql=mysql_query("insert into tb_link(linkid,linkname,linkinfo)values('$lid','$lname','$linfo')",$conn);
if($sql=TRUE)
echo"<script>alert('修改信息成功!');window.location.href='../show/showalllink.php';</script>";
?>
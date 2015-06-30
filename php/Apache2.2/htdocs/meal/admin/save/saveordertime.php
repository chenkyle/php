<?php
include("../conn/conn.php");
$type=$_POST[cantype];
$begintime=$_POST[begintime_shi].":".$_POST[begintime_fen];
$endtime=$_POST[endtime_shi].":".$_POST[endtime_fen];
mysql_query("insert into tb_dingcantime(begintime,endtime,type) values ('$begintime','$endtime','$type')",$conn);
echo "<script>alert('时间设置成功!');window.location.href='../show/showordertime.php';</script>";
?>
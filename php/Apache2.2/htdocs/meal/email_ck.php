<?php
include("conn/conn.php");
//设置页面编码
header("Content-type:text/html;charset=gb2312");
$email=trim($_GET["email"]);
$sql="select * from tb_user where email='".$email."'";
$query=mysql_query($sql);
$rst=mysql_fetch_object($query);
mysql_close($conn);
if ($rst==false)
{
echo 'false';
}
else
{
echo 'true';
}
?>

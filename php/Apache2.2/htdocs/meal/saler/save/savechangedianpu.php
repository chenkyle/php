<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
include("../conn/conn.php");
$ssid = $_GET[sid];
$companyname=$_POST[companyname];
$hostname=$_POST[hostname];
$phone=$_POST[phone];
$sendprice=$_POST[sendprice];
$prices=$_POST[prices];
$introduction=$_POST[introduction];

echo "update tb_dianpu set companyname='$companyname',hostname='$hostname',phone='$phone',sendprice='$sendprice',prices='$prices',introduction='$introduction'where id=".$ssid."";
$result = mysql_query("update tb_dianpu set companyname='$companyname',hostname='$hostname',phone='$phone',sendprice='$sendprice',prices='$prices',introduction='$introduction'where id=".$ssid."",$conn);

if($result==true)
{	
	echo "<script>alert('店铺信息修改成功!');window.parent.location.href='../admin_main.php';</script>";
}
?>
<?php
session_start();
include("../conn/conn.php");
if($_SESSION[username]==""){
	echo "<script>alert('请先登录后订餐!');window.location.href='../login.php';</script>"; 
	exit;
}
$sid=$_POST['sid'];//获得卖家的ID
//echo "<script>alert($sid);</script>"; 
$_SESSION["salerid"]=$sid;

$id=strval($_GET[id]);//将变量转换成字符串
$shuliang=$_POST[shuliang];
$tj=explode(";",strval($_POST[tj]));
$sql=mysql_query("select * from tb_shangpin where id='".$id."'",$conn);
$info=mysql_fetch_array($sql);
//$sid = $info[salerID];//加的

if($shuliang=="")
$shuliang=1;
if($info[shuliang]<=0){
	echo "<script>alert('该商品已经售完!');history.back();</script>";
	exit;
}
$array=explode("@",$_SESSION[producelist]);//把字符串分割为数组
//echo "sid:".$sid;
//echo count($array);
//print_r($array);// 
if((count($array)-1)>0)
{
	foreach ($array as $spid)
	{
	//开始，用于不能添加其他商店的菜品
		if($spid!=0)
		{
			$sql_show=mysql_query("select * from tb_shangpin where id='".$spid."'",$conn); 
			$info_show=mysql_fetch_array($sql_show);
			//echo $info_show[salerID];
			if($info_show[salerID]!=$sid)
			{
				echo "<script>alert('不能添加其他商店的菜品!');history.back();</script>";
				exit;
			}
			//结束
		}
	}
}
for($i=0;$i<count($array)-1;$i++){

	if($array[$i]==$id){
		echo "<script>alert('该商品已经在您的购物车中!');history.back();</script>";
		exit;
	}
}
$_SESSION[producelist]=$_SESSION[producelist].$id."@";
$_SESSION[quatity]=$_SESSION[quatity].$shuliang."@";
//$_SESSION[saler]=$_SESSION[saler].$sid."@";//加的
if(count($tj)>2){
	header("location:../member_shopping.php");
}else{
	//echo "<script>alert('该商品已放入购物车！');window.location.href='../member_shop_car.php';</script>"; 
	echo "<script>alert('该商品已放入购物车！');history.back();</script>"; 
}
?>
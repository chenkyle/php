<?php
include("./conn/conn.php");//别引用错目录了
$name=$_POST['usernc'];
$pwd=md5($_POST[p1]);
$email=$_POST[email];
$role = '卖家';

$companyname=$_POST[companyname];
$hostname=$_POST[hostname];
$phone=$_POST[phone];
$sendprice=$_POST[sendprice];
$prices=$_POST[prices];
$introduction=$_POST[introduction];
$regtime=date("Y-m-j");

/*
echo "name".$name."<br>";
echo "pwd".$pwd."<br>";
echo "email".$email."<br>";
echo "companyname".$companyname."<br>";
echo "hostname".$hostname."<br>";
echo "sendprice".$sendprice."<br>";
echo "prices".$prices."<br>";
echo "introduction".$introduction."<br>";
echo "phone".$phone."<br>";
echo "regtime".$regtime."<br>";
*/

$dongjie=0;
$sql=mysql_query("select * from tb_user where name='".$name."'",$conn);
$info=mysql_fetch_array($sql);
if($info==true){
	echo "<script>alert('该用户已经存在!');history.back();</script>";
	exit;
}
else
{
//	$sql_a=mysql_query("select * from tb_provinces where provinceid='".$_POST[selA]."'",$conn);
//	$info_a=mysql_fetch_array($sql_a);
//	$sql_b=mysql_query("select * from tb_cities where cityid='".$_POST[selB]."'",$conn);
//	$info_b=mysql_fetch_array($sql_b);
//	$sql_c=mysql_query("select * from tb_cities where cityid='".$_POST[selB]."'",$conn);
//	$info_c=mysql_fetch_array($sql_c);
//	$dizhi=$info_a[province]."-".$info_b[city]."-".$info_c[area]."-".$jdxx;
//echo "insert into tb_user(name,pwd,dongjie,email,regtime,role) values ('$name','$pwd','$dongjie','$email','$regtime','$role')";
	
	$r=mysql_query("insert into tb_user (name,pwd,dongjie,email,regtime,role) values ('$name','$pwd','$dongjie','$email','$regtime','$role')",$conn);

	//获取卖家的ID
	$sql1=mysql_query("select * from tb_user where name='".$name."'and role='卖家'",$conn);
	$info1=mysql_fetch_array($sql1);
	$user_id=$info1[id];
	
	echo $companyinfo="insert into tb_dianpu values('$user_id','$companyname','$hostname','$phone','$sendprice','$prices','$introduction')";
	(bool)$result = mysql_query($companyinfo,$conn);
	if($result==true)
	{
		//echo $companyinfo;
		session_start();
		$_SESSION["salername"]=$name;
		echo "<script>window.location='saler_regsiter_seccessful.php';</script>";
	}
	
}
?>

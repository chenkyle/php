<?php
session_start();
include("conn/conn.php");
$sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
$info=mysql_fetch_array($sql);
$dingdanhao=date("YmjHis").$info[id];
$spc=$_SESSION[producelist];
//$sid =$_SESSION[saler];//加的
$slc= $_SESSION[quatity];
//echo $sid;
//$_SESSION[saler];
$time=date("Y-m-j H:i:s");

$salerid = $_SESSION["salerid"];

if($_POST[address]=="-1"){
	$shouhuoren=$_POST[truename];
	$jdxx=$_POST[jdxx];
	$tel=$_POST[tel];
	$email=$_POST[email];
	
//	$sql_a=mysql_query("select * from tb_provinces where provinceid='".$_POST[selA]."'",$conn);
//	$info_a=mysql_fetch_array($sql_a);
//	$sql_b=mysql_query("select * from tb_cities where cityid='".$_POST[selB]."'",$conn);
//	$info_b=mysql_fetch_array($sql_b);
//	$sql_c=mysql_query("select * from tb_cities where cityid='".$_POST[selB]."'",$conn);
//	$info_c=mysql_fetch_array($sql_c);
	//$dizhi=$_POST[sch_province]."-".$_POST[sch_capital]."-".$_POST[sch_city]."-".$jdxx;
	$dizhi = $jdxx;
	mysql_query("insert into tb_address(name,address,lianxitel,tel,user_id,addtime,email) values ('$shouhuoren','$dizhi','$tel','$tel','$info[id]','$time','$email')",$conn); 
	
}else{
	$sql_address=mysql_query("select * from tb_address where id='".$_POST[address]."'",$conn);
	$info_address=mysql_fetch_array($sql_address);
	$shouhuoren=$info_address[name];
//	$sex="男";
	$dizhi=$info_address[address];
	$tel=$info_address[tel];
	$email=$info_address[email];
	$zfff="货到付款";
}
if(trim($_POST[ly])==""){
   $leaveword="";
 }
 else{
   $leaveword=$_POST[ly];
 }
 $xiadanren=$_SESSION[username];
 
 $zt="未作任何处理";
 $total=$_SESSION[total];
 $isdel = 1;
 

 mysql_query("insert into tb_dingdan(salerid,dingdanhao,spc,slc,shouhuoren,dizhi,tel,email,zfff,leaveword,time,xiadanren,zt,total) values ('$salerid','$dingdanhao','$spc','$slc','$shouhuoren','$dizhi','$tel','$email','$zfff','$leaveword','$time','$xiadanren','$zt','$total')",$conn); 
 $_SESSION[producelist]="";
  $_SESSION[quatity]="";
 header("location:member.php?");
?>

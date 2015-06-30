<?php
session_start();
$admin=$_SESSION[admin];
$name=$_POST[name];
$p1=$_POST[p1];
$p2=$_POST[p2];
$oldpwd=$_POST[old];
$pwd=md5($p1);
$old=$_GET[oldid];
$email=$_POST[email];
$time=date("Y-m-j H:i:s");
include("../conn/conn.php");
if($old==""){
	$sql=mysql_query("select * from tb_admin where name='".$name."'",$conn);
	$info=mysql_fetch_array($sql);
	$sql_email=mysql_query("select * from tb_admin where email='".$email."'",$conn);
	$info_email=mysql_fetch_array($sql_email);
	if($info!=false){
		echo"<script>alert('该管理员已经存在!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	else if($info_email!=false){
		echo"<script>alert('该Email地址已经存在!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}else if($p1!=$p2){
		echo"<script>alert('密码跟确认密码不一致!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	mysql_query("insert into tb_admin(name,pwd,email,authority,time) values ('$name','$pwd','$email','1','$time')",$conn);
	echo"<script>alert('添加管理员账户信息成功!');window.location.href='../edit/editadmin.php';</script>";
}else{
	$sql=mysql_query("select * from tb_admin where id='".$old."'",$conn);
	$info=mysql_fetch_array($sql);
	if($info[authority]==0&&$admin!=$info[name]){
		echo"<script>alert('您没有修改改账户的权限!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	if($oldpwd==""&&$p1==""&&$p2==""){
		mysql_query("update tb_admin set name='".$name."',email='".$email."' where id=".$old."",$conn);
	}else{
		$sql_old=mysql_query("select * from tb_admin where id='".$old."'",$conn);
		$info_old=mysql_fetch_array($sql_old);
		if($info_old[pwd]!=md5($oldpwd)){
			echo"<script>alert('您输入的密码不正确!');window.location.href='../edit/editadmin.php?id=".$old."';</script>";
			exit;
		}else if($p1!=$p2){
			echo"<script>alert('密码跟确认密码不一致!');window.location.href='../edit/editadmin.php?id=".$old."';</script>";
			exit;
		}
		mysql_query("update tb_admin set name='".$name."',email='".$email."',pwd='".$pwd."' where id=".$old."",$conn);
	}
	echo"<script>alert('修改管理员账户信息成功!');window.location.href='../edit/editadmin.php';</script>";
}

?>
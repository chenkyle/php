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
		echo"<script>alert('�ù���Ա�Ѿ�����!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	else if($info_email!=false){
		echo"<script>alert('��Email��ַ�Ѿ�����!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}else if($p1!=$p2){
		echo"<script>alert('�����ȷ�����벻һ��!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	mysql_query("insert into tb_admin(name,pwd,email,authority,time) values ('$name','$pwd','$email','1','$time')",$conn);
	echo"<script>alert('��ӹ���Ա�˻���Ϣ�ɹ�!');window.location.href='../edit/editadmin.php';</script>";
}else{
	$sql=mysql_query("select * from tb_admin where id='".$old."'",$conn);
	$info=mysql_fetch_array($sql);
	if($info[authority]==0&&$admin!=$info[name]){
		echo"<script>alert('��û���޸ĸ��˻���Ȩ��!');window.location.href='../edit/editadmin.php';</script>";
		exit;
	}
	if($oldpwd==""&&$p1==""&&$p2==""){
		mysql_query("update tb_admin set name='".$name."',email='".$email."' where id=".$old."",$conn);
	}else{
		$sql_old=mysql_query("select * from tb_admin where id='".$old."'",$conn);
		$info_old=mysql_fetch_array($sql_old);
		if($info_old[pwd]!=md5($oldpwd)){
			echo"<script>alert('����������벻��ȷ!');window.location.href='../edit/editadmin.php?id=".$old."';</script>";
			exit;
		}else if($p1!=$p2){
			echo"<script>alert('�����ȷ�����벻һ��!');window.location.href='../edit/editadmin.php?id=".$old."';</script>";
			exit;
		}
		mysql_query("update tb_admin set name='".$name."',email='".$email."',pwd='".$pwd."' where id=".$old."",$conn);
	}
	echo"<script>alert('�޸Ĺ���Ա�˻���Ϣ�ɹ�!');window.location.href='../edit/editadmin.php';</script>";
}

?>
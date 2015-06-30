<?php
require_once("Mail.php");
include("../conn/conn.php");
$name=$_POST[usernc];
$pwd=md5($_POST[p1]);
$email=$_POST[email];
$role = '买家';
//$truename=$_POST[truename];
//$gender=$_POST[gender];
//$tel=$_POST[tel];
//$qq=$_POST[qq];
//$tishi=$_POST[ts1];
//$huida=$_POST[tsda];
//$jdxx=$_POST[jdxx];
//$lianxitel=$_POST[lianxitel];
$regtime=date("Y-m-j");
$isactive=md5(date("Y-m-j H:i:s"));
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

	mysql_query("insert into tb_user (name,pwd,dongjie,email,regtime,role) values ('$name','$pwd','$dongjie','$email','$regtime','$role')",$conn);

	$sql1=mysql_query("select * from tb_user where name='".$name."'",$conn);
	$info1=mysql_fetch_array($sql1);
	$user_id=$info1[id];
	//注册时将信息更新到地址信息表
//	mysql_query("insert into tb_address (name,address,lianxitel,tel,qq,user_id,addtime,email)values ('$truename','$dizhi','$lianxitel','$tel','$qq','$user_id','$regtime','$email')",$conn);
	//发送邮件信息
	/*
	 
	$host = 'smtp.sina.com';
	$to = $email;
	$from = 'username@sina.com';
	$username = 'username';
	$password = 'password';
	$subject = '亲爱的  '.$name.", 完成最后一步，您的注册就成功了！";
	$content = "您的账号已经成功创建，请点击此链接激活账号：\r\n\r\n";
	$content.= "http://localhost/user/active.php?uid=".$user_id."&active=".$isactive;
	$content.= "\r\n\r\n请妥善保留这封电子邮件. 您的帐号资料如下:";
	$content.= "\r\n\r\n----------------------------帐号: ".$name."----------------------------";
	$content.= "\r\n\r\n如果您忘记了密码，可以在用户登录界面通过“找回密码”的链接，重置你的密码。";
	$conf['mail'] = array(
'host' => $host, //smtp服务器地址 
'auth' => true, //true表示smtp服务器需要验证，false不需要 
'username' => $username, //用户名 
'password' => $password //密码 
	);

	//发送邮件 
	$headers['From'] = $from; //发信地址 
	$headers['To'] = $to; //收信地址 
	$headers['Subject'] = $subject; //邮件标题 
	$mail_object = &Mail::factory('smtp', $conf['mail']);
	//邮件正文 
	$body = $content;

	$mail_res = $mail_object->send($headers['To'], $headers, $body); //发送 

	if(PEAR::isError($mail_res)){ //检测错误 
		die($mail_res->getMessage());
	}

	echo "<script>alert('就差一步了,请到邮箱激活你的账户！');window.location='../regsiter_mail.php?uid=".$user_id."&active=".$isactive."&email=".$email."';</script>";
	*/
	session_start();
	$_SESSION["username"]=$name;
	
	echo "<script>window.location='../regsiter_seccessful.php?uid=".$user_id."&active=".$isactive."&email=".$email."';</script>";
	
}
?>

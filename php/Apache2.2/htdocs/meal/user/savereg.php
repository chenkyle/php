<?php
require_once("Mail.php");
include("../conn/conn.php");
$name=$_POST[usernc];
$pwd=md5($_POST[p1]);
$email=$_POST[email];
$role = '���';
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
	echo "<script>alert('���û��Ѿ�����!');history.back();</script>";
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
	//ע��ʱ����Ϣ���µ���ַ��Ϣ��
//	mysql_query("insert into tb_address (name,address,lianxitel,tel,qq,user_id,addtime,email)values ('$truename','$dizhi','$lianxitel','$tel','$qq','$user_id','$regtime','$email')",$conn);
	//�����ʼ���Ϣ
	/*
	 
	$host = 'smtp.sina.com';
	$to = $email;
	$from = 'username@sina.com';
	$username = 'username';
	$password = 'password';
	$subject = '�װ���  '.$name.", ������һ��������ע��ͳɹ��ˣ�";
	$content = "�����˺��Ѿ��ɹ����������������Ӽ����˺ţ�\r\n\r\n";
	$content.= "http://localhost/user/active.php?uid=".$user_id."&active=".$isactive;
	$content.= "\r\n\r\n�����Ʊ����������ʼ�. �����ʺ���������:";
	$content.= "\r\n\r\n----------------------------�ʺ�: ".$name."----------------------------";
	$content.= "\r\n\r\n��������������룬�������û���¼����ͨ�����һ����롱�����ӣ�����������롣";
	$conf['mail'] = array(
'host' => $host, //smtp��������ַ 
'auth' => true, //true��ʾsmtp��������Ҫ��֤��false����Ҫ 
'username' => $username, //�û��� 
'password' => $password //���� 
	);

	//�����ʼ� 
	$headers['From'] = $from; //���ŵ�ַ 
	$headers['To'] = $to; //���ŵ�ַ 
	$headers['Subject'] = $subject; //�ʼ����� 
	$mail_object = &Mail::factory('smtp', $conf['mail']);
	//�ʼ����� 
	$body = $content;

	$mail_res = $mail_object->send($headers['To'], $headers, $body); //���� 

	if(PEAR::isError($mail_res)){ //������ 
		die($mail_res->getMessage());
	}

	echo "<script>alert('�Ͳ�һ����,�뵽���伤������˻���');window.location='../regsiter_mail.php?uid=".$user_id."&active=".$isactive."&email=".$email."';</script>";
	*/
	session_start();
	$_SESSION["username"]=$name;
	
	echo "<script>window.location='../regsiter_seccessful.php?uid=".$user_id."&active=".$isactive."&email=".$email."';</script>";
	
}
?>

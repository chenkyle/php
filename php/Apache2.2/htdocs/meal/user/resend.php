<?php
require_once("Mail.php");
include("../conn/conn.php");
$uid=$_GET[uid];
$active=$_GET[active];
$email=$_GET[email];
$sql=mysql_query("select * from tb_user where id='".$uid."'",$conn);
$info=mysql_fetch_array($sql);
$name=$info[name];
//发送邮件信息
$host = 'smtp.sina.com';
$to = $email;
$from = 'username@sina.com';
$username = 'username';
$password = 'password';
$subject = '亲爱的  '.$name.", 完成最后一步，您的注册就成功了！";
$content = "您的账号已经成功创建，请点击此链接激活账号：\r\n\r\n";
$content.= "http://localhost/user/active.php?uid=".$uid."&active=".$active;
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
echo "<script>alert('已向".$email."邮箱发送了激活信，请在48小时内激活!');history.back();</script>";
?>
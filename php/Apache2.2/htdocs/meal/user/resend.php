<?php
require_once("Mail.php");
include("../conn/conn.php");
$uid=$_GET[uid];
$active=$_GET[active];
$email=$_GET[email];
$sql=mysql_query("select * from tb_user where id='".$uid."'",$conn);
$info=mysql_fetch_array($sql);
$name=$info[name];
//�����ʼ���Ϣ
$host = 'smtp.sina.com';
$to = $email;
$from = 'username@sina.com';
$username = 'username';
$password = 'password';
$subject = '�װ���  '.$name.", ������һ��������ע��ͳɹ��ˣ�";
$content = "�����˺��Ѿ��ɹ����������������Ӽ����˺ţ�\r\n\r\n";
$content.= "http://localhost/user/active.php?uid=".$uid."&active=".$active;
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
echo "<script>alert('����".$email."���䷢���˼����ţ�����48Сʱ�ڼ���!');history.back();</script>";
?>
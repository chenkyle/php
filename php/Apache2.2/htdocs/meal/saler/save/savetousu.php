<?php
include("../conn/conn.php");
$ssid = $_GET[sid];
$content=$_POST[content];

$sql = "insert into tb_complain(complainer_id,content) values ('$ssid','$content')";
$result= mysql_query($sql,$conn);

if($result==true)
{	
	echo "<script>alert('Ͷ����Ϣ�ύ�ɹ�!');window.parent.location.href='../admin_main.php';</script>";
}
?>

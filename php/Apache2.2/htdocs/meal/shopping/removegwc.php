<?php
session_start();
$id=$_GET[id];
$arraysp=explode("@",$_SESSION[producelist]);
$arraysl=explode("@",$_SESSION[quatity]);
for($i=0;$i<count($arraysp);$i++){
   if($arraysp[$i]==$id){
	  $arraysp[$i]="";
	  $arraysl[$i]="";
	}
 }
$_SESSION[producelist]=implode("@",$arraysp);//���������ַ���
$_SESSION[quatity]=implode("@",$arraysl);
echo "<script>alert('��ʽ�ѳɹ��Ƴ����ﳵ!');window.location.href='../member_shop_car.php';</script>";
//header("location:../list.php");
?>

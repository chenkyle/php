<?php
session_start();
include("../conn/conn.php");
if($_SESSION[username]==""){
	echo "<script>alert('���ȵ�¼�󶩲�!');window.location.href='../login.php';</script>"; 
	exit;
}
$sid=$_POST['sid'];//������ҵ�ID
//echo "<script>alert($sid);</script>"; 
$_SESSION["salerid"]=$sid;

$id=strval($_GET[id]);//������ת�����ַ���
$shuliang=$_POST[shuliang];
$tj=explode(";",strval($_POST[tj]));
$sql=mysql_query("select * from tb_shangpin where id='".$id."'",$conn);
$info=mysql_fetch_array($sql);
//$sid = $info[salerID];//�ӵ�

if($shuliang=="")
$shuliang=1;
if($info[shuliang]<=0){
	echo "<script>alert('����Ʒ�Ѿ�����!');history.back();</script>";
	exit;
}
$array=explode("@",$_SESSION[producelist]);//���ַ����ָ�Ϊ����
//echo "sid:".$sid;
//echo count($array);
//print_r($array);// 
if((count($array)-1)>0)
{
	foreach ($array as $spid)
	{
	//��ʼ�����ڲ�����������̵�Ĳ�Ʒ
		if($spid!=0)
		{
			$sql_show=mysql_query("select * from tb_shangpin where id='".$spid."'",$conn); 
			$info_show=mysql_fetch_array($sql_show);
			//echo $info_show[salerID];
			if($info_show[salerID]!=$sid)
			{
				echo "<script>alert('������������̵�Ĳ�Ʒ!');history.back();</script>";
				exit;
			}
			//����
		}
	}
}
for($i=0;$i<count($array)-1;$i++){

	if($array[$i]==$id){
		echo "<script>alert('����Ʒ�Ѿ������Ĺ��ﳵ��!');history.back();</script>";
		exit;
	}
}
$_SESSION[producelist]=$_SESSION[producelist].$id."@";
$_SESSION[quatity]=$_SESSION[quatity].$shuliang."@";
//$_SESSION[saler]=$_SESSION[saler].$sid."@";//�ӵ�
if(count($tj)>2){
	header("location:../member_shopping.php");
}else{
	//echo "<script>alert('����Ʒ�ѷ��빺�ﳵ��');window.location.href='../member_shop_car.php';</script>"; 
	echo "<script>alert('����Ʒ�ѷ��빺�ﳵ��');history.back();</script>"; 
}
?>
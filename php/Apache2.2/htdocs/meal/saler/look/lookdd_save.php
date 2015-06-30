<?php

$zt="已发货&nbsp;";
include("../conn/conn.php");

session_start();
$salename = $_SESSION["salername"];
//echo "<script language='javascript'>alert($salename);</script>";
$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='卖家'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];
//echo $salerid;
//echo "<script language='javascript'>alert($salerid);</script>";

while(list($value,$name)=each($_POST))
{
	$sql3=mysql_query("select * from tb_dingdan where id='".$name."' and salerid='".$salerid."'",$conn);
	$info3=mysql_fetch_array($sql3);
	if(trim($info3[zt])=="未作任何处理"){
		$sql=mysql_query("select * from tb_dingdan where id='".$name."' and salerid='".$salerid."'",$conn);
		$info=mysql_fetch_array($sql);
		$array=explode("@",$info[spc]);
		$arraysl=explode("@",$info[slc]);

		for($i=0;$i<count($array);$i++){
			$id=$array[$i];
			$num=$arraysl[$i];
			mysql_query("update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$name."' and salerid='".$salerid."'",$conn);
		}
	}

	mysql_query("update tb_dingdan set zt='".$zt."'where id='".$name."' and salerid='".$salerid."'",$conn);
}

//echo "<script>alert('发货成功!');</script>";
header("location:../look/lookdd.php");
?>

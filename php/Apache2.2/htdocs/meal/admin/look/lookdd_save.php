<?php

$zt="�ѷ���&nbsp;";
include("../conn/conn.php");



while(list($value,$name)=each($_POST))
{
	$sql3=mysql_query("select * from tb_dingdan where id='".$name."'",$conn);
	$info3=mysql_fetch_array($sql3);
	if(trim($info3[zt])=="δ���κδ���"){
		$sql=mysql_query("select * from tb_dingdan where id='".$name."'",$conn);
		$info=mysql_fetch_array($sql);
		$array=explode("@",$info[spc]);
		$arraysl=explode("@",$info[slc]);

		for($i=0;$i<count($array);$i++){
			$id=$array[$i];
			$num=$arraysl[$i];
			mysql_query("update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$id."'",$conn);
		}
	}

	mysql_query("update tb_dingdan set zt='".$zt."'where id='".$name."'",$conn);
}

//echo "<script>alert('�����ɹ�!');</script>";
header("location:../look/lookdd.php");
?>

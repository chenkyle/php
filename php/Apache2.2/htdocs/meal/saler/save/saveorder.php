<?php 
 include("../conn/conn.php"); 
session_start();
$salename = $_SESSION["salername"];

$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='卖家'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];


$ysk=$_POST[ysk]."&nbsp;";
$yfh=$_POST[yfh]."&nbsp;";
$ysh=$_POST[ysh]."&nbsp;";
$zt="";
if($ysk!="&nbsp;"){
   $zt.=$ysk;
 }
if($yfh!="&nbsp;"){
   $zt.=$yfh;
 }
 if($ysh!="&nbsp;"){
   $zt.=$ysh;
 }
 if(($ysk=="&nbsp;")&&($yfh=="&nbsp;")&&($ysh=="&nbsp;")){
    echo "<script>alert('请选择处理状态!');history.back();</script>";
	exit;
  }

 $sql3=mysql_query("select * from tb_dingdan where id='".$_GET[id]."' and salerid='".$salerid."'",$conn);
 $info3=mysql_fetch_array($sql3);
 if(trim($info3[zt])=="未作任何处理"){
 $sql=mysql_query("select * from tb_dingdan where id='".$_GET[id]."' and salerid='".$salerid."'",$conn);
 $info=mysql_fetch_array($sql);
 $array=explode("@",$info[spc]);
 $arraysl=explode("@",$info[slc]);
 
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysql_query("update tb_shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$id."' and salerid='".$salerid."'",$conn);
    }
  }
 $result = mysql_query("update tb_dingdan set zt='".$zt."' where id='".$_GET[id]."' and salerid='".$salerid."'",$conn);
 if($result==true)
	header("location:../look/lookdd.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
include("../conn/conn.php");
if(is_numeric($_POST[shichangjia])==false || is_numeric($_POST[huiyuanjia])==false)
 {
   echo "<script>alert('价格只能为数字！');history.back();</script>";
   exit;
 }
 if($_POST[shichangjia]<$_POST[huiyuanjia])
 {
   echo "<script>alert('会员价应该小于或等于市场价！');history.back();</script>";
   exit;
 }
if(is_numeric($_POST[shuliang])==false)
 {
   echo "<script>alert('数量只能为数字！');history.back();</script>";
   exit;
 }
$mingcheng=$_POST[mingcheng];
//$nian=$_POST[nian];
//$yue=$_POST[yue];
//$ri=$_POST[ri];
$shichangjia=$_POST[shichangjia];
$huiyuanjia=$_POST[huiyuanjia];
$typeid=$_POST[typeid];
$dengji=$_POST[dengji];
//$pinpai=$_POST[pinpai];
$tuijian=$_POST[tuijian];
$shuliang=$_POST[shuliang];
$upfile=$_POST[upfile];

if(ceil(($huiyuanjia/$shichangjia)*100)<=80)
 {
    $tejia=1;
 }
 else
 {
    $tejia=0;
 }
function getname($exname){
   $dir = "../upimages/";
   $i=1;
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   while(true){
       if(!is_file($dir.$i.".".$exname)){
	       $name=$i.".".$exname;
	       break;
	   }
	   $i++;
	 }
   return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
$uploadfile = getname($exname);

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))
 { 
  $uploadfile="admin/".substr($uploadfile,3);
}
else
 {
  $uploadfile="";
 }

$jianjie=$_POST[EditorDefault];
$addtime=date("Y-m-j");
/*
echo "mingcheng".$mingcheng."<br>";
echo "jianjie".$jianjie."<br>";
echo "addtime".$addtime."<br>";
echo "dengji".$dengji."<br>";
echo "uploadfile".$uploadfile."<br>";
echo "typeid".$typeid."<br>";
echo "shichangjia".$shichangjia."<br>";
echo "tuijian".$tuijian."<br>";
echo "shuliang".$shuliang."<br>";
*/
(bool)$result = mysql_query("insert into tb_shangpin(mingcheng,jianjie,addtime,dengji,tupian,typeid,shichangjia,huiyuanjia,tuijian,shuliang,cishu)values('$mingcheng','$jianjie','$addtime','$dengji','$uploadfile','$typeid','$shichangjia','$huiyuanjia','$tuijian','$shuliang','0')",$conn);


if($result==true)
{
	echo "<script>alert('菜单".$mingcheng."添加成功!');window.location.href='../edit/editgoods.php';</script>";
}
else
{
	echo "<script>alert('菜单".$mingcheng."添加失败!');window.location.href='../edit/editgoods.php';</script>";
}
?>
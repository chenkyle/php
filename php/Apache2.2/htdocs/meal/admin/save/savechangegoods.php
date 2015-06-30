<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
include("../conn/conn.php");
$mingcheng=$_POST[mingcheng];
$nian=$_POST[nian];
$yue=$_POST[yue];
$ri=$_POST[ri];
$shichangjia=$_POST[shichangjia];
$huiyuanjia=$_POST[huiyuanjia];
$typeid=$_POST[typeid];
$dengji=$_POST[dengji];
//$pinpai=$_POST[pinpai];
$tuijian=$_POST[tuijian];
$integral = $_POST[integral];
$shuliang=$_POST[shuliang];
 if(ceil(($huiyuanjia/$shichangjia)*100)<=80)
 {
    $tejia=1;
 }
 else
 {
    $tejia=0;
 }
if($upfile!="")
{
$sql=mysql_query("select * from tb_shangpin where id=".$_GET[id]."",$conn);
$info=mysql_fetch_array($sql);
@unlink("../".substr($info[tupian],6,(strlen($info[tupian])-6)));
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

$uploadfile="admin/".substr($uploadfile,3);

$jianjie=$_POST[EditorDefault];
$addtime=$nian."-".$yue."-".$ri;
if($upfile!=""){
	mysql_query("update tb_shangpin set mingcheng='$mingcheng',jianjie='$jianjie',addtime='$addtime',dengji='$dengji',tupian='$uploadfile',typeid='$typeid',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',tuijian='$tuijian',integral='$integral',shuliang='$shuliang' where id=".$_GET[id]."",$conn);
}else{
	mysql_query("update tb_shangpin set mingcheng='$mingcheng',jianjie='$jianjie',addtime='$addtime',dengji='$dengji',typeid='$typeid',shichangjia='$shichangjia',huiyuanjia='$huiyuanjia',tuijian='$tuijian',integral='$integral',shuliang='$shuliang' where id=".$_GET[id]."",$conn);
}
echo "<script>alert('菜单".$mingcheng."修改成功!');window.location.href='../edit/editgoods.php';</script>";
?>
<?php
header("Content-Type: text/html; charset=gb2312");
include("../conn/conn.php");

$action = $_POST[action];
$lastId = $_POST[lastId];
$key='未作任何处理';
$newMsg = "{'msg':'";

	$sql1=mysql_query("select * from tb_dingdan where TO_DAYS(time)=TO_DAYS(NOW()) and id > ".$lastId." and zt='".$key."' order by time asc",$conn);


	while($info1=mysql_fetch_array($sql1)){
		$lastId = $info1[id];
		if($action=="get"){
			$newMsg.="<embed src=\"system.wav\" style=\"display:none\">";
		}
		$newMsg.="<div>客户：";
		$newMsg.=$info1[xiadanren];
		$newMsg.="&nbsp;&nbsp;&nbsp;于&nbsp;&nbsp;&nbsp;";
		$newMsg.=$info1[time];
		$newMsg.="&nbsp;&nbsp;&nbsp;订餐，订单号为：&nbsp;&nbsp;&nbsp;";
		$newMsg.="<a href=\"../show/showdd.php?id=".$info1[id]."\">".$info1[dingdanhao]."</a>";
		$newMsg.="</td></tr></table>";
	}
$newMsg.="','lastId':";
$newMsg.=$lastId;
$newMsg.="}";

echo $newMsg;
?>
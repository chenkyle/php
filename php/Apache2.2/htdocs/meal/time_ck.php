<?php
include("conn/conn.php");
	//ÉèÖÃÒ³Ãæ±àÂë
header("Content-type:text/html;charset=gb2312");

$now=date("H:i:s");
$type = $_GET["tt"];
$sql="select * from tb_dingcantime where type=".$type." order by id desc limit 0,1";
$query=mysql_query($sql);
$rst=mysql_fetch_array($query);
mysql_close($conn);
$begintime = $rst[begintime];
$endtime = $rst[endtime];
if ($begintime<$now && $now<$endtime)
{
echo "false";
}
else
{
echo "true";
}
?>

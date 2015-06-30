<?php
session_start();
$salename = $_SESSION["salername"];

$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='卖家'",$conn);
$info=mysql_fetch_array($sql);
$salerid=$info[id];

header("Content-Type: text/html; charset=gb2312");
include("../conn/conn.php");

$key='未作任何处理';

	//$sql1=mysql_query("select * from tb_dingdan where TO_DAYS(time)=TO_DAYS(NOW())  and id > ".$lastId." and zt='".$key."' order by time asc",$conn);
$sql1=mysql_query("select * from tb_dingdan where and salerid='".$salerid."' and zt='".$key."' order by time asc",$conn);
echo "select * from tb_dingdan where and salerid='".$salerid."' and zt='".$key."' order by time asc";
?>


<form name="form1" method="post" action="lookdd_save.php">
<div id="msgDiv"></div>
<table>
<?php
	while($info1=mysql_fetch_array($sql1))
	{?>
	<tr>
		<td colspan="8">
		<input type="checkbox" name="<?php $info1[id] ?>" value="<?php $info1[id] ?>">
		</td>
		<td>客户：&nbsp;&nbsp;<?php $info1[xiadanren] ?>&nbsp;&nbsp;于&nbsp;&nbsp;<?php $info1[time] ?>&nbsp;&nbsp;订餐，订单号为：&nbsp;&nbsp;<a href="../show/showdd.php?id=<?php $info1[id] ?>"><?php $info1[dingdanhao] ?></a></td>
	</tr>
		
	<?php }

?>
<tr align="left"><td>&nbsp;&nbsp;<input type="submit" name="submit" value="发货" class="buttoncss"></td></tr>
</table>
</form>


	
	
	
	
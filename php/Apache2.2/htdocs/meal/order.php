<?php
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
$key='�ѷ���';
$sql=mysql_query("select count(*) as total from tb_dingdan where zt like '%".$key."%' and xiadanren='".$_SESSION[username]."' ",$conn);
$info=mysql_fetch_array($sql);
$total=$info[total];
if($total==0){
	echo "<td height='25' colspan='5'><li class=no-info>��վ���޶���!</li></td>";
}
else{
	$pagesize=10;
	if ($total<=$pagesize){
		$pagecount=1;
	}
	if(($total%$pagesize)!=0){
		$pagecount=intval($total/$pagesize)+1;
	}else{
		$pagecount=$total/$pagesize;
	}
	if(($_GET[page])==""){
		$page=1;
	}else{
		$page=intval($_GET[page]);
	}
	$sql1=mysql_query("select * from tb_dingdan where zt like '%".$key."%' and xiadanren='".$_SESSION[username]."' order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
	$info1=mysql_fetch_array($sql1);
	?>
	
	<form name="form1" method="post" action=""> 
<table>
	<tr class="member-right-sc-s">
		<td class="member-right-sc-n">������</td>
		<td>�µ�ʱ��</td>
		<td><span class="FF3300">����ܼ�</span></td>
		<td>����״̬</td>
		<td>����</td>
	</tr>
	<?php
	do{
		$array=explode("@",$info1[spc]);
		$sum=count($array)*20+260;
		?>
	<tr class="member-right-sc-d">
		<td class="member-right-sc-n"><a class="submodal-650-350" href="showodd.php?dd=<?php echo $info1[dingdanhao];?>"
			title="<?php echo $info1[dingdanhao];?>"><?php echo $info1[dingdanhao];?></a></td>
		<td><?php echo $info1[time];?></td>
		<td><span class="FF3300"><?php echo $info1[total];?></span></td>
		<td><?php echo $info1[zt];?></td>
		<td class="member-right-sc-b"><a class="submodal-650-350" 
			href="showodd.php?dd=<?php echo $info1[dingdanhao];?>">�鿴����</a> 
		</td>
	</tr>
	<?php
	}while($info1=mysql_fetch_array($sql1))
	?>
	<tr>
		<td colspan="7">
		<div class="main-bottom">��վ���ж��� <?php
		echo $total;
		?> &nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
		<?php
		if($page>=2)
		{
			?> <a href="member_shop_order.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a>
		<a href="member_shop_order.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>"
			title="ǰһҳ"><font size="3"> ǰһҳ </font></a> <?php
		}
		if($pagecount<=4){
			for($i=1;$i<=$pagecount;$i++){
		  ?> <a href="member_shop_order.php?page=<?php echo $i;?>"><?php echo $i;?></a> <?php
			}
		}else{
			for($i=1;$i<=4;$i++){
		  ?> <a href="member_shop_order.php?page=<?php echo $i;?>"><?php echo $i;?></a> <?php }?>
		<a href="member_shop_order.php?page=<?php echo $page+1;?>" title="��һҳ"><font
			size="3"> ��һҳ </font></a> <a
			href="member_shop_order.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>"
			title="βҳ"><font size="3">βҳ</font></a> <?php }?> <input
			type="hidden" name="page_id" value=<?php echo $page;?>></div>
		</td>
	</tr>
</table></form>
<?php
}
?>
<?php
include_once("conn/conn.php");
include_once("top.php");
$typeid=$_GET[typeid];
$tn=$_GET[tn];
?>
<!-- ע��ģ�鿪ʼ -->
<div class="banner">
<?php include("zhuce.php");?>
</div>
<!-- ע��ģ����� -->
<!-- ���忪ʼ -->
<div class="main"><!-- ��߿�ʼ -->
<div class="list-left">
<?php include("left.php");?>
</div>
<!-- ��߽��� --> <!-- �ұ߿�ʼ -->
<div class="list-right">
<div class="list-menu">
	<li class="sort-menu-active"><?php echo $tn;?></li>
</div>
<div class="list-columns list-columns-1"> 
<!-- ��Ʒ���ӿ�ʼ -->
<?php
$sql_jr=mysql_query("select count(*) as total from tb_shangpin where typeid=".$typeid,$conn);
	   $info_jr=mysql_fetch_array($sql_jr);
	   $total=$info_jr[total];
	   if($total==0){
	     echo "<br><h1>��վ���޲�ʽ!</h1>";
	   }
	   else
	    {
	    	$pagesize=8;
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
           $sql1=mysql_query("select * from tb_shangpin where typeid=".$typeid." order by addtime desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
		   while($info1=mysql_fetch_array($sql1))
		    {
		?>
<div class="list-column">
<div class="list-column-img"><a
	href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"> <?php
	if($info1[tupian]=="")
	{
		echo "����ͼƬ!";
	}
	else
	{
		?> <img src="<?php echo "../".$info1[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title"><a
	href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a></li>
<li><span class="line-through">���ͼۣ� <?php echo $info1[shichangjia];?>Ԫ</span></li>
<li>��Ա�ۣ� <span class="bold-red"><?php echo $info1[huiyuanjia];?>Ԫ</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
<div class="list-column-text">
<li>���������� <input name="shuliang" class="list-column-no" type="text"
	value="1" maxlength="2"></li>
<li><select name="pay-Style" id="pay-Style" class="pay-Style">
	<option value="0">���ʽ��</option>
	<option value="��������">��������</option>
	<option value="����֧��">����֧��</option>
</select></li>
</div>
<div class="list-column-buy">
<li class="buy-menu" class="hot-min-box-space">
<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
	</li>
<li class="shopping-car">
<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;"></li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info1[id];?>" title="����ղ�">����ղ�</a></li>
<li><a href="show.php?id=<?php echo $info1[id];?>#pl" title="�鿴����">�鿴����</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }?> 
<!-- ��Ʒ���ӽ��� --> 
<!-- ҳ�뿪ʼ -->
<div class="main-bottom">
    &nbsp;&nbsp;&nbsp;&nbsp;��վ����
        <?php
		   echo $total;
		  ?>
        &nbsp;����&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $page+1;?>" title="��һҳ"><font size="3"> ��һҳ </font></a> <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
        <?php }?>
</div>
<?php }?>
<!-- ҳ����� -->

</div>

</div>
<!-- �ұ߽��� -->
<div class="clearfix"></div>
</div>
<!-- ������� -->
<?php include("bottom.php");?>
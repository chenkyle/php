<?php
include_once("conn/conn.php");
include_once("top.php");
$typeid=$_GET[typeid];
$tn=$_GET[tn];
?>
<!-- 注册模块开始 -->
<div class="banner">
<?php include("zhuce.php");?>
</div>
<!-- 注册模块结束 -->
<!-- 主体开始 -->
<div class="main"><!-- 左边开始 -->
<div class="list-left">
<?php include("left.php");?>
</div>
<!-- 左边结束 --> <!-- 右边开始 -->
<div class="list-right">
<div class="list-menu">
	<li class="sort-menu-active"><?php echo $tn;?></li>
</div>
<div class="list-columns list-columns-1"> 
<!-- 商品盒子开始 -->
<?php
$sql_jr=mysql_query("select count(*) as total from tb_shangpin where typeid=".$typeid,$conn);
	   $info_jr=mysql_fetch_array($sql_jr);
	   $total=$info_jr[total];
	   if($total==0){
	     echo "<br><h1>本站暂无菜式!</h1>";
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
		echo "暂无图片!";
	}
	else
	{
		?> <img src="<?php echo "../".$info1[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title"><a
	href="show.php?id=<?php echo $info1[id];?>"
	title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a></li>
<li><span class="line-through">订餐价： <?php echo $info1[shichangjia];?>元</span></li>
<li>会员价： <span class="bold-red"><?php echo $info1[huiyuanjia];?>元</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
<div class="list-column-text">
<li>订购数量： <input name="shuliang" class="list-column-no" type="text"
	value="1" maxlength="2"></li>
<li><select name="pay-Style" id="pay-Style" class="pay-Style">
	<option value="0">付款方式：</option>
	<option value="货到付款">货到付款</option>
	<option value="在线支付">在线支付</option>
</select></li>
</div>
<div class="list-column-buy">
<li class="buy-menu" class="hot-min-box-space">
<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
	</li>
<li class="shopping-car">
<input name="tj" type="submit" title="放到购物车" value="&nbsp;"></li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info1[id];?>" title="添加收藏">添加收藏</a></li>
<li><a href="show.php?id=<?php echo $info1[id];?>#pl" title="查看评价">查看评价</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }?> 
<!-- 商品盒子结束 --> 
<!-- 页码开始 -->
<div class="main-bottom">
    &nbsp;&nbsp;&nbsp;&nbsp;本站共有
        <?php
		   echo $total;
		  ?>
        &nbsp;道菜&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;道&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=1" title="首页"><font size="3"> 首页 </font></a> <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
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
        <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&page=<?php echo $page+1;?>" title="下一页"><font size="3"> 下一页 </font></a> <a href="typelist.php?tn=<?php echo $tn;?>&typeid=<?php echo $typeid;?>&id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
</div>
<?php }?>
<!-- 页码结束 -->

</div>

</div>
<!-- 右边结束 -->
<div class="clearfix"></div>
</div>
<!-- 主体结束 -->
<?php include("bottom.php");?>
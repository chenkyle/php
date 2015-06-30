<div class="list-right">
<div class="list-menu">
<li class="sort-menu-active"><a href="javascript:void(0)" onclick="show_s.call(this,0)">搜索结果</a></li>
<li class="sort-menu-off"><a href="javascript:void(0)" onclick="show_s.call(this,1)">人气排行</a></li>
<li class="sort-menu-off"><a href="javascript:void(0)" onclick="show_s.call(this,2)">价格排行</a></li>
</div>
<div id="center1">
<!-- 商品盒子开始 --> 
<?php

			 
		 $jdcz=$_POST[jdcz];
		 $name=$_POST[name];
		 $mh=$_POST[mh];
		 $dx=$_POST[dx];
		   if($dx=="1"){
			   $dx=">";
			}
			else if($dx=="-1"){
			    $dx="<";
			 }
		    else{
			    $dx="=";
			 } 
		 $jg=intval($_POST[jg]);
		
		 $lb=$_POST[lb];
		if($jdcz!=""){
	     $sql=mysql_query("select * from tb_shangpin where mingcheng like '%".$name."%' order by addtime desc",$conn);
		}
		else
		{
		   if($mh=="1"){
			  $sql=mysql_query("select * from tb_shangpin where huiyuanjia $dx".$jg." and typeid='".$lb."' and mingcheng like '%".$name."%'",$conn);
			
			}
		    else{
			  $sql=mysql_query("select * from tb_shangpin where huiyuanjia $dx".$jg." and typeid='".$lb."' and mingcheng = '".$name."'",$conn);
			}
		} 
		 $info=mysql_fetch_array($sql);
		 if($info==false){
//		   echo "<script language='javascript'>alert('本站暂无类似产品!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>本站暂无类似产品!</h2>";
		  } 
		 else{
		 	do{
	?>
<div class="list-column">
<div class="list-column-img"><a
	href="show.php?id=<?php echo $info[id];?>"
	title="<?php echo $info[mingcheng];?>"> <?php
	if($info[tupian]=="")
	{
		echo "暂无图片!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">订餐价： <?php echo $info[shichangjia];?>元</span></li>
<li>会员价： <span class="bold-red"><?php echo $info[huiyuanjia];?>元</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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
	</li>
<li class="shopping-car">

</li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="添加收藏">添加收藏</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="查看评价">查看评价</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- 商品盒子结束 -->
</div>
<div id="center2" style="display: none">
<!-- 商品盒子开始 --> 
<?php
	     $sql=mysql_query("select * from tb_shangpin order by cishu desc limit 0,6",$conn);
		 $info=mysql_fetch_array($sql);
		 if($info==false){
//		   echo "<script language='javascript'>alert('本站暂无类似产品!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>本站暂无类似产品!</h2>";
		  } 
		 else{
		 	do{
	?>
<div class="list-column">
<div class="list-column-img"><a
	href="show.php?id=<?php echo $info[id];?>"
	title="<?php echo $info[mingcheng];?>"> <?php
	if($info[tupian]=="")
	{
		echo "暂无图片!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">订餐价： <?php echo $info[shichangjia];?>元</span></li>
<li>会员价： <span class="bold-red"><?php echo $info[huiyuanjia];?>元</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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
	</li>
<li class="shopping-car">

</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="添加收藏">添加收藏</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="查看评价">查看评价</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- 商品盒子结束 -->
</div>
<div id="center3" style="display: none">
<!-- 商品盒子开始 --> 
<?php
	     $sql=mysql_query("select * from tb_shangpin order by shichangjia asc limit 0,6",$conn);
		 $info=mysql_fetch_array($sql);
		 if($info==false){
//		   echo "<script language='javascript'>alert('本站暂无类似产品!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>本站暂无类似产品!</h2>";
		  } 
		 else{
		 	do{
	?>
<div class="list-column">
<div class="list-column-img"><a
	href="show.php?id=<?php echo $info[id];?>"
	title="<?php echo $info[mingcheng];?>"> <?php
	if($info[tupian]=="")
	{
		echo "暂无图片!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">订餐价： <?php echo $info[shichangjia];?>元</span></li>
<li>会员价： <span class="bold-red"><?php echo $info[huiyuanjia];?>元</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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

	</li>
<li class="shopping-car">
</li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="添加收藏">添加收藏</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="查看评价">查看评价</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- 商品盒子结束 -->
</div>

</div>

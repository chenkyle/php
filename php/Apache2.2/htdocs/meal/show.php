<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- 注册模块开始 -->
    <!-- 注册模块结束 -->
    <!-- 主体开始 -->
     	<div class="main">
  			<!-- 左边开始 -->
		    	<div class="list-left">
        		<?php include 'left.php'?>
				</div>
        <!-- 左边结束 -->
        
         <?php
		     $sql_show=mysql_query("select * from tb_shangpin where id='".$_GET[id]."'",$conn); 
			 $info_show=mysql_fetch_object($sql_show);
			 
			 $sidforsp=$info_show->salerID;	//传给下面的本店其他商品
			 
					
		 ?>
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="list.php">今日菜式</a> - <?php echo $info_show->mingcheng;?></div>
            <!-- 商品购买信息盒子开始 --> 
            <div class="show-buy-box">
            	<div class="show-buy-box-tit"><?php echo $info_show->mingcheng;?></div>
                <div class="show-buy-box-main">
                    <div class="show-buy-box-left">
           <?php 
                  if($info_show->tupian==""){
				  echo "暂无图片";
				}
				else
				{					
			  ?>				  
                <a href="<?php echo "./".$info_show->tupian;?>" target="_blank" title="<?php echo $info_show->mingcheng;?>"><img src="<?php echo "./".$info_show->tupian;?>" alt="查看大图"></a>
              <?php
			    }
			   
			  ?>
                    </div>
                    <form action="shopping/addgouwuche.php?id=<?php echo $info_show->id;?>" method="post">
                    <input type="hidden" name="sid" value=<?php echo $info_show->salerID; ?>>
                    <div class="show-buy-box-right">
                        <li><span class="line-through">订餐价： <?php echo $info_show->shichangjia;?>元</span></li>
                        <li>会员价： <span class="bold-red fontsize-18 color-red"><?php echo $info_show->huiyuanjia;?></span> 元</li>
                        <li class="magin-top-8">
                        订购数量： <input name="shuliang" class="list-column-no border-ffac7d" type="text" value="1" maxlength="2">
                        <select name="pay-Style" id="pay-Style" class="pay-Style margin-left-20">
                            <option value="货到付款">货到付款</option>
                        </select>
                        </li>
                        <div class="show-buy-box-exponent">
                        	<div class="show-buy-box-exponent-m">美味指数：<span class="color-red">★★★★</span></div>
                            <div class="show-buy-box-exponent-s">送货速度：<span class="color-red">★★★★★</span></div>
                            <div class="show-buy-box-exponent-c">该菜式共有
                            <?php 
                            $sql_pj=mysql_query("select count(*) as total from tb_pingjia where isshow=1 and spid=".$_GET[id]."",$conn); 
			 				$info_pj=mysql_fetch_array($sql_pj);
			 				$total=$info_pj[total];
			 				if($total==0)
			 					echo "0";
			 				else 
			 					echo $total;
			 				?>人评论（<a href="show.php?id=<?php echo $info_show->id;?>#pl" title="查看评论">查看评论</a>）</div>
                        </div>
                        <div class="show-buy-box-buy">
                            <div class="show-buy-menu-buy"><input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;"></div>
                            <div class="show-buy-menu-order"><input name="tj" type="submit" title="放到购物车" value="&nbsp;"></div>
                            <div class="show-buy-menu-favorites"><a href="save/saveFavorites.php?sp_id=<?php echo $info_show->id;?>" title="添加到您的收藏夹中，方便以后快速订购."></a></div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="show-buy-box-bottom"></div>
            </div>
            <!-- 商品购买信息盒子结束 -->
            <!-- 商品详细信息开始 -->
            <div class="show-main-box-tit"></div>
            <div class="show-main-box">
            	<?php echo $info_show->jianjie;?>
            </div>
            <!-- 商品详细信息结束 -->
            
			<!-- 本店其他菜品开始 -->
       	  <div class="show-qitacaipin-tit"></div>
            <div class="show-qitacaipin" id="pl">
          	
					<?php
			
					$sql1=mysql_query("select * from tb_shangpin where salerID='".$sidforsp."' and id<>'".$_GET[id]."' ",$conn);
					$info1=mysql_fetch_array($sql1);
					if($info1==false)
					{
						echo "<li class=no-info>本站暂无其他菜品!</li>";
					}
					else
					{
						do
						{
							?>
					<div class="hot-min-box">
					<div class="hot-min-box-img">
					<a  href="show.php?id=<?php echo $info1[id];?>"
						title="<?php echo $info1[mingcheng];?>"> <?php
						if($info1[tupian]=="")
						{
							echo "<li class=no-info>暂无图片!</li>";
						}
						else
						{
						?> 
							<img height="100" width="100" src="<?php echo "./".$info1[tupian];?>" /> </a><?php }	?></div>
							<form action="shopping/addgouwuche.php?id=<?php echo $info1[id];?>" method="post">
							<input type="hidden" name="sid" value=<?php echo $info1[salerID]; ?>>
							<div class="hot-min-box-txt">
							<ul>
								<a href="lookinfo.php?id=<?php echo $info1[id];?>"
									title="<?php echo $info1[mingcheng];?>"><?php echo $info1[mingcheng];?></a>
							</ul>
							<ul class="hot-min-box-price">
								订餐价:
								<?php echo $info1[huiyuanjia];?>
								元
							</ul>
							<ul class="buy-menu" class="hot-min-box-space">
								<input name="tj" type="submit" title="马上购买" value="&nbsp;&nbsp;">
							</ul>
							<ul class="shopping-car">
								<input name="tj" type="submit" title="放到购物车" value="&nbsp;">
							</ul>
							</div>
							</form>
							<div class="clearfix"></div>
							</div>
								<?php
								}while($info1=mysql_fetch_array($sql1));
							}
							?>           			            
            </div>
            
            
            <!-- 店铺介绍开始 -->
            <div class="show-dianpu-tit"></div>
            <div class="show-dianpu" id="pl">
            <?php
			
					$sql1=mysql_query("select * from tb_dianpu where id='".$sidforsp."'",$conn);
					$info2=mysql_fetch_array($sql1);
					if($info2==false)
					{
						echo "<li class=no-info>本站暂无店铺信息!</li>";
					}
					else
					{
					
					
					?>
            <div class="main"> 
				<h4><table>
					<tr class="main-tit">
						<td class="main-tit">餐厅名称：</td>
						<td><?php echo $info2[companyname];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">负责人姓名：</td>
						<td><?php echo $info2[hostname];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">订餐电话：</td>
						<td><?php echo $info2[phone];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">外送费用：</td>
						<td><?php echo $info2[sendprice];?></td>
					</tr>
					
					<tr class="main-tit">
						<td class="main-tit">起送价格：</td>
						<td><?php echo $info2[prices];?></td>
					</tr>
						<tr class="main-tit">
						<td class="main-tit">餐厅描述：</td>
						<td><?php echo $info2[introduction];?></td>
					</tr>
				</table></h4>
				</div>
            
            </div>
          <?php  }  ?>
          
          
            <!-- 商品评论开始 -->
            <div class="show-comments-tit"></div>
            <div class="show-comments" id="pl">
            <?php

            $sql_pl=mysql_query("select u.name,pj.content,pj.time from tb_pingjia pj,tb_user u where pj.isshow=1 and pj.userid=u.id and spid=".$_GET[id]." order by pj.time desc",$conn); 
			 $info_pl=mysql_fetch_array($sql_pl);
            if($info_pl==false)
			{
				echo "<br><h3>该菜式暂无评论!</h3>";
			}
			else
			{
			$pagesize=5;
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
	$sql_pl=mysql_query("select u.name,pj.content,pj.time from tb_pingjia pj,tb_user u where pj.isshow=1 and pj.userid=u.id and spid=".$_GET[id]." order by pj.time desc limit ".($page-1)*$pagesize.",$pagesize",$conn); 
	$info_pl=mysql_fetch_array($sql_pl);
	
				
            $i=1;
			do
			{
				if($i<=3){
					if($i%2==0){
			   ?>
            	<li class="list-left-sc-s"><span class="list-left-hot-a width-100"><?php echo $info_pl[name];?>的评价：</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
               <?php }else{?>
               <li class="list-left-sc-d"><span class="list-left-hot-a width-100"><?php echo $info_pl[name];?>的评价：</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
               <?php } }else{if($i%2==0){?>
                <li class="list-left-sc-s"><span class="list-left-hot-r width-100"><?php echo $info_pl[name];?>的评价：</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
			   <?php }else{?>
			   <li class="list-left-sc-d"><span class="list-left-hot-r width-100"><?php echo $info_pl[name];?>的评价：</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
			   <?php } }$i++;}while($info_pl=mysql_fetch_array($sql_pl));}?>
            </div>
            <!-- 页码开始 -->
            <div class="page-bottom">
                <div class="main-bottom">
                本菜品共有评价 <?php
		echo $total;
		?> &nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
		<?php
		if($page>=2)
		{
			?> <a href="show.php?page=1&id=<?php echo $_GET[id];?>" title="首页"><font size="3"> 首页 </font></a>
		<a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $page-1;?>"
			title="前一页"><font size="3"> 前一页 </font></a> <?php
		}
		if($pagecount<=4){
			for($i=1;$i<=$pagecount;$i++){
		  ?> <a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $i;?>"><?php echo $i;?></a> <?php
			}
		}else{
			for($i=1;$i<=4;$i++){
		  ?> <a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $i;?>"><?php echo $i;?></a> <?php }?>
		<a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $page+1;?>" title="后一页"><font
			size="3"> 后一页 </font></a> <a
			href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $pagecount;?>"
			title="尾页"><font size="3">尾页</font></a> <?php }?> <input
			type="hidden" name="page_id" value=<?php echo $page;?>></div>
			</div>
            <!-- 页码结束 -->
            <!-- 商品评论结束 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
    <?php include("bottom.php");?>
<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- ע��ģ�鿪ʼ -->
    <!-- ע��ģ����� -->
    <!-- ���忪ʼ -->
     	<div class="main">
  			<!-- ��߿�ʼ -->
		    	<div class="list-left">
        		<?php include 'left.php'?>
				</div>
        <!-- ��߽��� -->
        
         <?php
		     $sql_show=mysql_query("select * from tb_shangpin where id='".$_GET[id]."'",$conn); 
			 $info_show=mysql_fetch_object($sql_show);
			 
			 $sidforsp=$info_show->salerID;	//��������ı���������Ʒ
			 
					
		 ?>
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="list.php">���ղ�ʽ</a> - <?php echo $info_show->mingcheng;?></div>
            <!-- ��Ʒ������Ϣ���ӿ�ʼ --> 
            <div class="show-buy-box">
            	<div class="show-buy-box-tit"><?php echo $info_show->mingcheng;?></div>
                <div class="show-buy-box-main">
                    <div class="show-buy-box-left">
           <?php 
                  if($info_show->tupian==""){
				  echo "����ͼƬ";
				}
				else
				{					
			  ?>				  
                <a href="<?php echo "./".$info_show->tupian;?>" target="_blank" title="<?php echo $info_show->mingcheng;?>"><img src="<?php echo "./".$info_show->tupian;?>" alt="�鿴��ͼ"></a>
              <?php
			    }
			   
			  ?>
                    </div>
                    <form action="shopping/addgouwuche.php?id=<?php echo $info_show->id;?>" method="post">
                    <input type="hidden" name="sid" value=<?php echo $info_show->salerID; ?>>
                    <div class="show-buy-box-right">
                        <li><span class="line-through">���ͼۣ� <?php echo $info_show->shichangjia;?>Ԫ</span></li>
                        <li>��Ա�ۣ� <span class="bold-red fontsize-18 color-red"><?php echo $info_show->huiyuanjia;?></span> Ԫ</li>
                        <li class="magin-top-8">
                        ���������� <input name="shuliang" class="list-column-no border-ffac7d" type="text" value="1" maxlength="2">
                        <select name="pay-Style" id="pay-Style" class="pay-Style margin-left-20">
                            <option value="��������">��������</option>
                        </select>
                        </li>
                        <div class="show-buy-box-exponent">
                        	<div class="show-buy-box-exponent-m">��ζָ����<span class="color-red">�����</span></div>
                            <div class="show-buy-box-exponent-s">�ͻ��ٶȣ�<span class="color-red">������</span></div>
                            <div class="show-buy-box-exponent-c">�ò�ʽ����
                            <?php 
                            $sql_pj=mysql_query("select count(*) as total from tb_pingjia where isshow=1 and spid=".$_GET[id]."",$conn); 
			 				$info_pj=mysql_fetch_array($sql_pj);
			 				$total=$info_pj[total];
			 				if($total==0)
			 					echo "0";
			 				else 
			 					echo $total;
			 				?>�����ۣ�<a href="show.php?id=<?php echo $info_show->id;?>#pl" title="�鿴����">�鿴����</a>��</div>
                        </div>
                        <div class="show-buy-box-buy">
                            <div class="show-buy-menu-buy"><input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;"></div>
                            <div class="show-buy-menu-order"><input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;"></div>
                            <div class="show-buy-menu-favorites"><a href="save/saveFavorites.php?sp_id=<?php echo $info_show->id;?>" title="��ӵ������ղؼ��У������Ժ���ٶ���."></a></div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="show-buy-box-bottom"></div>
            </div>
            <!-- ��Ʒ������Ϣ���ӽ��� -->
            <!-- ��Ʒ��ϸ��Ϣ��ʼ -->
            <div class="show-main-box-tit"></div>
            <div class="show-main-box">
            	<?php echo $info_show->jianjie;?>
            </div>
            <!-- ��Ʒ��ϸ��Ϣ���� -->
            
			<!-- ����������Ʒ��ʼ -->
       	  <div class="show-qitacaipin-tit"></div>
            <div class="show-qitacaipin" id="pl">
          	
					<?php
			
					$sql1=mysql_query("select * from tb_shangpin where salerID='".$sidforsp."' and id<>'".$_GET[id]."' ",$conn);
					$info1=mysql_fetch_array($sql1);
					if($info1==false)
					{
						echo "<li class=no-info>��վ����������Ʒ!</li>";
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
							echo "<li class=no-info>����ͼƬ!</li>";
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
								���ͼ�:
								<?php echo $info1[huiyuanjia];?>
								Ԫ
							</ul>
							<ul class="buy-menu" class="hot-min-box-space">
								<input name="tj" type="submit" title="���Ϲ���" value="&nbsp;&nbsp;">
							</ul>
							<ul class="shopping-car">
								<input name="tj" type="submit" title="�ŵ����ﳵ" value="&nbsp;">
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
            
            
            <!-- ���̽��ܿ�ʼ -->
            <div class="show-dianpu-tit"></div>
            <div class="show-dianpu" id="pl">
            <?php
			
					$sql1=mysql_query("select * from tb_dianpu where id='".$sidforsp."'",$conn);
					$info2=mysql_fetch_array($sql1);
					if($info2==false)
					{
						echo "<li class=no-info>��վ���޵�����Ϣ!</li>";
					}
					else
					{
					
					
					?>
            <div class="main"> 
				<h4><table>
					<tr class="main-tit">
						<td class="main-tit">�������ƣ�</td>
						<td><?php echo $info2[companyname];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">������������</td>
						<td><?php echo $info2[hostname];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">���͵绰��</td>
						<td><?php echo $info2[phone];?></td>
					</tr>
					<tr class="main-tit">
						<td class="main-tit">���ͷ��ã�</td>
						<td><?php echo $info2[sendprice];?></td>
					</tr>
					
					<tr class="main-tit">
						<td class="main-tit">���ͼ۸�</td>
						<td><?php echo $info2[prices];?></td>
					</tr>
						<tr class="main-tit">
						<td class="main-tit">����������</td>
						<td><?php echo $info2[introduction];?></td>
					</tr>
				</table></h4>
				</div>
            
            </div>
          <?php  }  ?>
          
          
            <!-- ��Ʒ���ۿ�ʼ -->
            <div class="show-comments-tit"></div>
            <div class="show-comments" id="pl">
            <?php

            $sql_pl=mysql_query("select u.name,pj.content,pj.time from tb_pingjia pj,tb_user u where pj.isshow=1 and pj.userid=u.id and spid=".$_GET[id]." order by pj.time desc",$conn); 
			 $info_pl=mysql_fetch_array($sql_pl);
            if($info_pl==false)
			{
				echo "<br><h3>�ò�ʽ��������!</h3>";
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
            	<li class="list-left-sc-s"><span class="list-left-hot-a width-100"><?php echo $info_pl[name];?>�����ۣ�</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
               <?php }else{?>
               <li class="list-left-sc-d"><span class="list-left-hot-a width-100"><?php echo $info_pl[name];?>�����ۣ�</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
               <?php } }else{if($i%2==0){?>
                <li class="list-left-sc-s"><span class="list-left-hot-r width-100"><?php echo $info_pl[name];?>�����ۣ�</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
			   <?php }else{?>
			   <li class="list-left-sc-d"><span class="list-left-hot-r width-100"><?php echo $info_pl[name];?>�����ۣ�</span><?php echo $info_pl[content];?><span class="gray">--- <?php echo $info_pl[time];?></span></li>
			   <?php } }$i++;}while($info_pl=mysql_fetch_array($sql_pl));}?>
            </div>
            <!-- ҳ�뿪ʼ -->
            <div class="page-bottom">
                <div class="main-bottom">
                ����Ʒ�������� <?php
		echo $total;
		?> &nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
		<?php
		if($page>=2)
		{
			?> <a href="show.php?page=1&id=<?php echo $_GET[id];?>" title="��ҳ"><font size="3"> ��ҳ </font></a>
		<a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $page-1;?>"
			title="ǰһҳ"><font size="3"> ǰһҳ </font></a> <?php
		}
		if($pagecount<=4){
			for($i=1;$i<=$pagecount;$i++){
		  ?> <a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $i;?>"><?php echo $i;?></a> <?php
			}
		}else{
			for($i=1;$i<=4;$i++){
		  ?> <a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $i;?>"><?php echo $i;?></a> <?php }?>
		<a href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $page+1;?>" title="��һҳ"><font
			size="3"> ��һҳ </font></a> <a
			href="show.php?id=<?php echo $_GET[id];?>&page=<?php echo $pagecount;?>"
			title="βҳ"><font size="3">βҳ</font></a> <?php }?> <input
			type="hidden" name="page_id" value=<?php echo $page;?>></div>
			</div>
            <!-- ҳ����� -->
            <!-- ��Ʒ���۽��� -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
    <?php include("bottom.php");?>
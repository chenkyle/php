<div class="list-right">
<div class="list-menu">
<li class="sort-menu-active"><a href="javascript:void(0)" onclick="show_s.call(this,0)">�������</a></li>
<li class="sort-menu-off"><a href="javascript:void(0)" onclick="show_s.call(this,1)">��������</a></li>
<li class="sort-menu-off"><a href="javascript:void(0)" onclick="show_s.call(this,2)">�۸�����</a></li>
</div>
<div id="center1">
<!-- ��Ʒ���ӿ�ʼ --> 
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
//		   echo "<script language='javascript'>alert('��վ�������Ʋ�Ʒ!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>��վ�������Ʋ�Ʒ!</h2>";
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
		echo "����ͼƬ!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">���ͼۣ� <?php echo $info[shichangjia];?>Ԫ</span></li>
<li>��Ա�ۣ� <span class="bold-red"><?php echo $info[huiyuanjia];?>Ԫ</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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
	</li>
<li class="shopping-car">

</li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="����ղ�">����ղ�</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="�鿴����">�鿴����</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- ��Ʒ���ӽ��� -->
</div>
<div id="center2" style="display: none">
<!-- ��Ʒ���ӿ�ʼ --> 
<?php
	     $sql=mysql_query("select * from tb_shangpin order by cishu desc limit 0,6",$conn);
		 $info=mysql_fetch_array($sql);
		 if($info==false){
//		   echo "<script language='javascript'>alert('��վ�������Ʋ�Ʒ!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>��վ�������Ʋ�Ʒ!</h2>";
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
		echo "����ͼƬ!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">���ͼۣ� <?php echo $info[shichangjia];?>Ԫ</span></li>
<li>��Ա�ۣ� <span class="bold-red"><?php echo $info[huiyuanjia];?>Ԫ</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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
	</li>
<li class="shopping-car">

</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="����ղ�">����ղ�</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="�鿴����">�鿴����</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- ��Ʒ���ӽ��� -->
</div>
<div id="center3" style="display: none">
<!-- ��Ʒ���ӿ�ʼ --> 
<?php
	     $sql=mysql_query("select * from tb_shangpin order by shichangjia asc limit 0,6",$conn);
		 $info=mysql_fetch_array($sql);
		 if($info==false){
//		   echo "<script language='javascript'>alert('��վ�������Ʋ�Ʒ!');history.go(-1);</script>";
		   echo "<p></p>";
		   echo "<p><p><p><h2>��վ�������Ʋ�Ʒ!</h2>";
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
		echo "����ͼƬ!";
	}
	else
	{
		?> <img src="<?php echo "./".$info[tupian];?>" /> </a><?php }	?></div>
<div class="list-column-tit">
<li class="list-column-title">
<a href="show.php?id=<?php echo $info[id];?>" title="<?php echo $info[mingcheng];?>">
<?php echo $info[mingcheng];?></a></li>
<li><span class="line-through">���ͼۣ� <?php echo $info[shichangjia];?>Ԫ</span></li>
<li>��Ա�ۣ� <span class="bold-red"><?php echo $info[huiyuanjia];?>Ԫ</span></li>
</div>
<form action="shopping/addgouwuche.php?id=<?php echo $info[id];?>" method="post">
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

	</li>
<li class="shopping-car">
</li>
</div>
</form>
<div class="list-column-buy">
<li><a href="save/saveFavorites.php?sp_id=<?php echo $info[id];?>" title="����ղ�">����ղ�</a></li>
<li><a href="show.php?id=<?php echo $info[id];?>#pl" title="�鿴����">�鿴����</a></li>
</div>
<div class="clearfix"></div>
</div>
<?php }while($info=mysql_fetch_array($sql));
		 }?> 
<!-- ��Ʒ���ӽ��� -->
</div>

</div>

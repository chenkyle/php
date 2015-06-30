<div class="list-left-top"></div>
<div class="list-left-sc">
<form name="form1" method="post" action="healthlist.php">
<table>
<?php
			  session_register("total");//在全域变量中增加一个变量到目前的 Session 之中
			  if($_GET[qk]=="yes"){
			     $_SESSION[producelist]="";//注册SESSION全局变量
				 $_SESSION[quatity]=""; 
			  }
			   $arraygwc=explode("@",$_SESSION[producelist]);//把字符串分割为数组
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" <td height='25' colspan='5'><h3>您的订餐车为空!</h3></td>";
                   echo"</tr>";
				}
			  else{ 
?>
	<tr class="list-left-sc-s">
		<td class="list-left-sc-n">菜名</td>
		<td>单价</td>
		<td>数量</td>
		<td><span class="FF3300">小计</span></td>
		<td>操作</td>
	</tr>
	<?php
			    $total=0;
//			    $num=$_GET[sl];
			    $array=explode("@",$_SESSION[producelist]);
				$arrayquatity=explode("@",$_SESSION[quatity]);
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
			    $_SESSION[quatity]=implode("@",$arrayquatity);
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				   $num=$arrayquatity[$i];
				  
				  if($id!=""){
				   $sql=mysql_query("select * from tb_shangpin where id='".$id."'",$conn);
				   $info=mysql_fetch_array($sql);
				   $total1=$num*$info[huiyuanjia];
				   $total+=$total1;
				   $_SESSION["total"]=$total;
			?>
	<tr class="list-left-sc-d">
		<td class="list-left-sc-n"><a href="#" title="<?php echo $info[mingcheng];?>">
		<?php 
					echo substr($info[mingcheng],0,6);
					if(strlen($info[mingcheng])>6){
						echo "...";
					}
					?>
		</a></td>
		<td><?php echo $info[huiyuanjia];?></td>
		<td><input type="text" maxlength="2" name="<?php echo $info[id];?>" size="2" class="list-column-no" value=<?php echo $num;?>></td>
		<td><span class="FF3300"><?php echo $info[huiyuanjia]*$num;?></span></td>
		<td><a href="shopping/removegwc.php?id=<?php echo $info[id]?>">移除</a></td>
	</tr>
	<?php
			      }
				 }
			 ?>
	<tr class="list-left-sc-d">
		<td colspan="2" class="list-left-sc-n"><input name="submit2" type="submit"  value="更改数量"></td>
		<td>￥</td>
		<td><span class="FF3300"><?php echo $total;?></span></td>
		<td>元</td>
	</tr>
	<tr class="list-left-sc-s">
		<td colspan="5">
			<div align="center" >
				<a href="member_shopping.php">去收银台</a>
				<a href="list_jrtj.php?qk=yes">清空订餐车</a>
			</div>
		</td>
	</tr>
	<?php
		}
	?>
</table>
</form>
</div><div class="list-left-tit">健康分类</div>
<div class="list-left-sc list-left-cat">
<table>
<?php
$sql_lb=mysql_query("select * from tb_health_type order by id desc",$conn);
$info_lb=mysql_fetch_array($sql_lb);
if($info_lb==false)
{
	echo "本站暂无该类信息!";
}
else
{	
	$query="select * from tb_health_type order by id desc";
	$result=mysql_query($query,$conn); 
	$i=0; 
	$j=0; 
	while($row=mysql_fetch_row($result)){ 
	$array[$i][$j] = $row[0].$row[1]; 
	$array2[$i][$j] = $row[0]; 
	$array3[$i][$j] = $row[1]; 
	$j++; 
	if($j==2) { 
	$i++; 
	$j=0; 
	} 
	} 
	$amax=count($array);//获是数组内数据个数。 
	$rows=1; //设置列数 
	//开始显示数据 
	for ($x=0; $x<=$amax-1; $x++) { 
if($x%2==0){ 
?>
	<tr class="list-left-sc-s">
	<?php }else{?>
	<tr class="list-left-sc-d">
<?php }
for ($y=0; $y<=$rows; $y++) {
	echo "<td><a href='healthlist.php?hid=".$array2[$x][$y]."'>";
			echo substr($array3[$x][$y],0,8);
			if(strlen($array3[$x][$y])>8){echo "...";} 
			echo "</a></td>";
} 
echo "</tr>"; 
} 
}
?>
</table>
</div>
<div class="list-left-tit">食品分类</div>
<div class="list-left-sc list-left-cat">
<table>
<?php
$sql_lb=mysql_query("select * from tb_type order by id desc",$conn);
$info_lb=mysql_fetch_array($sql_lb);
if($info_lb==false)
{
	echo "<h3>本站暂无该类菜式!</h3>";
}
else
{	
	$query="select * from tb_type order by id desc";
	$result=mysql_query($query,$conn); 
	$i=0; 
	$j=0; 
	while($row=mysql_fetch_row($result)){ 
	$array[$i][$j] = $row[0].$row[1]; 
	$array2[$i][$j] = $row[0]; 
	$array3[$i][$j] = $row[1]; 
	$j++; 
	if($j==3) { 
	$i++; 
	$j=0; 
	} 
	} 
	$amax=count($array);//获是数组内数据个数。 
	$rows=2; //设置列数 
	//开始显示数据 
	for ($x=0; $x<=$amax-1; $x++) { 
if($x%2==0){ 
?>
	<tr class="list-left-sc-s">
	<?php }else{?>
	<tr class="list-left-sc-d">
<?php }
for ($y=0; $y<=$rows; $y++) {
	echo "<td><a href='typelist.php?tn=".$array3[$x][$y]."&typeid=".$array2[$x][$y]."'>";
			echo substr($array3[$x][$y],0,6);
			if(strlen($array3[$x][$y])>6){echo "...";} 
			echo "</a></td>";
} 
echo "</tr>"; 
} 
}
?>
</table>
</div>
<div class="list-left-tit">健康饮食</div>
<div class="list-left-sc list-left-food"><?php
$sql_health=mysql_query("select * from tb_health order by time desc limit 0,5",$conn);
$info_health=mysql_fetch_array($sql_health);
if($info_health==false)
{
	echo "<h3>本站暂无饮食健康信息!</h3>";
}
else
{
	$i=1;
	do
	{
		if($i<=3){
			if($i%2==0){
	   ?>
<li class="list-left-sc-s"><span class="list-left-hot-a"><?php echo $i;?></span>
<a href="healthshow.php?id=<?php echo $info_health[id];?>" title="<?php echo $info_health[title]?>"> 
<?php echo substr($info_health[title],0,25);
	if(strlen($info_health[title])>25){echo "...";} ?> 
	</a></li>
	<?php
			}else{
				?>
<li class="list-left-sc-d"><span class="list-left-hot-a"><?php echo $i;?></span><a
	href="healthshow.php?id=<?php echo $info_health[id];?>" title="<?php echo $info_health[title]?>"> <?php echo substr($info_health[title],0,25);
	if(strlen($info_health[title])>25){echo "...";} ?> </a></li>
	<?php }?> <?php
		}
		else{
			if($i%2==0){
				?>
<li class="list-left-sc-s"><span class="list-left-hot-r"><?php echo $i;?></span><a
	href="healthshow.php?id=<?php echo $info_health[id];?>" title="<?php echo $info_health[title]?>"> <?php echo substr($info_health[title],0,25);
	if(strlen($info_health[title])>25){echo "...";} ?> </a></li>
	<?php
			}else{
				?>
<li class="list-left-sc-d"><span class="list-left-hot-r"><?php echo $i;?></span><a
	href="healthshow.php?id=<?php echo $info_health[id];?>" title="<?php echo $info_health[title]?>"> <?php echo substr($info_health[title],0,25);
	if(strlen($info_health[title])>25){echo "...";} ?> </a></li>
	<?php }?> <?php
		}
		$i++;
	}while($info_health=mysql_fetch_array($sql_health));}?></div>

<div class="list-left-tit">热门食物</div>
<div class="list-left-sc list-left-food"><?php
$sql_hot=mysql_query("select * from tb_shangpin order by cishu desc limit 0,8",$conn);
$info_hot=mysql_fetch_array($sql_hot);
if($info_hot==false)
{
	echo "<h3>本站暂无热门菜式!</h3>";
}
else
{
	$i=1;
	do
	{
		if($i<=3){
			if($i%2==0){
	   ?>
<li class="list-left-sc-s"><span class="list-left-hot-a"><?php echo $i;?></span><a
	href="show.php?id=<?php echo $info_hot[id];?>" title="<?php echo $info_hot[mingcheng]?>"> 
	<?php echo substr($info_hot[mingcheng],0,25);
	if(strlen($info_hot[title])>25){echo "...";} ?> </a></li>
	<?php
			}else{
				?>
<li class="list-left-sc-d"><span class="list-left-hot-a"><?php echo $i;?></span><a
	href="show.php?id=<?php echo $info_hot[id];?>" title="<?php echo $info_hot[mingcheng]?>"> <?php echo substr($info_hot[mingcheng],0,25);
	if(strlen($info_hot[title])>25){echo "...";} ?> </a></li>
	<?php }?> <?php
		}
		else{
			if($i%2==0){
				?>
<li class="list-left-sc-s"><span class="list-left-hot-r"><?php echo $i;?></span><a
	href="show.php?id=<?php echo $info_hot[id];?>" title="<?php echo $info_hot[mingcheng]?>"> 
	<?php echo substr($info_hot[mingcheng],0,25);
	if(strlen($info_hot[title])>25){echo "...";} ?> </a></li>
	<?php
			}else{
				?>
<li class="list-left-sc-d"><span class="list-left-hot-r"><?php echo $i;?></span><a
	href="show.php?id=<?php echo $info_hot[id];?>" title="<?php echo $info_hot[mingcheng]?>"> <?php echo substr($info_hot[mingcheng],0,25);
	if(strlen($info_hot[title])>25){echo "...";} ?> </a></li>
	<?php }?> <?php
		}
		$i++;
	}while($info_hot=mysql_fetch_array($sql_hot));}?></div>

<div class="list-left-bottom"></div>
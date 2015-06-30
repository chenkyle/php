<?php
session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<!-- 首页注册模块开始 -->
<!-- 首页注册模块结束 -->
<!-- 主体开始 -->
<div class="main"><!-- 左边开始 --> <?php include("member_left.php");?> <!-- 左边结束 -->
<!-- 右边开始 -->
<div class="list-right">
<div class="show-submenu"><a href="index.php">系统首页</a> - <a
	href="member.php">会员中心</a> - 我的购物车</div>
<!-- 会员中心右边首页开始 -->
<div class="member-right-tit">我的购物车</div>
<div class="member-right-box"><!-- 会员中心首页订单开始 --> <!--                <div class="member-right-htitle">-->
<!--                    <span class="member-right-htitle-active">尚未确认</span>-->
<!--                    <a href="member_shop_order.php">发货之中</a>--> <!--                    <a href="member_shop_history.php">历史交易</a>-->
<!--                </div>--> <!-- 购物车步骤指南开始 -->
<div class="flow-steps">
<li style="background-position: -13px -96px; width: 4px;"></li>
<li
	style="background-image: none; background-color: #cb4714; color: #FFFFFF;">1.
查看购物车</li>
<li style="background-position: 0px -24px;">2. 确认购买</li>
<li style="background-position: 0px -48px;">3. 收货确认</li>
<li style="background-position: 0px -48px;">4. 评价</li>
<li style="background-position: -13px -120px; width: 4px;"></li>
</div>
<!-- 购物车步骤指南结束 -->
<div class="member-right-sc">
<form name="form1" method="post" action="member_shop_car.php">
<table>
<?php

$_SESSION['total']=null;					//session_register("total");//在全域变量中增加一个变量到目前的 Session 之中

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
	echo" <td height='25' colspan='5'><li class=no-info>您的订餐车为空!</li></td>";
	echo"</tr>";
}
else{
	?>
	<tr class="member-right-sc-s">
		<td class="member-right-sc-n">菜名</td>
		<td class="member-right-sc-dj">单价</td>
		<td>数量</td>
		<td><span class="FF3300">总价</span></td>
		<td colspan="2">操作</td>
	</tr>
	<?php
	$total=0;
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
			$sd=null;
			?>
			<?php if($i%2==0){$sd=1;?>
	<tr class="member-right-sc-d">
		<td class="member-right-sc-n"><a href="#"
			title="<?php echo $info[mingcheng];?>"><?php echo $info[mingcheng];?></a></td>
		<td><?php echo $info[huiyuanjia];?></td>
		<td><input type="text" name="<?php echo $info[id];?>" size="2"
			class="list-column-no" value=<?php echo $num;?>></td>
		<td><span class="FF3300"><?php echo $info[huiyuanjia]*$num;?></span></td>
		<td colspan="2" class="member-right-sc-b"><a
			href="shopping/removegwc.php?id=<?php echo $info[id]?>">移除</a></td>
	</tr>
	<?php }else{$sd=0;?>
	<tr class="member-right-sc-s">
		<td class="member-right-sc-n"><a href="#"
			title="<?php echo $info[mingcheng];?>"><?php echo $info[mingcheng];?></a></td>
		<td><?php echo $info[huiyuanjia];?></td>
		<td><input type="text" name="<?php echo $info[id];?>" size="2"
			class="list-column-no" value=<?php echo $num;?>></td>
		<td><span class="FF3300"><?php echo $info[huiyuanjia]*$num;?></span></td>
		<td colspan="2" class="member-right-sc-b"><a
			href="shopping/removegwc.php?id=<?php echo $info[id]?>">移除</a></td>
	</tr>
	<?php }?>
	<?php
		}
	}
	?>
	<?php if($sd==0){?>
	<tr class="list-left-sc-d">
	<?php }else{?>
	
	
	<tr class="list-left-sc-s">
	<?php }?>
		<td><input class="member-shop-submit" name="submit2" type="submit"
			value="更改数量"></td>
		<td colspan="4">
		<div align="center"><a href="member_shopping.php">立即购买</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="member_shop_car.php?qk=yes">清空订餐车</a></div>
		</td>
		<td>￥<span class="FF3300"><?php echo $total;?></span>元</td>
	</tr>
	<?php
}
?>
</table>
</form>
</div>
<!-- 会员中心首页订单结束 --></div>
<!-- 会员中心右边首页开始 --></div>
<!-- 右边结束 -->
<div class="clearfix"></div>
</div>
<!-- 主体结束 -->
<?php include("bottom.php");?>
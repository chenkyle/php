<?php
session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<!-- ��ҳע��ģ�鿪ʼ -->
<!-- ��ҳע��ģ����� -->
<!-- ���忪ʼ -->
<div class="main"><!-- ��߿�ʼ --> <?php include("member_left.php");?> <!-- ��߽��� -->
<!-- �ұ߿�ʼ -->
<div class="list-right">
<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a
	href="member.php">��Ա����</a> - �ҵĹ��ﳵ</div>
<!-- ��Ա�����ұ���ҳ��ʼ -->
<div class="member-right-tit">�ҵĹ��ﳵ</div>
<div class="member-right-box"><!-- ��Ա������ҳ������ʼ --> <!--                <div class="member-right-htitle">-->
<!--                    <span class="member-right-htitle-active">��δȷ��</span>-->
<!--                    <a href="member_shop_order.php">����֮��</a>--> <!--                    <a href="member_shop_history.php">��ʷ����</a>-->
<!--                </div>--> <!-- ���ﳵ����ָ�Ͽ�ʼ -->
<div class="flow-steps">
<li style="background-position: -13px -96px; width: 4px;"></li>
<li
	style="background-image: none; background-color: #cb4714; color: #FFFFFF;">1.
�鿴���ﳵ</li>
<li style="background-position: 0px -24px;">2. ȷ�Ϲ���</li>
<li style="background-position: 0px -48px;">3. �ջ�ȷ��</li>
<li style="background-position: 0px -48px;">4. ����</li>
<li style="background-position: -13px -120px; width: 4px;"></li>
</div>
<!-- ���ﳵ����ָ�Ͻ��� -->
<div class="member-right-sc">
<form name="form1" method="post" action="member_shop_car.php">
<table>
<?php

$_SESSION['total']=null;					//session_register("total");//��ȫ�����������һ��������Ŀǰ�� Session ֮��

if($_GET[qk]=="yes"){
	
	$_SESSION[producelist]="";//ע��SESSIONȫ�ֱ���
	$_SESSION[quatity]="";
}
$arraygwc=explode("@",$_SESSION[producelist]);//���ַ����ָ�Ϊ����
$s=0;
for($i=0;$i<count($arraygwc);$i++){
	$s+=intval($arraygwc[$i]);
}

if($s==0 ){
	echo "<tr>";
	echo" <td height='25' colspan='5'><li class=no-info>���Ķ��ͳ�Ϊ��!</li></td>";
	echo"</tr>";
}
else{
	?>
	<tr class="member-right-sc-s">
		<td class="member-right-sc-n">����</td>
		<td class="member-right-sc-dj">����</td>
		<td>����</td>
		<td><span class="FF3300">�ܼ�</span></td>
		<td colspan="2">����</td>
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
			href="shopping/removegwc.php?id=<?php echo $info[id]?>">�Ƴ�</a></td>
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
			href="shopping/removegwc.php?id=<?php echo $info[id]?>">�Ƴ�</a></td>
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
			value="��������"></td>
		<td colspan="4">
		<div align="center"><a href="member_shopping.php">��������</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="member_shop_car.php?qk=yes">��ն��ͳ�</a></div>
		</td>
		<td>��<span class="FF3300"><?php echo $total;?></span>Ԫ</td>
	</tr>
	<?php
}
?>
</table>
</form>
</div>
<!-- ��Ա������ҳ�������� --></div>
<!-- ��Ա�����ұ���ҳ��ʼ --></div>
<!-- �ұ߽��� -->
<div class="clearfix"></div>
</div>
<!-- ������� -->
<?php include("bottom.php");?>
<div class="list-right">
<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - ��Ա����</div>
<!-- ��Ա�����ұ���ҳ��ʼ -->
<div class="member-right-tit">�ҵĻ�Ա����</div>
<!-- ��Ա���ĸ������Ͽ���ʼ -->
<div class="member-right-box">
<div class="member-right-main">
<li class="member-right-main-tit"><?php echo $_SESSION[username];?></li>
<?php 
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
$sql_u=mysql_query("select r.rank as aa,u.* from tb_user u,tb_rank r where u.rank=r.id and u.name='".$_SESSION[username]."'",$conn); 
$info_u=mysql_fetch_array($sql_u);
?>
<li class="member-right-main-txt">�������ǵģ�<span class="FF3300"><?php echo $info_u[aa] ;?></span>������ӭ��½��Ա�������ģ�����ϣ��Ϊ���ṩ����ݡ����㡢��ȫ�Ķ��ͷ��񣬸�л����֧�֣�</li>
<li class="member-right-main-txt">�����ڵĻ���Ϊ��<span class="C0099CC"><?php echo $info_u[hisintegral] ;?></span>�֣���Ա���öȣ�<span
	class="C0099CC"><?php echo $info_u[credit] ;?></span></li>
<li class="member-right-main-menu"><a href="member_info.php">�޸�����</a></li>
<li class="member-right-main-menu"><a href="member_pingjia.php">�鿴����</a></li>
<li class="member-right-main-menu"><a href="member_shop_allorder.php">�ҵĶ���</a></li>
<li class="member-right-main-menu"><a href="member_favorites.php">�鿴�ղ�</a></li>
<li class="clearfix "></li>


<li class="member-right-main-gwc">���Ĺ��ﳵ�������ˣ�<span class="FF3300"><?php
$arraygwc=explode("@",$_SESSION[producelist]);//���ַ����ָ�Ϊ����
$num=0;
for($i=0;$i<count($arraygwc);$i++){
	if($arraygwc[$i]!="")
		$num++;
}
echo $num;?></span>������ʽ����˲鿴��<a
	href="member_shop_car.php">���ﳵ</a>��</li>
</div>
<!-- ��Ա���ĸ������Ͽ���ʼ --> <!-- ��Ա������ҳ������ʼ -->
<div class="member-right-title">���¶���</div>
<div class="member-right-sc">
<?php include("myorder.php");?>
</div>
<!-- ��Ա������ҳ�������� --></div>
<!-- ��Ա�����ұ���ҳ��ʼ --></div>

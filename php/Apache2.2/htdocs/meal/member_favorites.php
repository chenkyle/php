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
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<?php include("member_left.php");?>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �ҵ��ղؼ�</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
        	<div class="list-menu">
                    <li class="sort-menu-active"><a>�ҵ��ղ�</a></li>
            </div>
        	<!-- ��Ʒ���ӿ�ʼ -->
        	<?php
			$sql_favorites=mysql_query("select sp.*,f.id as fid from tb_shangpin as sp,tb_favorites as f where f.user_name='".$_SESSION[username]."' and sp.id=f.sp_id",$conn);
			$info_favorites=mysql_fetch_array($sql_favorites);
			if($info_favorites==false)
			{
				echo "<br><h1 class=no-info>�㻹û������ղ�!</h1>";
			}
			else
			{
				do
				{
			?>
        	<div class="list-column">
            	<div class="list-column-img">
            	<a href="show.php?id=<?php echo $info_favorites[id];?>" title="<?php echo $info1[mingcheng];?>">
            	<?php
				if($info_favorites[tupian]=="")
				{
					echo "����ͼƬ!";
				}
				else
				{
				?> 
            	<img src="<?php echo "./".$info_favorites[tupian];?>" />
            	</a><?php }	?>
            	</div>
                <div class="list-column-tit">
                <li class="list-column-title"><a href="show.php?id=<?php echo $info_favorites[id];?>" title="<?php echo $info1[mingcheng];?>"><?php echo $info_favorites[mingcheng];?></a></li>
                <li><span class="line-through">���ͼۣ� <?php echo $info_favorites[shichangjia];?>Ԫ</span></li>
                <li>��Ա�ۣ� <span class="bold-red"><?php echo $info_favorites[huiyuanjia];?>Ԫ</span></li>
                </div>
                <form action="shopping/addgouwuche.php?id=<?php echo $info_favorites[id];?>" method="post">
                <div class="list-column-text">
                    <li>���������� <input name="shuliang" class="list-column-no" type="text" value="1" maxlength="2"></li>
                    <li>
                        <select name="pay-Style" id="pay-Style" class="pay-Style">
                            <option value="0">���ʽ��</option>
                            <option value="��������">��������</option>
                        </select>
                    </li>
                </div>
                <div class="list-column-buy">
                    <li class="buy-menu" class="hot-min-box-space">
                   
					</li>
					<li class="shopping-car">
					
                </div>
                </form>
                <div class="list-column-buy">
                	<li><a href="user/deletefavorites.php?id=<?php echo $info_favorites[fid];?>" title="ɾ���ղ�">ɾ���ղ�</a></li>
                    <li><a href="show.php?id=<?php echo $info_favorites[id];?>#pl" title="�鿴����">�鿴����</a></li>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php }while($info_favorites=mysql_fetch_array($sql_favorites));}?>
            <!-- ��Ʒ���ӽ��� -->
            <!-- ҳ�뿪ʼ -->
            <div class="page-bottom">
                <span class="page-start"><a href="#" title="��һҳ"></a></span>
                <span class="page-cur">1</span>
                <a href="#" class="page-no">2</a>
                <a href="#" class="page-no">3</a>
                <a href="#" class="page-no">4</a>
                <a href="#" class="page-no">5</a>
                <span class="page-break">...</span>
                <span class="page-prev"><a href="#" title="��һҳ"></a></span>
                <li class="page-skip">
                        ��9ҳ ����<input class="page-skip-input" type="text" name="jumpto" id="jumpto" size="3" value="1"/>ҳ <input class="page-skip-button" type="submit" class="page-skip-button"  value="" title="ȷ��">
                </li>
			</div>
            <!-- ҳ����� -->
        </div>
        <!-- ��Ա�����ұ���ҳ���� -->
        </div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
     <?php include("bottom.php");?>
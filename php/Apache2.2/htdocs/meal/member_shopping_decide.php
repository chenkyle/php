<?php
session_start();
include("conn/conn.php");
include("top.php");
include("chklogin.php");
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<?php
			   $arraygwc=explode("@",$_SESSION[producelist]);//���ַ����ָ�Ϊ����
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
                   echo "<script>alert('���Ķ��ͳ�Ϊ��!');window.location.href='member_shop_car.php';</script>";
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
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �ջ�����Ϣ</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�ջ�ȷ��</div>
            <div class="member-right-box">
            <!-- ���ﳵ����ָ�Ͽ�ʼ -->
                <div class="flow-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. �鿴���ﳵ</li>
                    <li style="background-position:0px -48px;">2. ȷ�Ϲ���</li>
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">3. �ջ�ȷ��</li>
                    <li style="background-position:0px -24px;">4. ����</li>
                    <li style="background-position:-13px -120px; width: 4px;"></li>
                </div>
                <!-- ���ﳵ����ָ�Ͻ��� -->
            <div class="member-right-sc">
                <?php include("myorder.php");?>
                </div>
            </div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
    <?php include("bottom.php");
?>
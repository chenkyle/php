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
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �鿴���׳ɹ�����</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�鿴���׳ɹ�����</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <a href="member_shop_allorder.php">���ж���</a>
                    <a href="member_shop_order.php">����֮��</a>
                    <span class="member-right-htitle-active">���׳ɹ�����</span>
                </div>
                <div class="member-right-sc">
                <?php include("history.php");?>
                </div>
                <!-- ��Ա������ҳ�������� -->
            </div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
    <?php include("bottom.php");?>
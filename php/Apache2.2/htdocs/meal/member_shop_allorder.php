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
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �鿴���¶���</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">���ж���</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <span class="member-right-htitle-active">���ж���</span>
                    <a href="member_shop_order.php">����֮��</a>
                    <a href="member_shop_history.php">���׳ɹ�����</a>
                </div>
                <div class="member-right-sc">
                <?php include("allorder.php");?>
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
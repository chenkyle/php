<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- ע��ģ�鿪ʼ --><!-- ע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
   		<?php
   			$sql_show=mysql_query("select * from tb_contactus order by id desc limit 0,1",$conn); 
			$info_show=mysql_fetch_array($sql_show);
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="contact.php?mod=contact">��ϵ����</a></div>
            <!-- �����б�BANNER��ʼ --> 
            <div class="txt-banner"><img src="images/c-banner.png" /></div>
            <!-- �����б�BANNER���� -->
            <!-- ������ϸ�鿴��ʼ -->
            <div class="show-main-box">
                <div class="nwes-view-tit">��ϵ����</div>
                <div class="nwes-view-lmname margin-top-20">
                </div>          	

<p>��ϵ�ˣ�18716447934(��ͬѧ)&nbsp;&nbsp;&nbsp;&nbsp;18883717794(÷ͬѧ)</p>
<p>���䣺634962821#qq.com</p>
<p>QQ��<a target="_blank" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=424321913&amp;Menu=no">854984535</a></p>
<p>��ַ��������ɳƺ���������ѧ</p>
          </div>
            <!-- ������ϸ�鿴���� -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
   <?php include("bottom.php");?>
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
        <!-- ��߽��� -->/
   		<!-- �ұ߿�ʼ -->
   		<?php
		     $id=$_GET[id];
			 $sql=mysql_query("select * from tb_gonggao where id='".$id."'",$conn);
			 $info=mysql_fetch_array($sql);
		     include("function.php");
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="showgonggao.php">ϵͳ����</a>- <?php echo unhtml($info[title]);?></div>
            <!-- �����б�BANNER��ʼ --> 
            <div class="txt-banner"><img src="images/banner_1.png" /></div>
            <!-- �����б�BANNER���� -->
            <!-- ������ϸ�鿴��ʼ -->
            <div class="show-main-box">
                <div class="nwes-view-tit"><?php echo unhtml($info[title]);?></div>
                <div class="nwes-view-lmname">
                	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li>����ʱ�䣺<?php echo $info[time];?></li>
                    <li>�����24</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </div>
            	<?php echo unhtml($info[content]);?>
            </div>
            <!-- ������ϸ�鿴���� -->
            
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
   <?php include("bottom.php");?>
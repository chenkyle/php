<?php
include("top.php");
?>
    <!-- ��ҳע��ģ�鿪ʼ -->
    <div class="reg" style="height: 260px;">
        <div class="reg-main">
            <div class="reg-tit">
            	<div class="reg-title">����ɹ�</div>
            </div>
            <div class="reg-content">
            	<!-- ����ָ�Ͽ�ʼ -->
                <div class="reg-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. ��д��Ա��Ϣ</li>
                  <!--    <li style="background-position:0px -48px;">2. ͨ���ʼ�ȷ��</li> -->
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. ע��ɹ�</li>
                    <li style="background-position:-13px -72px; width: 4px;"></li>
                </div>
                <!-- ����ָ�Ͻ��� -->
             </div>
             <div class="reg-mail">
             	<div class="reg-mail-sfu">��ϲ����<bdo class="FF3300"><?php echo $_SESSION["salername"]; ?></bdo>�������ʺ�<bdo class="FF3300"><?php echo $_GET[n];?></bdo>�Ѿ�����,���<a href="saler/admin_main.php">����</a>�鿴���ĵ��̡�</div>
             </div>
    	</div>
    </div>
<!-- ��ҳע��ģ����� -->
    <?php include("bottom.php");?>
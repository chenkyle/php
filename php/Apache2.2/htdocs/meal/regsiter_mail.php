<?php
include("top.php");
?>
    <!-- ��ҳע��ģ�鿪ʼ -->
    <div class="reg" style="height: 340px;">
        <div class="reg-main">
            <div class="reg-tit">
            	<div class="reg-title">�ύ�ɹ�</div>
            </div>
            <div class="reg-content">
            	<!-- ����ָ�Ͽ�ʼ -->
                <div class="reg-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. ��д��Ա��Ϣ</li>
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. ͨ���ʼ�ȷ��</li>
                    <li style="background-position:0px -24px;">3. ע��ɹ�</li>
                    <li style="background-position:-13px -120px; width: 4px;"></li>
                </div>
                <!-- ����ָ�Ͻ��� -->
             </div>
             <?php
			$uid=$_GET[uid];
			$active=$_GET[active];
			$email=$_GET[email];
			?>
             <div class="reg-mail">
             	<div class="reg-mail-sccessful"><bdo class="FF3300"><?php echo $email;?></bdo>�յ���һ�⼤����,����48Сʱ�ڼ��</div>
             </div>
             <div class="no-email">
				<h3>û���յ��ʼ�?</h3>
				<ul>
                    <li>ȷ���ʼ��Ƿ����ṩ������ϵͳ�Զ����أ�������Ϊ�����ʼ��ŵ��������ˡ� </li>
                    <li>�������10��������Ȼδ�յ������ţ�������<br>
                    <A href="user/resend.php?uid=<?php echo $uid;?>&active=<?php echo $active;?>&email=<?php echo $email;?>" title="�ٴη��ͼ�����">�ط�������</A>
                    </li>
                    <li>����ٴη��ͼ����Ż�û�յ��������ԣ�<br><A href="#" title="��������ע��">��������ע�� </A></li>
                </ul>
            </div>
    	</div>
    </div>
<!-- ��ҳע��ģ����� -->
    <?php include("bottom.php");?>
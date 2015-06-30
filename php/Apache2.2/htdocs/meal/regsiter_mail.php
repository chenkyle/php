<?php
include("top.php");
?>
    <!-- 首页注册模块开始 -->
    <div class="reg" style="height: 340px;">
        <div class="reg-main">
            <div class="reg-tit">
            	<div class="reg-title">提交成功</div>
            </div>
            <div class="reg-content">
            	<!-- 步骤指南开始 -->
                <div class="reg-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. 填写会员信息</li>
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. 通过邮件确认</li>
                    <li style="background-position:0px -24px;">3. 注册成功</li>
                    <li style="background-position:-13px -120px; width: 4px;"></li>
                </div>
                <!-- 步骤指南结束 -->
             </div>
             <?php
			$uid=$_GET[uid];
			$active=$_GET[active];
			$email=$_GET[email];
			?>
             <div class="reg-mail">
             	<div class="reg-mail-sccessful"><bdo class="FF3300"><?php echo $email;?></bdo>收到了一封激活信,请在48小时内激活。</div>
             </div>
             <div class="no-email">
				<h3>没有收到邮件?</h3>
				<ul>
                    <li>确认邮件是否被你提供的邮箱系统自动拦截，或被误认为垃圾邮件放到垃圾箱了。 </li>
                    <li>如果超过10分钟您仍然未收到激活信，请您：<br>
                    <A href="user/resend.php?uid=<?php echo $uid;?>&active=<?php echo $active;?>&email=<?php echo $email;?>" title="再次发送激活信">重发激活信</A>
                    </li>
                    <li>如果再次发送激活信还没收到，请试试：<br><A href="#" title="更改邮箱注册">更改邮箱注册 </A></li>
                </ul>
            </div>
    	</div>
    </div>
<!-- 首页注册模块结束 -->
    <?php include("bottom.php");?>
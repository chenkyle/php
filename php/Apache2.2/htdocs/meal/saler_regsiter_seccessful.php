<?php
include("top.php");
?>
    <!-- 首页注册模块开始 -->
    <div class="reg" style="height: 260px;">
        <div class="reg-main">
            <div class="reg-tit">
            	<div class="reg-title">激活成功</div>
            </div>
            <div class="reg-content">
            	<!-- 步骤指南开始 -->
                <div class="reg-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. 填写会员信息</li>
                  <!--    <li style="background-position:0px -48px;">2. 通过邮件确认</li> -->
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. 注册成功</li>
                    <li style="background-position:-13px -72px; width: 4px;"></li>
                </div>
                <!-- 步骤指南结束 -->
             </div>
             <div class="reg-mail">
             	<div class="reg-mail-sfu">恭喜您，<bdo class="FF3300"><?php echo $_SESSION["salername"]; ?></bdo>！您的帐号<bdo class="FF3300"><?php echo $_GET[n];?></bdo>已经激活,点击<a href="saler/admin_main.php">这里</a>查看您的店铺。</div>
             </div>
    	</div>
    </div>
<!-- 首页注册模块结束 -->
    <?php include("bottom.php");?>
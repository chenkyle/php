<?php
session_start();
include("conn/conn.php");
include("top.php");
include("chklogin.php");
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<?php
			   $arraygwc=explode("@",$_SESSION[producelist]);//把字符串分割为数组
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
                   echo "<script>alert('您的订餐车为空!');window.location.href='member_shop_car.php';</script>";
				   exit;
				}
?>
<!-- 首页注册模块开始 -->
<!-- 首页注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<?php include("member_left.php");?>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 收货人信息</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">收货确认</div>
            <div class="member-right-box">
            <!-- 购物车步骤指南开始 -->
                <div class="flow-steps">
                    <li style="background-position:-13px -144px; width: 4px;"></li>
                    <li style="background-image: none;">1. 查看购物车</li>
                    <li style="background-position:0px -48px;">2. 确认购买</li>
                    <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">3. 收货确认</li>
                    <li style="background-position:0px -24px;">4. 评价</li>
                    <li style="background-position:-13px -120px; width: 4px;"></li>
                </div>
                <!-- 购物车步骤指南结束 -->
            <div class="member-right-sc">
                <?php include("myorder.php");?>
                </div>
            </div>
            <!-- 会员中心右边首页开始 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
    <?php include("bottom.php");
?>
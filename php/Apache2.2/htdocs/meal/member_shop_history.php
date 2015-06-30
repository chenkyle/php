<?php
session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
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
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 查看交易成功订单</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">查看交易成功订单</div>
            <div class="member-right-box">
            	<!-- 会员中心首页订单开始 -->
                <div class="member-right-htitle">
                    <a href="member_shop_allorder.php">所有订单</a>
                    <a href="member_shop_order.php">发货之中</a>
                    <span class="member-right-htitle-active">交易成功订单</span>
                </div>
                <div class="member-right-sc">
                <?php include("history.php");?>
                </div>
                <!-- 会员中心首页订单结束 -->
            </div>
            <!-- 会员中心右边首页开始 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
    <?php include("bottom.php");?>
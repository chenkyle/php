<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//session_start();
//if($_SESSION[admin]==""){
 // echo "<script>alert('您还没有登录!');window.location.href='index.htm';</script>"; 
 // exit;
 //}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="refresh" content="10">-->
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-Ua-Compatible" content="IE=EmulateIE7" />
<title>Bowos后台管理系统</title>
<link href="css/admin.css" type=text/css rel=stylesheet></link>
<style type="text/css">
.left-submenus{ display: none;
}
</style>
<script src="css/jquery.js" type="text/javascript"></script>
<script src="css/jscroll.js" type="text/javascript"></script>
<script language="javascript">
	//页面滚动条效果
	$(document).ready(function(){
	 $(".main-iframe").jscroll({
		W:"15px"
		,BgUrl:"url(images/s_bg.gif)"
		,Bg:"right 0 repeat-y"
		,Bar:{Pos:"bottom"
		,Bd:{Out:"#1c6f93",Hover:"#5f98b1"}
		,Bg:{Out:"-71px 0 repeat-y",Hover:"-58px 0 repeat-y",Focus:"-45px 0 repeat-y"}}
		,Btn:{btn:true
		,uBg:{Out:"0 0",Hover:"-15px 0",Focus:"-30px 0"}
		,dBg:{Out:"0 -15px",Hover:"-15px -15px",Focus:"-30px -15px"}}
		,Fn:function(){}
	  });
      //页面BOX效果
	  $(".maximize").click(function(){
	  	$frame = $(".maximize-frame");
	  	$frame.show();
	  	$(".maximize-frame .contnet").append($(".main-iframe").children());
	  });
	  $(".maximize-frame .close-btn").click(function(){
	  	$(".maximize-frame .contnet").children().appendTo($(".main-iframe"));
	  	$frame = $(".maximize-frame");
	  	$frame.hide();
	  });
	  $(".left-menu").click(function(){
		  $that = $(this).next(".left-submenus");
		if($that.css("display") == "none"){
		  $(".left-submenus").hide();
		  $that.show();
		} else {
		  $(".left-submenus").hide();
		}
	  });
	 });
	 //批量操作多选框
	window.checkBoxList = function($item,$btn){
		var fun = function(){
			if($item.filter("[checked]").length){
				$btn.removeAttr("disabled").css("color","");
			} else {
				$btn.attr("disabled","disabled").css("color","#889ABB");
			}
		};
		fun();
		$item.click(function(){
			fun();
		});
	}
</script>
</head>
<body>
    <!-- 顶部代码开始 -->
    <div class="top">
    	<div class="top-menu">
    	<li><a href="../index.php">网站首页</a></li>
            <li>
            <script language=Javascript>
            var isnDay = new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六","星期日");
            var now=new Date();
            document.write(now.getYear()+"年"+(now.getMonth()+1)+"月"+now.getDate()+"日&nbsp;"+isnDay[now.getDay()]+"&nbsp;"+now.getHours()+"时"+now.getMinutes()+"分"+now.getSeconds()+"秒");
            </script>
            </li>
    
            <li>欢迎您,<?php session_start(); echo $_SESSION[admin];?> </li>
            <li><a href="logout.php">[登出]</a></li>
        </div>
    </div>
     <!-- 顶部代码结束 -->
    <!-- 左边代码开始 -->
    <div class="left">
    	<div class="left-topmenu"><a href="#" title="往上拉"><img src="images/left_top_menu.png" /></a></div>
	    
       	<div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">用户管理</a></div>
        <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="edit/edituser.php" target="main">用户信息管理</a></ul>
	        
	        <ul class="left-submenu"><a href="edit/editadmin.php" target="main">管理员信息管理</a></ul>
	    </div>
	    
        <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_2.png);">订单查询</a></div>
        <div class="left-submenus">
	        <ul class="left-submenu"><a href="find/finddd.php" target="main">查询订单</a></ul>
	    </div>

        <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">公告管理</a></div>
        <div class="left-submenus">
        	<ul class="left-submenu"><a href="admingonggao.php " target="main">公告管理</a></ul>
       	 </div>
       	
       <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">评论管理</a></div>
	    <div class="left-submenus"> 	        
	        <ul class="left-submenu"><a href="edit/editpinglun.php" target="main">评论管理</a></ul>
	    </div>
	    

	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">链接管理</a></div>
	    <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="show/showalllink.php" target="main">查看链接</a></ul>
	    </div>
	    
	   <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">投诉管理</a></div>
	    <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="show/showcomplain.php" target="main">查看投诉</a></ul>
	    </div>
	    
	   <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_3.png);">报表统计</a></div>
        <div class="left-submenus">
	        <ul class="left-submenu"><a href="admintimesale.php" target="main">按时间统计</a></ul>
	        <ul class="left-submenu"><a href="adminquartersale.php" target="main">按季度统计</a></ul>
	    </div>
	    
	     <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">广告管理</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>广告管理</a></ul>
	    </div>
	    
	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">系统工具</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>日志管理</a></ul>
	       <ul class="left-submenu"><a>数据库管理</a></ul>
	       <ul class="left-submenu"><a>缓存管理</a></ul>
	    </div>
	    
	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">网站配置</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>全站设置</a></ul>
	       <ul class="left-submenu"><a>组件管理</a></ul>
	    </div>
	    
        <div class="left-bottommenu"><a href="#" title="往下拉"><img src="images/left_bottom_menu.png" /></a></div>
    </div>
    <!-- 左边代码结束 -->
    <!-- 页面主要内容代码开始 -->
    <div class="main">
      <div class="main-right"></div>
      <div class="main-left"></div>
   	  <div class="main-top">
       	  <div class="main-tit-bg"><img src="images/main_tit_bg_1.png" /></div>
        	<div class="main-top-tit">校园网订餐系统
        <!-- 	<a href="look/lookdd.php" target="main">最新订单</a> |
        	<a href="look/lookfadd.php" target="main">已发货订单</a> |
        	<a href="look/looknodd.php" target="main">未处理订单</a> |
        	<a href="look/lookalldd.php" target="main">所有订单</a> | 
        	<a href="find/finddd.php" target="main">订单查询</a> | 
        	<a href="look/lookhisdd.php" target="main">历史记录</a>  -->
        	</div>
      </div>
<script type="text/javascript">
(function(){
	var $main = $(".main");
	var fun = function(){
		var _width = $(window).width() - $main.offset().left;
		if(_width > 800)
			$main.css("width",_width);
		else
			$main.css("width",800);
	};
	$(window).resize(fun);
	$(document).ready(function(){
		fun();
	});
})();
</script>
        <div class="main-iframe">
        	<iframe id="main" name="main" src="" width="100%" height="590" frameBorder="0"></iframe>
        </div>
    </div>
    <!-- 页面主要内容代码结束 -->
    <!-- 页面脚部代码开始 -->
    <div class="copyright">COPYRIGHT &copy; 2006-2010 BOWOS ALL RIGHT RESERVED. </div>
    <!-- 页面脚部代码结束 -->
</body>
</html>

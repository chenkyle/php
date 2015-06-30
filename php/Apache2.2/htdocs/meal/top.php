<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>网上订餐系统</title>
<meta name="description" content="网上订餐系统" />
<meta name="keywords" content="重庆邮电大学，网上订餐系统，校园网订餐"/>
<link rel="stylesheet" type="text/css" href="css/subModal.css" />
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/subModal.js"></script>
<link rel="stylesheet" type="text/css" href="css/master.css" />
<script src="css/jquery.js"/>

<script language="javascript">
function show(){
	$(".nav .nav-active").removeClass("nav-active");
	$(this).addClass("nav-active");
}
</script>
<script language="javascript">
function show_it(n){
$menu = $(this).parents(".hot-menu");
$active = $(this).parents(".hot-menu-off");
$menu.find(".hot-active").removeClass("hot-active").addClass("hot-menu-off");
$active.addClass("hot-active").removeClass("hot-menu-off");
var n;
if(n == 0){document.getElementById("center_1").style.display = "";document.getElementById("center_2").style.display = "none";document.getElementById("center_3").style.display = "none";document.getElementById("center_4").style.display = "none";}
else if(n == 1){document.getElementById("center_1").style.display = "none";document.getElementById("center_2").style.display = "";document.getElementById("center_3").style.display = "none";document.getElementById("center_4").style.display = "none";}
else if(n == 2){document.getElementById("center_1").style.display = "none";document.getElementById("center_2").style.display = "none";document.getElementById("center_3").style.display = "";document.getElementById("center_4").style.display = "none";}
else{document.getElementById("center_1").style.display = "none";document.getElementById("center_2").style.display = "none";document.getElementById("center_3").style.display = "none";document.getElementById("center_4").style.display = "";}}
</script>
<script language="javascript">
function show_itlb(n){
$menu = $(this).parents(".sort-menu");
$active = $(this).parents(".sort-menu-off");
$menu.find(".sort-menu-active").removeClass("sort-menu-active").addClass("sort-menu-off");
$active.addClass("sort-menu-active").removeClass("sort-menu-off");
var n;
if(n == 0){document.getElementById("center1").style.display = "";document.getElementById("center2").style.display = "none";document.getElementById("center3").style.display = "none";}
else if(n == 1){document.getElementById("center1").style.display = "none";document.getElementById("center2").style.display = "";document.getElementById("center3").style.display = "none";}
else{document.getElementById("center1").style.display = "none";document.getElementById("center2").style.display = "none";document.getElementById("center3").style.display = "";}
}
</script>
<script language="javascript">
function show_s(n){
$menu = $(this).parents(".list-menu");
$active = $(this).parents(".sort-menu-off");
$menu.find(".sort-menu-active").removeClass("sort-menu-active").addClass("sort-menu-off");
$active.addClass("sort-menu-active").removeClass("sort-menu-off");
var n;
if(n == 0){document.getElementById("center1").style.display = "";document.getElementById("center2").style.display = "none";document.getElementById("center3").style.display = "none";}
else if(n == 1){document.getElementById("center1").style.display = "none";document.getElementById("center2").style.display = "";document.getElementById("center3").style.display = "none";}
else{document.getElementById("center1").style.display = "none";document.getElementById("center2").style.display = "none";document.getElementById("center3").style.display = "";}
}
</script>
<script language="javascript">function chkuserinput(form){if(form.username.value==""){alert("用户名为空，请输入用户名!");form.username.select();return(false);}if(form.userpwd.value==""){alert("密码为空，请输入密码!");form.userpwd.select();return(false);}return(true);}</script>
</head>
<body>
 <!-- 顶部开始 -->
<div class="header">
<div class="logo"><img src="images/logo.png" width="363" height="70" /></div>
<div class="topnav">
<li><img src="images/member.gif" /><a href="saler/index.htm">商家登陆</a>
<li><img src="images/shopcar.gif" /><a href="member_shop_car.php">购物车</a></li>
<li><img src="images/member.gif" /><a href="member.php">我的帐户</a>
<?php
if($_SESSION[username]!=""){
	echo "[";
	echo "$_SESSION[username]";
	echo "]";
}
?>
</li>
<?php
if($_SESSION[username]!=""){
?>
<li><img src="images/logout.gif" /><a href="user/logout.php">注销</a></li>
<?php }else{?>
<li><img src="images/login.gif" /><a href="regsiter.php">登录</a></li>
<?php }?>
</div>
<div class="nav">
<?php
$mod=$_GET[mod];
?>
<li <?php if($mod=="") echo"class='nav-active'";?>  onclick="show.call(this)"><a href="index.php">首页</a></li>
<!--  <li <?php if($mod=="about") echo"class='nav-active'";?> onclick="show.call(this)"><a href="about.php?mod=about">关于我们</a></li> -->
<li <?php if($mod=="today") echo"class='nav-active'";?>  onclick="show.call(this)"><a href="list_jrtj.php?tj=1&mod=today">今日菜式</a></li>
<li <?php if($mod=="usercenter") echo"class='nav-active'";?> onclick="show.call(this)"><a href="member.php?mod=usercenter">会员中心</a></li>
<li <?php if($mod=="kaidian") echo"class='nav-active'";?> onclick="show.call(this)"><a href="saler_regsiter.php?mod=kaidian">我要开店</a></li>
<li <?php if($mod=="contact") echo"class='nav-active'";?> onclick="show.call(this)"><a href="contact.php?mod=contact">联系我们</a></li>

</div>
</div>
<!-- 顶部结束-->
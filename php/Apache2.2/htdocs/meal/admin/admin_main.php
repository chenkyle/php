<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//session_start();
//if($_SESSION[admin]==""){
 // echo "<script>alert('����û�е�¼!');window.location.href='index.htm';</script>"; 
 // exit;
 //}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="refresh" content="10">-->
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-Ua-Compatible" content="IE=EmulateIE7" />
<title>Bowos��̨����ϵͳ</title>
<link href="css/admin.css" type=text/css rel=stylesheet></link>
<style type="text/css">
.left-submenus{ display: none;
}
</style>
<script src="css/jquery.js" type="text/javascript"></script>
<script src="css/jscroll.js" type="text/javascript"></script>
<script language="javascript">
	//ҳ�������Ч��
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
      //ҳ��BOXЧ��
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
	 //����������ѡ��
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
    <!-- �������뿪ʼ -->
    <div class="top">
    	<div class="top-menu">
    	<li><a href="../index.php">��վ��ҳ</a></li>
            <li>
            <script language=Javascript>
            var isnDay = new Array("������","����һ","���ڶ�","������","������","������","������","������");
            var now=new Date();
            document.write(now.getYear()+"��"+(now.getMonth()+1)+"��"+now.getDate()+"��&nbsp;"+isnDay[now.getDay()]+"&nbsp;"+now.getHours()+"ʱ"+now.getMinutes()+"��"+now.getSeconds()+"��");
            </script>
            </li>
    
            <li>��ӭ��,<?php session_start(); echo $_SESSION[admin];?> </li>
            <li><a href="logout.php">[�ǳ�]</a></li>
        </div>
    </div>
     <!-- ����������� -->
    <!-- ��ߴ��뿪ʼ -->
    <div class="left">
    	<div class="left-topmenu"><a href="#" title="������"><img src="images/left_top_menu.png" /></a></div>
	    
       	<div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">�û�����</a></div>
        <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="edit/edituser.php" target="main">�û���Ϣ����</a></ul>
	        
	        <ul class="left-submenu"><a href="edit/editadmin.php" target="main">����Ա��Ϣ����</a></ul>
	    </div>
	    
        <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_2.png);">������ѯ</a></div>
        <div class="left-submenus">
	        <ul class="left-submenu"><a href="find/finddd.php" target="main">��ѯ����</a></ul>
	    </div>

        <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">�������</a></div>
        <div class="left-submenus">
        	<ul class="left-submenu"><a href="admingonggao.php " target="main">�������</a></ul>
       	 </div>
       	
       <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">���۹���</a></div>
	    <div class="left-submenus"> 	        
	        <ul class="left-submenu"><a href="edit/editpinglun.php" target="main">���۹���</a></ul>
	    </div>
	    

	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">���ӹ���</a></div>
	    <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="show/showalllink.php" target="main">�鿴����</a></ul>
	    </div>
	    
	   <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">Ͷ�߹���</a></div>
	    <div class="left-submenus"> 
	        <ul class="left-submenu"><a href="show/showcomplain.php" target="main">�鿴Ͷ��</a></ul>
	    </div>
	    
	   <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_3.png);">����ͳ��</a></div>
        <div class="left-submenus">
	        <ul class="left-submenu"><a href="admintimesale.php" target="main">��ʱ��ͳ��</a></ul>
	        <ul class="left-submenu"><a href="adminquartersale.php" target="main">������ͳ��</a></ul>
	    </div>
	    
	     <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">������</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>������</a></ul>
	    </div>
	    
	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">ϵͳ����</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>��־����</a></ul>
	       <ul class="left-submenu"><a>���ݿ����</a></ul>
	       <ul class="left-submenu"><a>�������</a></ul>
	    </div>
	    
	    <div class="left-menu"><a href="#" style="background: url(images/left_menu_bg_4.png);">��վ����</a></div>
	    <div class="left-submenus"> 	        
	       <ul class="left-submenu"><a>ȫվ����</a></ul>
	       <ul class="left-submenu"><a>�������</a></ul>
	    </div>
	    
        <div class="left-bottommenu"><a href="#" title="������"><img src="images/left_bottom_menu.png" /></a></div>
    </div>
    <!-- ��ߴ������ -->
    <!-- ҳ����Ҫ���ݴ��뿪ʼ -->
    <div class="main">
      <div class="main-right"></div>
      <div class="main-left"></div>
   	  <div class="main-top">
       	  <div class="main-tit-bg"><img src="images/main_tit_bg_1.png" /></div>
        	<div class="main-top-tit">У԰������ϵͳ
        <!-- 	<a href="look/lookdd.php" target="main">���¶���</a> |
        	<a href="look/lookfadd.php" target="main">�ѷ�������</a> |
        	<a href="look/looknodd.php" target="main">δ������</a> |
        	<a href="look/lookalldd.php" target="main">���ж���</a> | 
        	<a href="find/finddd.php" target="main">������ѯ</a> | 
        	<a href="look/lookhisdd.php" target="main">��ʷ��¼</a>  -->
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
    <!-- ҳ����Ҫ���ݴ������ -->
    <!-- ҳ��Ų����뿪ʼ -->
    <div class="copyright">COPYRIGHT &copy; 2006-2010 BOWOS ALL RIGHT RESERVED. </div>
    <!-- ҳ��Ų�������� -->
</body>
</html>

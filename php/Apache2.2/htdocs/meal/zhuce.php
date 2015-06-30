<script type="text/javascript">
window.blur_tip = function(txt){
	$this = $(this);
	if($.trim($this.val()) == ""){
		$this.val(txt).attr("isEmpty","true");
	} else {
		$this.attr("isEmpty","false");
	};
};
window.focus_tip = function(){
	$this = $(this);
	if($this.attr("isEmpty") == "true"){
		$this.val("");
	};
};
</script>
<?php
if($_SESSION[username]!=""){
?>
   <!-- 注册模块开始 -->
    <div class="banner">
        <div class="banner-bar-l">
            <li class="banner-bar-l-t">系统公告：</li>
            <div class="banner-announcement">
            <div class="banner-announcement-scroll">
            <ul>
            <?php
			$sql2=mysql_query("select * from tb_gonggao order by time desc",$conn);
			$info2=mysql_fetch_array($sql2);
			if($info2==false){
				?>
			<li><img src="images/art.gif" />本站暂无公告!</li>
			<?php
			}
			else{
				do{
					?>
                <li><img src="images/art.gif" /><a
					href="showgg.php?id=<?php echo $info2[id];?>"> <?php 
					echo substr($info2[title],0,40);
					if(strlen($info2[title])>40){
						echo "...";
					}
					?> </a> - <?php echo $info2[time];?></li>
			<?php }while($info2=mysql_fetch_array($sql2));}?>
			</ul>
			</div>
            </div>
<script type="text/javascript">
(function(){
	setInterval(function(){
		$scroll = $(".banner-announcement-scroll");
		$ul = $scroll.children("ul") 
		$ul.animate({top:"-21px"},{duration:"slow",complete:function(){
			$ul.css("top","0px");
			$ul.find("li:first").appendTo($ul);
		}});
	},2000);
})();
</script>
        </div>
        <div class="banner-bar-r">
        	<div class="banner-bar-l-t banner-bar-r-h">会员中心：</div>
            <div class="banner-member">
            	<li>欢迎您，<span class="FF3300 FFFFFF"><?php echo $_SESSION[username];?></span>同学.您的身份是买家会员，可以开始您的网上订餐之旅。</li>
                <li>
<img src="images/01.gif" /><a href="member_shop_car.php">我的购物车</a><img src="images/02.gif" /><a href="user/logout.php">注销离开</a></li>
            </div>
            <div class="banner-bar-l-t banner-bar-r-s">搜索服务：</div>
            <form name="form" method="post" action="findlist.php">
            <div class="search">
                <li>
                <input name="name" class="search-text search-text-sp" isEmpty="true" type="text" value="输入您所需要的商品名称" />
                <input type="hidden" name="jdcz" value="jdcz">
                </li>
                <li><input name="ss" class="search-button" type="submit" value="搜 索" /></li>
                <li class="search-more"><a class="submodal-1020-230" href="search_list.php" target="_self">高级搜索</a></li>
            </div>
            </form>
            <script type="text/javascript">
(function(){
	$(".search-text-sp").focus(function(){
		focus_tip.call(this);
	}).blur(function(){
		blur_tip.call(this,"输入您所需要的商品名称");
	});
})();
</script>
        </div> 
	</div>
    <!-- 注册模块结束 -->
<?php
}
else{
?>
<!-- 首页注册模块开始 -->
    <div class="banner">
        <div class="banner-bar-l">
            <li class="banner-bar-l-t">快速上手指南：</li>
            <li class="banner-bar-l-s">只需三个步骤：</li>
            <li class="gray">第一步：快速注册，设置个人资料信息。</li>
            <li class="gray">第二步：挑选您所需要的食物，或者您也可以通过搜索中心找到您满意的食物。</li>
            <li class="gray">第三步：进入我的购物车，确定您所需要的食物，按发货就可以等着享受新鲜食物的乐趣了。</li>
            <li class="banner-bar-l-menu"><a href="regsiter.php" title="Regsiter"></a></li>
        </div>
        <div class="banner-bar-r">
        	<div class="banner-bar-l-t banner-bar-r-h">买家登录：</div>
            <div class="loginbar">
            <form id="form1" name="form1" method="post" action="user/chkuser.php" onSubmit="return chkuserinput(this)">
                <li><input name="usernamel" id="usernamel" class="loginbar-text loginbar-text-username" type="text" isEmpty="true" value="用户帐号" /></li>
                <li><input name="userpwd" id="userpwd" class="loginbar-text loginbar-text-password" type="password" /></li>
                <li class="loginbar-b"><input name="" class="loginbar-button" type="Submit"  value="登 录"/></li>
            </form>
<script type="text/javascript" language="javascript">
(function(){
	$(".loginbar-text-username").focus(function(){
		focus_tip.call(this);
	}).blur(function(){
		blur_tip.call(this,"用户账号");
	});
})();
</script>
            </div>
            <div class="regsiter">
                <li>忘记密码？<a class="submodal-365-250" href="user/getpassword_1.php">找回密码</a></li>
                <li>还没帐户？<a href="regsiter.php">点击注册</a></li>
            </div>
            <div class="banner-bar-l-t banner-bar-r-s">搜索服务：</div>
            <form name="form" method="post" action="findlist.php">
            <div class="search">
                <li><input name="name" class="search-text search-text-sp" isEmpty="true" type="text" value="输入您所需要的商品名称" /></li>
                <li><input type="hidden" name="jdcz" value="jdcz">
                <input name="ss" class="search-button" type="submit" value="搜 索" /></li>
                <li class="search-more"><a class="submodal-1020-230" href="search_list.php" target="_self">高级搜索</a></li>
            </div>
            </form>
            <script type="text/javascript">
            (function(){
            	$(".search-text-sp").focus(function(){
            		focus_tip.call(this);
            	}).blur(function(){
            		blur_tip.call(this,"输入您所需要的商品名称");
            	});
            })();
</script>
        </div> 
	</div>
    <!-- 首页注册模块结束 -->
<?php }?> 
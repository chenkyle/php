<div class="list-left">
        	<div class="member-left-top"></div>
            <div class="member-left-tit">订单管理<div class="member-left-btn member-left-btn1" title="展开"></div></div>
            <div class="member-left-txt">
            <li><img src="images/member_1.gif" /><a href="member_shop_car.php">我的购物车</a></li>
            	 <li><img src="images/member_2.gif" /><a href="member.php">会员中心</a></li>
                
               <li><img src="images/member_3.gif" /><a href="member_shop_allorder.php">已下的订单</a></li>
               <li><img src="images/member_3.gif" /><a href="member.php">最新订单</a></li>
            </div>
            <div class="member-left-tit">我的资料<div class="member-left-btn member-left-btn1" title="展开"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_4.gif" /><a href="member_info.php">我的资料</a></li>
                <li><img src="images/member_5.gif" /><a href="member_password.php">修改密码</a></li>
                <li><img src="images/member_6.gif" /><a href="member_add.php">地址薄管理</a></li>
            </div>
            <div class="member-left-tit">评价管理<div class="member-left-btn member-left-btn1" title="展开"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_9.gif" /><a href="member_pingjia.php">查看评价</a></li>
            </div>
            <div class="member-left-tit">我的收藏<div class="member-left-btn member-left-btn1" title="展开"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_11.gif" /><a href="member_favorites.php">收藏夹管理</a></li>
            </div>
            <div class="list-left-bottom"></div>
</div>
<script type="text/javascript">
$(".member-left-btn").click(function(){
	var $txt = $(this).closest(".member-left-tit").next();
	var $this = $(this);
	if($txt.css("display") == "none"){
		$txt.css("display","block");
		$this.removeClass("member-left-btn2").addClass("member-left-btn1");
	} else {
		$txt.css("display","none");
		$this.removeClass("member-left-btn1").addClass("member-left-btn2");
	};
});
</script>
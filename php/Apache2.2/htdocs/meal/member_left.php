<div class="list-left">
        	<div class="member-left-top"></div>
            <div class="member-left-tit">��������<div class="member-left-btn member-left-btn1" title="չ��"></div></div>
            <div class="member-left-txt">
            <li><img src="images/member_1.gif" /><a href="member_shop_car.php">�ҵĹ��ﳵ</a></li>
            	 <li><img src="images/member_2.gif" /><a href="member.php">��Ա����</a></li>
                
               <li><img src="images/member_3.gif" /><a href="member_shop_allorder.php">���µĶ���</a></li>
               <li><img src="images/member_3.gif" /><a href="member.php">���¶���</a></li>
            </div>
            <div class="member-left-tit">�ҵ�����<div class="member-left-btn member-left-btn1" title="չ��"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_4.gif" /><a href="member_info.php">�ҵ�����</a></li>
                <li><img src="images/member_5.gif" /><a href="member_password.php">�޸�����</a></li>
                <li><img src="images/member_6.gif" /><a href="member_add.php">��ַ������</a></li>
            </div>
            <div class="member-left-tit">���۹���<div class="member-left-btn member-left-btn1" title="չ��"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_9.gif" /><a href="member_pingjia.php">�鿴����</a></li>
            </div>
            <div class="member-left-tit">�ҵ��ղ�<div class="member-left-btn member-left-btn1" title="չ��"></div></div>
            <div class="member-left-txt">
                <li><img src="images/member_11.gif" /><a href="member_favorites.php">�ղؼй���</a></li>
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
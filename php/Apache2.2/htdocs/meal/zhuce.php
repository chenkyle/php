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
   <!-- ע��ģ�鿪ʼ -->
    <div class="banner">
        <div class="banner-bar-l">
            <li class="banner-bar-l-t">ϵͳ���棺</li>
            <div class="banner-announcement">
            <div class="banner-announcement-scroll">
            <ul>
            <?php
			$sql2=mysql_query("select * from tb_gonggao order by time desc",$conn);
			$info2=mysql_fetch_array($sql2);
			if($info2==false){
				?>
			<li><img src="images/art.gif" />��վ���޹���!</li>
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
        	<div class="banner-bar-l-t banner-bar-r-h">��Ա���ģ�</div>
            <div class="banner-member">
            	<li>��ӭ����<span class="FF3300 FFFFFF"><?php echo $_SESSION[username];?></span>ͬѧ.�����������һ�Ա�����Կ�ʼ�������϶���֮�á�</li>
                <li>
<img src="images/01.gif" /><a href="member_shop_car.php">�ҵĹ��ﳵ</a><img src="images/02.gif" /><a href="user/logout.php">ע���뿪</a></li>
            </div>
            <div class="banner-bar-l-t banner-bar-r-s">��������</div>
            <form name="form" method="post" action="findlist.php">
            <div class="search">
                <li>
                <input name="name" class="search-text search-text-sp" isEmpty="true" type="text" value="����������Ҫ����Ʒ����" />
                <input type="hidden" name="jdcz" value="jdcz">
                </li>
                <li><input name="ss" class="search-button" type="submit" value="�� ��" /></li>
                <li class="search-more"><a class="submodal-1020-230" href="search_list.php" target="_self">�߼�����</a></li>
            </div>
            </form>
            <script type="text/javascript">
(function(){
	$(".search-text-sp").focus(function(){
		focus_tip.call(this);
	}).blur(function(){
		blur_tip.call(this,"����������Ҫ����Ʒ����");
	});
})();
</script>
        </div> 
	</div>
    <!-- ע��ģ����� -->
<?php
}
else{
?>
<!-- ��ҳע��ģ�鿪ʼ -->
    <div class="banner">
        <div class="banner-bar-l">
            <li class="banner-bar-l-t">��������ָ�ϣ�</li>
            <li class="banner-bar-l-s">ֻ���������裺</li>
            <li class="gray">��һ��������ע�ᣬ���ø���������Ϣ��</li>
            <li class="gray">�ڶ�������ѡ������Ҫ��ʳ�������Ҳ����ͨ�����������ҵ��������ʳ�</li>
            <li class="gray">�������������ҵĹ��ﳵ��ȷ��������Ҫ��ʳ��������Ϳ��Ե�����������ʳ�����Ȥ�ˡ�</li>
            <li class="banner-bar-l-menu"><a href="regsiter.php" title="Regsiter"></a></li>
        </div>
        <div class="banner-bar-r">
        	<div class="banner-bar-l-t banner-bar-r-h">��ҵ�¼��</div>
            <div class="loginbar">
            <form id="form1" name="form1" method="post" action="user/chkuser.php" onSubmit="return chkuserinput(this)">
                <li><input name="usernamel" id="usernamel" class="loginbar-text loginbar-text-username" type="text" isEmpty="true" value="�û��ʺ�" /></li>
                <li><input name="userpwd" id="userpwd" class="loginbar-text loginbar-text-password" type="password" /></li>
                <li class="loginbar-b"><input name="" class="loginbar-button" type="Submit"  value="�� ¼"/></li>
            </form>
<script type="text/javascript" language="javascript">
(function(){
	$(".loginbar-text-username").focus(function(){
		focus_tip.call(this);
	}).blur(function(){
		blur_tip.call(this,"�û��˺�");
	});
})();
</script>
            </div>
            <div class="regsiter">
                <li>�������룿<a class="submodal-365-250" href="user/getpassword_1.php">�һ�����</a></li>
                <li>��û�ʻ���<a href="regsiter.php">���ע��</a></li>
            </div>
            <div class="banner-bar-l-t banner-bar-r-s">��������</div>
            <form name="form" method="post" action="findlist.php">
            <div class="search">
                <li><input name="name" class="search-text search-text-sp" isEmpty="true" type="text" value="����������Ҫ����Ʒ����" /></li>
                <li><input type="hidden" name="jdcz" value="jdcz">
                <input name="ss" class="search-button" type="submit" value="�� ��" /></li>
                <li class="search-more"><a class="submodal-1020-230" href="search_list.php" target="_self">�߼�����</a></li>
            </div>
            </form>
            <script type="text/javascript">
            (function(){
            	$(".search-text-sp").focus(function(){
            		focus_tip.call(this);
            	}).blur(function(){
            		blur_tip.call(this,"����������Ҫ����Ʒ����");
            	});
            })();
</script>
        </div> 
	</div>
    <!-- ��ҳע��ģ����� -->
<?php }?> 
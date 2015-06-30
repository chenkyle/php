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
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 修改密码</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">修改密码</div>
            <div class="member-right-box">
            	<!-- 会员中心首页订单开始 -->
                <div class="member-right-htitle">
                    <a href="member_info.php">个人信息</a>
                    <span class="member-right-htitle-active">修改密码</span>
                    <a href="member_add.php">收货地址</a>
                </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.p1.value==""){alert("请输入原密码!");form.p1.select();return(false);}
if(form.p2.value==""){alert("请输新密码!");form.p2.select();return(false);}      
if(form.p3.value==""){alert("请输确认密码!");form.p3.select();return(false);} 
if(form.p2.value!=form.p3.value){alert("密码与确认密码不同!");form.p2.select();return(false);}
if(form.p2.value.length<6){alert("新密码长度应大于6!");form.p2.select();return(false);}
return(true);}
</script>
                <form name="form1" method="post" action="user/savechangeuserpwd.php" onSubmit="return chkinput1(this)">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="reg-table-left">用户名：<span class="nes"></span></td>
                        <td class="reg-table-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[username];?></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">原密码：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p1" class="inputcss" type="password"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">新密码：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p2" class="inputcss" type="password"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">确认新密码：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p3" class="inputcss" type="password"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="member-button"><input name="submit2" type="submit" value="提 交" title="提交修改" /><input name="reset" type="reset" value="重 填" title="重新填写" /></td>
                      </tr>
                    </table>
                    </form>
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
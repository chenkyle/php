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
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 我的资料</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">我的资料</div>
            <div class="member-right-box">
            	<!-- 会员中心首页订单开始 -->
                <div class="member-right-htitle">
                    <span class="member-right-htitle-active">个人信息</span>
                    <a href="member_password.php">修改密码</a>
                    <a href="member_add.php">收货地址</a>
                </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.truename.value==""){alert("真实姓名不能为空!");form.truename.select();return(false);}
if(form.email.value==""){alert("电子邮箱不能为空!");form.email.select();return(false);}
if(form.email.value.indexOf('@')<0){alert("电子邮箱输入错误!");form.email.select();return(false);}
if(form.dizhi.value==""){alert("联系地址不能为空!");form.dizhi.select();return(false);}
if(form.lianxitel.value==""){alert("联系电话不能为空!");form.lianxitel.select();return(false);} 
return(true);}
</script>
          <form name="form1" method="post" action="user/changeuser.php" onsubmit="return chkinput1(this)">
              <?php
			   $sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
			   $info=mysql_fetch_array($sql);
			  ?>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	  <tr>
                        <td class="reg-table-left">用户名：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input readonly="readonly" value="<?php echo $info[name];?>" id="cusproblem" name="cusproblem" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">真实姓名：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[truename];?>" id="truename" name="truename" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">电子邮箱：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[email];?>" name="email" id="email" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">联系地址：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[dizhi];?>" id="dizhi" name="dizhi" class="inputcss" type="text"></td>
                      <tr>
                        <td class="reg-table-left">联系电话：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[lianxitel];?>" id="lianxitel" name="lianxitel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">手机号码：<span class="nes"> </span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[tel];?>" name="tel" id="tel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">QQ号码：<span class="nes"> </span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[qq];?>" id="qq" name="qq" class="inputcss" type="text"></td>
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
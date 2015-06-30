<?php
include("top.php");
?>
<style>
.FrameDivWarn {
border:1px solid #FF0000;
height:100%;
padding:2px;
}
.FrameDivPass {
border:1px solid #6FBE44;
height:100%;
padding:2px;
}
</style>
<script language="JavaScript" type="text/javascript" src="/js/from_ck.js" charset="utf-8"></script>

 <!-- 首页注册模块开始-->
<center>
<table   bordercolor="#FFFFFF" bgcolor="#FFFFFF" width="1000px" border="0" align="center">
 <tr><td><div class="reg">
	    	<div class="reg-left">
	        	<div class="reg-left-title"><span>登录</span>继续您的订餐之旅</div>
	            <div class="reg-main">
	            	<form id="form1" name="form1" method="post" action="user/chkuser.php" onSubmit="return chkuserinput(this)">
	            	<ul>
	                	<li>用户名：<input value="" name="usernamel" type="text" maxlength="20" id="usernamel" class="reg-ipnut" /></li>
	                    <li>密&nbsp;&nbsp;码：<input name="userpwd" type="password" maxlength="50" id="userpwd" class="reg-ipnut" /></li>
	                    <li><input type="submit" value="登陆" name="ibtLogin" id="ibtLogin"  class="reg-main-submit" />
							&nbsp;<a href="user/getpassword_1.php" class="submodal-365-250">忘记密码？</a></li>
	                </ul>
	                </form>
	            </div>
	        </div>
	       
	        <div class="reg-right">
	        	<div class="reg-right-title"><span>吃货注册</span>您是新用户？请您注册</div>
	            <div class="reg-main">
	            	<form name="formCompany" action="user/savereg.php" method="post" onsubmit="return check()">
	            	<ul>
	                	<li>&nbsp;用户名：
	                	<input id="username" type="text" name="usernc" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >4-20位字符，可由中英文、数字及“_”、“-”组成</SPAN></li>
	                    <li>输入密码：<input id="password"  type="password" name="p1" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=password_notice >6-16位字符，可由英文、数字及“_”、“-”组成</SPAN></li>
	                    <li>再次输入：<input id="conform_password"  type="password" name="p2" class="reg-ipnut" /></li>
	                    <li id="" style="color:Red;display:none;float:left;margin-right:5px;">
	                    <SPAN id=conform_password_notice ></SPAN></li>
	                    <li>&nbsp;&nbsp;邮&nbsp;&nbsp;箱：
	                    <input id="email" name="email" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=email_notice >接收订单通知、促销活动、找回密码，填写后不能修改</SPAN></li>
	                    <li><input type="checkbox" value="1" name="agreement" id="agreement" checked onblur="check_agreement(this)" class="reg-checkbox" />我已阅读并同意<a href="#">《用户协议》</a></li>
	                    <li><SPAN class="nes" id=agreement_notice ></SPAN></li>
	                    <li><input type="Submit" value="注册" name="Submit1" id="Submit1" class="reg-main-sub"  /></li>
	                </ul>
	                </form>
	            </div>
	        </div>
    </div>
    </td></tr>
</table>
</center>

<script language="javascript">

function check()
{
	if(document.formCompany.usernc.value=="")
	{
		alert("用户名不能为空");
		document.formCompany.usernc.focus();
		return false;
	}

	else if(document.formCompany.p1.value=="")
	{
		alert("密码不能为空");
		document.formCompany.p1.focus();
		return false;
	}
		else if(document.formCompany.p1.value!=document.formCompany.p2.value)
	{
		alert("两次输入的密码不一致！");
		document.formCompany.p2.focus();
		return false;
	}
	if(document.formCompany.email.value=="")
	{
		alert("邮箱不能为空");
		document.formCompany.email.focus();
		return false;
	}
	else
	{
	//form.action="registaction";
	form.submit();
	}

}
</script>  

<!--首页注册模块结束 -->
   
    <?php include("bottom.php");?>
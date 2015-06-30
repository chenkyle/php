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
 

    <!-- 首页注册模块开始 -->
<center><table   bordercolor="#FFFFFF" bgcolor="#FFFFFF" width="1000px" border="0" align="center">
 <tr><td>
 <div class="reg">
			<div class="reg-left">
	        	<div class="reg-left-title"><span>用户协议</span></div>
	            <div class="reg-main">
					<ul>               
 						<li>1、在本站注册的会员，必须遵守《互联网电子公告服务管理规定》，不得在本站发表诽谤他人，侵犯他人隐私，侵犯他人知识产权，传播病毒，政治言论，商业讯息等信息。<br /><br /></li>
						<li>2、在所有在本站发表的文章，本站都具有最终编辑权，并且保留用于印刷或向第三方发表的权利，如果你的资料不齐全，我们将有权不作任何通知使用你在本站发布的作品。<br /> <br /></li>
						<li>3、在登记过程中，您将选择注册名和密码。注册名的选择应遵守法律法规及社会公德。您必须对您的密码保密，您将对您注册名和密码下发生的所有活动承担责任。
					</ul>
				</div>
					
			</div>
 
	        
	        <div class="reg-right">
	        	<div class="reg-right-title"><span>商家注册</span>您是新用户？请您注册</div>
	            <div class="reg-main">
	            	<form name="formCompany" action="saler_savereg.php" method="post" onsubmit="return check()">
	            	<ul>
	                	
	                    
	                    <li>&nbsp;用户名：
	                	<input id="username" type="text" name="usernc" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >4-20位字符，可由中英文、数字及“_”、“-”组成,用于登陆本系统</SPAN></li>
	                    
	                    <li>输入密码：<input id="password" type="password" name="p1" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=password_notice >6-16位字符，可由英文、数字及“_”、“-”组成</SPAN></li>
	                    <li>再次输入：<input id="conform_password"  type="password" name="p2" class="reg-ipnut" /></li>
	                    <li id="" style="color:Red;display:none;float:left;margin-right:5px;">
	                    <SPAN id=conform_password_notice ></SPAN></li>
	                    <li>&nbsp;&nbsp;邮&nbsp;&nbsp;箱：
	                    <input id="email"  name="email" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=email_notice >接收订单通知、促销活动、找回密码，填写后不能修改</SPAN></li>
	                    
	                    <li>&nbsp;餐厅名称：
	                	<input id="companyname"  type="text" name="companyname" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >可由中英文、数字及“_”、“-”组成</SPAN></li>
	                    
	                    <li>&nbsp;负责人姓名：
	                	<input id="hostname"  type="text" name="hostname" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >可由中英文、数字及“_”、“-”组成</SPAN></li>
	                    
	                     <li>&nbsp;送餐电话：
	                	<input id="phone" type="text" name="phone" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >请输入有效的送餐电话</SPAN></li>
	                    
	                    
	                    <li>&nbsp;外送费用：
	                	<input id="sendprice"  type="text" name="sendprice" class="reg-ipnut" />元</li>
	                    <li class="reg-point"><SPAN id="username_notice" >由数字组成</SPAN></li>
	                    
	                   
	                    <li>&nbsp;起送价格：
	                	<input id="prices" type="text" name="prices" class="reg-ipnut" />元</li>
	                    <li class="reg-point"><SPAN id="username_notice" >由数字组成</SPAN></li>
	                    
	                      <li>&nbsp;餐厅介绍：
	                	<textarea  rows="3" cols="20" name="introduction" id="introduction"></textarea>
	                    <li class="reg-point"><SPAN id="username_notice" ></SPAN></li>
	                     
	              <!--       <li><input type="checkbox" value="1" name="agreement" id="agreement" checked onblur="check_agreement(this)" class="reg-checkbox" />我已阅读并同意<a href="#">《用户协议》</a></li>
	                     --> 
	                    <li><SPAN class="nes" id=agreement_notice ></SPAN></li>
	                    <li><input type="Submit" value="注册" name="Submit1" id="Submit1" style="background:url('/images/bottom_login.gif');" /></li>
	                </ul>
	                </form>
	                
	                
	              
	            </div>
	        </div>
    </div>
    </td></tr>
</table>
</center>
<!-- 首页注册模块结束 -->

 </center>
 
    <?php include("bottom.php");?>
    
 
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
	if(document.formCompany.companyname.value=="")
	{
		alert("餐厅名称不能为空");
		document.formCompany.companyname.focus();
		return false;
	}
	if(document.formCompany.hostname.value=="")
	{
		alert("负责人姓名不能为空");
		document.formCompany.hostname.focus();
		return false;
	}
	if(document.formCompany.phone.value=="")
	{
		alert("送餐电话不能为空");
		document.formCompany.phone.focus();
		return false;
	}
	if(document.formCompany.sendprice.value=="")
	{
		alert("外送费用不能为空");
		document.formCompany.sendprice.focus();
		return false;
	}
	if(document.formCompany.prices.value=="")
	{
		alert("起送价格不能为空");
		document.formCompany.prices.focus();
		return false;
	}
	if(document.formCompany.introduction.value=="")
	{
		alert("餐厅介绍不能为空");
		document.formCompany.introduction.focus();
		return false;
	}
	else
	{
	//form.action="registaction";
	form.submit();
	}

}
</script>   

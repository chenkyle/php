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

 <!-- ��ҳע��ģ�鿪ʼ-->
<center>
<table   bordercolor="#FFFFFF" bgcolor="#FFFFFF" width="1000px" border="0" align="center">
 <tr><td><div class="reg">
	    	<div class="reg-left">
	        	<div class="reg-left-title"><span>��¼</span>�������Ķ���֮��</div>
	            <div class="reg-main">
	            	<form id="form1" name="form1" method="post" action="user/chkuser.php" onSubmit="return chkuserinput(this)">
	            	<ul>
	                	<li>�û�����<input value="" name="usernamel" type="text" maxlength="20" id="usernamel" class="reg-ipnut" /></li>
	                    <li>��&nbsp;&nbsp;�룺<input name="userpwd" type="password" maxlength="50" id="userpwd" class="reg-ipnut" /></li>
	                    <li><input type="submit" value="��½" name="ibtLogin" id="ibtLogin"  class="reg-main-submit" />
							&nbsp;<a href="user/getpassword_1.php" class="submodal-365-250">�������룿</a></li>
	                </ul>
	                </form>
	            </div>
	        </div>
	       
	        <div class="reg-right">
	        	<div class="reg-right-title"><span>�Ի�ע��</span>�������û�������ע��</div>
	            <div class="reg-main">
	            	<form name="formCompany" action="user/savereg.php" method="post" onsubmit="return check()">
	            	<ul>
	                	<li>&nbsp;�û�����
	                	<input id="username" type="text" name="usernc" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >4-20λ�ַ���������Ӣ�ġ����ּ���_������-�����</SPAN></li>
	                    <li>�������룺<input id="password"  type="password" name="p1" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=password_notice >6-16λ�ַ�������Ӣ�ġ����ּ���_������-�����</SPAN></li>
	                    <li>�ٴ����룺<input id="conform_password"  type="password" name="p2" class="reg-ipnut" /></li>
	                    <li id="" style="color:Red;display:none;float:left;margin-right:5px;">
	                    <SPAN id=conform_password_notice ></SPAN></li>
	                    <li>&nbsp;&nbsp;��&nbsp;&nbsp;�䣺
	                    <input id="email" name="email" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=email_notice >���ն���֪ͨ����������һ����룬��д�����޸�</SPAN></li>
	                    <li><input type="checkbox" value="1" name="agreement" id="agreement" checked onblur="check_agreement(this)" class="reg-checkbox" />�����Ķ���ͬ��<a href="#">���û�Э�顷</a></li>
	                    <li><SPAN class="nes" id=agreement_notice ></SPAN></li>
	                    <li><input type="Submit" value="ע��" name="Submit1" id="Submit1" class="reg-main-sub"  /></li>
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
		alert("�û�������Ϊ��");
		document.formCompany.usernc.focus();
		return false;
	}

	else if(document.formCompany.p1.value=="")
	{
		alert("���벻��Ϊ��");
		document.formCompany.p1.focus();
		return false;
	}
		else if(document.formCompany.p1.value!=document.formCompany.p2.value)
	{
		alert("������������벻һ�£�");
		document.formCompany.p2.focus();
		return false;
	}
	if(document.formCompany.email.value=="")
	{
		alert("���䲻��Ϊ��");
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

<!--��ҳע��ģ����� -->
   
    <?php include("bottom.php");?>
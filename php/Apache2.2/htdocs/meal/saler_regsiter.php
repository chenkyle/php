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
 

    <!-- ��ҳע��ģ�鿪ʼ -->
<center><table   bordercolor="#FFFFFF" bgcolor="#FFFFFF" width="1000px" border="0" align="center">
 <tr><td>
 <div class="reg">
			<div class="reg-left">
	        	<div class="reg-left-title"><span>�û�Э��</span></div>
	            <div class="reg-main">
					<ul>               
 						<li>1���ڱ�վע��Ļ�Ա���������ء����������ӹ���������涨���������ڱ�վ����̰����ˣ��ַ�������˽���ַ�����֪ʶ��Ȩ�������������������ۣ���ҵѶϢ����Ϣ��<br /><br /></li>
						<li>2���������ڱ�վ��������£���վ���������ձ༭Ȩ�����ұ�������ӡˢ��������������Ȩ�������������ϲ���ȫ�����ǽ���Ȩ�����κ�֪ͨʹ�����ڱ�վ��������Ʒ��<br /> <br /></li>
						<li>3���ڵǼǹ����У�����ѡ��ע���������롣ע������ѡ��Ӧ���ط��ɷ��漰��ṫ�¡���������������뱣�ܣ���������ע�����������·��������л�е����Ρ�
					</ul>
				</div>
					
			</div>
 
	        
	        <div class="reg-right">
	        	<div class="reg-right-title"><span>�̼�ע��</span>�������û�������ע��</div>
	            <div class="reg-main">
	            	<form name="formCompany" action="saler_savereg.php" method="post" onsubmit="return check()">
	            	<ul>
	                	
	                    
	                    <li>&nbsp;�û�����
	                	<input id="username" type="text" name="usernc" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >4-20λ�ַ���������Ӣ�ġ����ּ���_������-�����,���ڵ�½��ϵͳ</SPAN></li>
	                    
	                    <li>�������룺<input id="password" type="password" name="p1" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=password_notice >6-16λ�ַ�������Ӣ�ġ����ּ���_������-�����</SPAN></li>
	                    <li>�ٴ����룺<input id="conform_password"  type="password" name="p2" class="reg-ipnut" /></li>
	                    <li id="" style="color:Red;display:none;float:left;margin-right:5px;">
	                    <SPAN id=conform_password_notice ></SPAN></li>
	                    <li>&nbsp;&nbsp;��&nbsp;&nbsp;�䣺
	                    <input id="email"  name="email" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id=email_notice >���ն���֪ͨ����������һ����룬��д�����޸�</SPAN></li>
	                    
	                    <li>&nbsp;�������ƣ�
	                	<input id="companyname"  type="text" name="companyname" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >������Ӣ�ġ����ּ���_������-�����</SPAN></li>
	                    
	                    <li>&nbsp;������������
	                	<input id="hostname"  type="text" name="hostname" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >������Ӣ�ġ����ּ���_������-�����</SPAN></li>
	                    
	                     <li>&nbsp;�Ͳ͵绰��
	                	<input id="phone" type="text" name="phone" class="reg-ipnut" /></li>
	                    <li class="reg-point"><SPAN id="username_notice" >��������Ч���Ͳ͵绰</SPAN></li>
	                    
	                    
	                    <li>&nbsp;���ͷ��ã�
	                	<input id="sendprice"  type="text" name="sendprice" class="reg-ipnut" />Ԫ</li>
	                    <li class="reg-point"><SPAN id="username_notice" >���������</SPAN></li>
	                    
	                   
	                    <li>&nbsp;���ͼ۸�
	                	<input id="prices" type="text" name="prices" class="reg-ipnut" />Ԫ</li>
	                    <li class="reg-point"><SPAN id="username_notice" >���������</SPAN></li>
	                    
	                      <li>&nbsp;�������ܣ�
	                	<textarea  rows="3" cols="20" name="introduction" id="introduction"></textarea>
	                    <li class="reg-point"><SPAN id="username_notice" ></SPAN></li>
	                     
	              <!--       <li><input type="checkbox" value="1" name="agreement" id="agreement" checked onblur="check_agreement(this)" class="reg-checkbox" />�����Ķ���ͬ��<a href="#">���û�Э�顷</a></li>
	                     --> 
	                    <li><SPAN class="nes" id=agreement_notice ></SPAN></li>
	                    <li><input type="Submit" value="ע��" name="Submit1" id="Submit1" style="background:url('/images/bottom_login.gif');" /></li>
	                </ul>
	                </form>
	                
	                
	              
	            </div>
	        </div>
    </div>
    </td></tr>
</table>
</center>
<!-- ��ҳע��ģ����� -->

 </center>
 
    <?php include("bottom.php");?>
    
 
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
	if(document.formCompany.companyname.value=="")
	{
		alert("�������Ʋ���Ϊ��");
		document.formCompany.companyname.focus();
		return false;
	}
	if(document.formCompany.hostname.value=="")
	{
		alert("��������������Ϊ��");
		document.formCompany.hostname.focus();
		return false;
	}
	if(document.formCompany.phone.value=="")
	{
		alert("�Ͳ͵绰����Ϊ��");
		document.formCompany.phone.focus();
		return false;
	}
	if(document.formCompany.sendprice.value=="")
	{
		alert("���ͷ��ò���Ϊ��");
		document.formCompany.sendprice.focus();
		return false;
	}
	if(document.formCompany.prices.value=="")
	{
		alert("���ͼ۸���Ϊ��");
		document.formCompany.prices.focus();
		return false;
	}
	if(document.formCompany.introduction.value=="")
	{
		alert("�������ܲ���Ϊ��");
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

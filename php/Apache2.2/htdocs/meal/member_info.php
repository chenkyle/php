<?php
session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<!-- ��ҳע��ģ�鿪ʼ -->
<!-- ��ҳע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<?php include("member_left.php");?>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �ҵ�����</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�ҵ�����</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <span class="member-right-htitle-active">������Ϣ</span>
                    <a href="member_password.php">�޸�����</a>
                    <a href="member_add.php">�ջ���ַ</a>
                </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.truename.value==""){alert("��ʵ��������Ϊ��!");form.truename.select();return(false);}
if(form.email.value==""){alert("�������䲻��Ϊ��!");form.email.select();return(false);}
if(form.email.value.indexOf('@')<0){alert("���������������!");form.email.select();return(false);}
if(form.dizhi.value==""){alert("��ϵ��ַ����Ϊ��!");form.dizhi.select();return(false);}
if(form.lianxitel.value==""){alert("��ϵ�绰����Ϊ��!");form.lianxitel.select();return(false);} 
return(true);}
</script>
          <form name="form1" method="post" action="user/changeuser.php" onsubmit="return chkinput1(this)">
              <?php
			   $sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
			   $info=mysql_fetch_array($sql);
			  ?>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	  <tr>
                        <td class="reg-table-left">�û�����<span class="nes">*</span></td>
                        <td class="reg-table-right"><input readonly="readonly" value="<?php echo $info[name];?>" id="cusproblem" name="cusproblem" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">��ʵ������<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[truename];?>" id="truename" name="truename" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">�������䣺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[email];?>" name="email" id="email" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">��ϵ��ַ��<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[dizhi];?>" id="dizhi" name="dizhi" class="inputcss" type="text"></td>
                      <tr>
                        <td class="reg-table-left">��ϵ�绰��<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[lianxitel];?>" id="lianxitel" name="lianxitel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">�ֻ����룺<span class="nes"> </span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[tel];?>" name="tel" id="tel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">QQ���룺<span class="nes"> </span></td>
                        <td class="reg-table-right"><input value="<?php echo $info[qq];?>" id="qq" name="qq" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="member-button"><input name="submit2" type="submit" value="�� ��" title="�ύ�޸�" /><input name="reset" type="reset" value="�� ��" title="������д" /></td>
                      </tr>
                    </table>
                    </form>
                </div>
                <!-- ��Ա������ҳ�������� -->
            </div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
     <?php include("bottom.php");?>
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
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �޸�����</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�޸�����</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <a href="member_info.php">������Ϣ</a>
                    <span class="member-right-htitle-active">�޸�����</span>
                    <a href="member_add.php">�ջ���ַ</a>
                </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.p1.value==""){alert("������ԭ����!");form.p1.select();return(false);}
if(form.p2.value==""){alert("����������!");form.p2.select();return(false);}      
if(form.p3.value==""){alert("����ȷ������!");form.p3.select();return(false);} 
if(form.p2.value!=form.p3.value){alert("������ȷ�����벻ͬ!");form.p2.select();return(false);}
if(form.p2.value.length<6){alert("�����볤��Ӧ����6!");form.p2.select();return(false);}
return(true);}
</script>
                <form name="form1" method="post" action="user/savechangeuserpwd.php" onSubmit="return chkinput1(this)">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="reg-table-left">�û�����<span class="nes"></span></td>
                        <td class="reg-table-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[username];?></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">ԭ���룺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p1" class="inputcss" type="password"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">�����룺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p2" class="inputcss" type="password"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">ȷ�������룺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input name="p3" class="inputcss" type="password"></td>
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
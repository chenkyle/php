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
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - ��ַ������</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">��ַ������</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <a href="member_info.php">������Ϣ</a>
                    <a href="member_password.php">�޸�����</a>
                    <span class="member-right-htitle-active">�ջ���ַ</span>
                </div>
            <div class="member-right-sc">
            	<table>
                  <tr class="member-right-sc-s">
                   <td class="member-add-n">��ϵ������</span></td>
                    <td class="member-add-a">�ͻ���ַ��</td>
                    <td>��ϵ�绰��</td>
                    <td>E-mail��</td>
                    <td>�ֻ����룺</td>
                    <td>QQ���룺</td>
                    <td colspan="2" class="member-add-c">����</td>
                  </tr>
                   <?php
                   	$sql=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
					$info=mysql_fetch_array($sql);
					$user_id=$info[id];
				   $sql1=mysql_query("select * from tb_address where user_id='".$user_id."'",$conn);
				   $info1=mysql_fetch_array($sql1);
				   $i=0;
				   do{
				  ?>
				  <?php if($i%2==0){?>
                  <tr class="member-right-sc-d">
                    <td class="member-add-n"><span class="FF3300"><?php echo $info1[name];?></span></td>
                    <td class="member-add-a"><?php echo $info1[address];?></td>
                    <td><?php echo $info1[lianxitel];?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?php echo $info1[email];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[tel];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[qq];?></td>
                    <td class="member-right-sc-b member-add-cz"><a href="member_add.php?addr_id=<?php echo $info1[id];?>">�޸�</a></td>
                    <td class="member-right-sc-b member-add-cz"><a href="user/deleteaddress.php?id=<?php echo $info1[id];?>">ɾ��</a></td>
                  </tr>
                  <?php }else{?>
                  <tr class="member-right-sc-s">
                    <td class="member-add-n"><span class="FF3300"><?php echo $info1[name];?></span></td>
                    <td class="member-add-a"><?php echo $info1[address];?></td>
                    <td><?php echo $info1[lianxitel];?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?php echo $info1[email];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[tel];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[qq];?></td>
                    <td class="member-right-sc-b member-add-cz"><a href="member_add.php?addr_id=<?php echo $info1[id];?>">�޸�</a></td>
                    <td class="member-right-sc-b member-add-cz"><a href="user/deleteaddress.php?id=<?php echo $info1[id];?>">ɾ��</a></td>
                  </tr>
                  <?php }?>
                  <?php $i++;}while($info1=mysql_fetch_array($sql1))?>
                </table>
            </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.name.value==""){alert("�ջ�����������Ϊ��!");form.name.select();return(false);}
if(form.address.value==""){alert("�ͻ���ַ����Ϊ��!");form.address.select();return(false);}
if(form.lianxitel.value==""){alert("��ϵ�绰����Ϊ��!");form.lianxitel.select();return(false);} 
if(form.email.value==""){alert("E-mail����Ϊ��!");form.email.select();return(false);}
if(form.email.value.indexOf('@')<0){ alert("��������ȷ�������ַ!"); form.email.select(); return(false); }
return(true);}
</script>
			<?php
				$addr_id=$_GET[addr_id];
			   $sql_xg=mysql_query("select * from tb_address where id='".$addr_id."'",$conn);
			   $info_xg=mysql_fetch_array($sql_xg);
			   if($addr_id==""){
			  ?>
                <form name="form1" method="post" action="user/addAddress.php" onsubmit="return chkinput1(this)">
               <?php }else{?>
               <form name="form1" method="post" action="user/changeAddress.php?addr_id=<?php echo $addr_id;?>" onsubmit="return chkinput1(this)">
               <?php }?>
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="reg-table-left">�ջ���������<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[name];?>"  id="name" name="name" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">�ͻ���ַ��<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[address];?>" id="address" name="address" class="inputcss" type="text"></td>
                      <tr>
                        <td class="reg-table-left">��ϵ�绰��<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[lianxitel];?>" id="lianxitel" name="lianxitel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">E-mail��<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[email];?>" id="email" name="email" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">�ֻ����룺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[tel];?>" id="tel" name="tel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">QQ���룺<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[qq];?>" id="qq" name="qq" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="member-button">
                        <?php if($addr_id==""){?>
                        <input name="submit2" type="submit" value="�� ��" title="�ύ���" />
                        <?php }else{?>
                        <input name="submit2" type="submit" value="�� ��" title="�ύ�޸�" />
                        <?php }?>
                        <input name="reset" type="reset" value="�� ��" title="������д" /></td>
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
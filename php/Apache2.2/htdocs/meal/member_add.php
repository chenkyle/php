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
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 地址薄管理</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">地址薄管理</div>
            <div class="member-right-box">
            	<!-- 会员中心首页订单开始 -->
                <div class="member-right-htitle">
                    <a href="member_info.php">个人信息</a>
                    <a href="member_password.php">修改密码</a>
                    <span class="member-right-htitle-active">收货地址</span>
                </div>
            <div class="member-right-sc">
            	<table>
                  <tr class="member-right-sc-s">
                   <td class="member-add-n">联系姓名：</span></td>
                    <td class="member-add-a">送货地址：</td>
                    <td>联系电话：</td>
                    <td>E-mail：</td>
                    <td>手机号码：</td>
                    <td>QQ号码：</td>
                    <td colspan="2" class="member-add-c">操作</td>
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
                    <td class="member-right-sc-b member-add-cz"><a href="member_add.php?addr_id=<?php echo $info1[id];?>">修改</a></td>
                    <td class="member-right-sc-b member-add-cz"><a href="user/deleteaddress.php?id=<?php echo $info1[id];?>">删除</a></td>
                  </tr>
                  <?php }else{?>
                  <tr class="member-right-sc-s">
                    <td class="member-add-n"><span class="FF3300"><?php echo $info1[name];?></span></td>
                    <td class="member-add-a"><?php echo $info1[address];?></td>
                    <td><?php echo $info1[lianxitel];?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?php echo $info1[email];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[tel];?>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $info1[qq];?></td>
                    <td class="member-right-sc-b member-add-cz"><a href="member_add.php?addr_id=<?php echo $info1[id];?>">修改</a></td>
                    <td class="member-right-sc-b member-add-cz"><a href="user/deleteaddress.php?id=<?php echo $info1[id];?>">删除</a></td>
                  </tr>
                  <?php }?>
                  <?php $i++;}while($info1=mysql_fetch_array($sql1))?>
                </table>
            </div>
                <div class="reg-table top-20px">
<script language="javascript">
function chkinput1(form){
if(form.name.value==""){alert("收货人姓名不能为空!");form.name.select();return(false);}
if(form.address.value==""){alert("送货地址不能为空!");form.address.select();return(false);}
if(form.lianxitel.value==""){alert("联系电话不能为空!");form.lianxitel.select();return(false);} 
if(form.email.value==""){alert("E-mail不能为空!");form.email.select();return(false);}
if(form.email.value.indexOf('@')<0){ alert("请输入正确的邮箱地址!"); form.email.select(); return(false); }
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
                        <td class="reg-table-left">收货人姓名：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[name];?>"  id="name" name="name" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">送货地址：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[address];?>" id="address" name="address" class="inputcss" type="text"></td>
                      <tr>
                        <td class="reg-table-left">联系电话：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[lianxitel];?>" id="lianxitel" name="lianxitel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">E-mail：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[email];?>" id="email" name="email" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">手机号码：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[tel];?>" id="tel" name="tel" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td class="reg-table-left">QQ号码：<span class="nes">*</span></td>
                        <td class="reg-table-right"><input value="<?php echo $info_xg[qq];?>" id="qq" name="qq" class="inputcss" type="text"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="member-button">
                        <?php if($addr_id==""){?>
                        <input name="submit2" type="submit" value="添 加" title="提交添加" />
                        <?php }else{?>
                        <input name="submit2" type="submit" value="修 改" title="提交修改" />
                        <?php }?>
                        <input name="reset" type="reset" value="重 填" title="重新填写" /></td>
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
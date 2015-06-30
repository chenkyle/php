<?php

session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<?php
			 $_SESSION['total']=null;// session_register("total");//在全域变量中增加一个变量到目前的 Session 之中
			  if($_GET[qk]=="yes"){
			     $_SESSION[producelist]="";//注册SESSION全局变量
				 $_SESSION[quatity]=""; 
				// $_SESSION[saler]="";//加的
			  }
			   $arraygwc=explode("@",$_SESSION[producelist]);//把字符串分割为数组
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
                   echo "<script>alert('您的订餐车为空!');window.location.href='member_shop_car.php';</script>";
				   exit;
				}
			  else{ 
			  	$total=0;
			    $array=explode("@",$_SESSION[producelist]);
				$arrayquatity=explode("@",$_SESSION[quatity]);
				//$arraysid=explode("@",$_SESSION[saler]); //加的
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
			    $_SESSION[quatity]=implode("@",$arrayquatity);
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				   $num=$arrayquatity[$i];
				  
				  if($id!=""){
				   $sql=mysql_query("select * from tb_shangpin where id='".$id."'",$conn);
				   $info=mysql_fetch_array($sql);
				   $total1=$num*$info[huiyuanjia];
				   $total+=$total1;
				   $_SESSION["total"]=$total;
				  }
				}
			  }
?>
<style>
.FrameDivWarn {
border:1px solid #FF0000;
height:50%;
padding:2px;
}
.FrameDivPass {
border:1px solid #6FBE44;
height:50%;
padding:2px;
}
</style>
<!-- 首页注册模块开始 -->
<!-- 首页注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<?php include("member_left.php");?>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 收货人信息</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">收货人信息</div>
            <div class="member-right-box">
            <!-- 会员中心个人资料开始 -->
            <!-- 购物车步骤指南开始 -->
            <div class="flow-steps">
                <li style="background-position:-13px -144px; width: 4px;"></li>
                <li style="background-image: none;">1. 查看购物车</li>
                <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. 确认购买</li>
                <li style="background-position:0px -24px;">3. 收货确认</li>
                <li style="background-position:0px -48px;">4. 评价</li>
                <li style="background-position:-13px -120px; width: 4px;"></li>
            </div>
            <!-- 购物车步骤指南结束 -->
<link rel="stylesheet" type="text/css" href="js/qrsh/style.css">
<script type="text/javascript" src="js/qrsh/jquery.js"></script>
<script type="text/javascript" src="js/qrsh/style.js"></script>
<script language="JavaScript" type="text/javascript" src="js/from_ck.js" charset="utf-8"></script>
<script type="text/javascript" src="js/pca.js"></script>
            <div class="member-shop-sc">
            <FORM name="formUser"  action="savedd.php" method="post" onsubmit="return register2()">
            <?php 
            	$sql_u=mysql_query("select * from tb_user where name='".$_SESSION[username]."'",$conn);
	   			$info_u=mysql_fetch_array($sql_u);
	   			$uid=$info_u[id];
            ?>
           <h1>确认收货地址</h1><br></br>
            <ul id="address-collection">
            <?php 
            	$sql_dz=mysql_query("select * from tb_address where user_id='".$uid."'",$conn);
	   			$info_dz=mysql_fetch_array($sql_dz);
	   			$i = 0;
//	   			if($info_dz=mysql_fetch_array($sql_dz)){
	   			do{
	   				if($i==0){
            ?>
			<li>
			    <input type="radio" id="<?php echo $info_dz[id];?>" value="<?php echo $info_dz[id];?>" checked="checked" class="ah:addressOption" name="address"/>
			    <label for="<?php echo $info_dz[id];?>">
			    <span class="buyer-address"><?php echo $info_dz[address];?></span>
			    <span class="buyer-name">(收货人:<?php echo $info_dz[name];?>)</span>
			    </label>
		    </li>
		    <?php
	   				}else{
		    ?>
		    <li>
			    <input type="radio" id="<?php echo $info_dz[id];?>" value="<?php echo $info_dz[id];?>" name="address"/>
			    <label for="<?php echo $info_dz[id];?>">
			    <span class="buyer-address"><?php echo $info_dz[address];?></span>
			    <span class="buyer-name">(收货人:<?php echo $info_dz[name];?>)</span>
			    </label>
		    </li>
		    <?php 
	   				}
	   				$i++;
	   			}while($info_dz=mysql_fetch_array($sql_dz));
//	   			}
		    ?>
		    <li id="other-address-li">
				<input type="radio" name="address" value="-1" id="address"/>
				<label for="other-address-radio">
					<span class="use-other-address">使用其它地址</span>
				</label>
			</li>
		</ul>
		<div id="other-address" style="display: none">
            <table>
              <tr>
                <td>收货人姓名：</td>
                <td class="member-shop-right">
                <input id="truename" name="truename" class="inputcss1" type="text" onBlur="shouhuoren(this)">
                <SPAN id=truename_notice ></SPAN>
                </td>
              </tr>
             
                      <tr>
                        <td>收货地址：</td>
                        <td class="member-shop-right">
                        <input id="jdxx" name="jdxx" class="inputcss1" type="text" onblur="jiedaoxx(this)">
                        <SPAN id=jdxx_notice ></SPAN></td>
                      <tr>
              <tr>
                <td>联系电话：</td>
                <td class="member-shop-right">
                <input name="tel" id="tel"  type="text" onBlur="chMobilePhone(this)">
                <SPAN id=tel_notice ></SPAN>
                </td>
              </tr>
              <tr>
                <td>电子邮箱：</td>
                <td class="member-shop-right">
                <INPUT id="email" onBlur="checkEmail(this)" name="email">
            			<SPAN id=email_notice ></SPAN>
                </td>
              </tr>
            </table>
         </div>
         <br></br>
         <h1>其他信息</h1>
         <table>
         	<tr>
                <td>简单留言：</td>
                <td class="member-shop-right"><TEXTAREA class="member-shop-input" onMouseOver="this.style.backgroundColor='#ffffff'" style="BACKGROUND-COLOR: #e8f4ff" onMouseOut="this.style.backgroundColor='#e8f4ff'" name="ly" rows="5" cols="70"></TEXTAREA></td>
              </tr>
              <tr>
                <td colspan="2"><INPUT class="member-shop-submit" type=submit value=确认购买 name="Submit1"></td>
              </tr>
         </table>
       </FORM>
            </div>
            <!-- 会员中心个人资料结束 -->
            </div>
            <!-- 会员中心右边首页开始 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
    <?php include("bottom.php");?>
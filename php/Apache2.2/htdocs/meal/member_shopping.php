<?php

session_start();
include("conn/conn.php");
include("top.php");
if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<?php
			 $_SESSION['total']=null;// session_register("total");//��ȫ�����������һ��������Ŀǰ�� Session ֮��
			  if($_GET[qk]=="yes"){
			     $_SESSION[producelist]="";//ע��SESSIONȫ�ֱ���
				 $_SESSION[quatity]=""; 
				// $_SESSION[saler]="";//�ӵ�
			  }
			   $arraygwc=explode("@",$_SESSION[producelist]);//���ַ����ָ�Ϊ����
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
                   echo "<script>alert('���Ķ��ͳ�Ϊ��!');window.location.href='member_shop_car.php';</script>";
				   exit;
				}
			  else{ 
			  	$total=0;
			    $array=explode("@",$_SESSION[producelist]);
				$arrayquatity=explode("@",$_SESSION[quatity]);
				//$arraysid=explode("@",$_SESSION[saler]); //�ӵ�
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
<!-- ��ҳע��ģ�鿪ʼ -->
<!-- ��ҳע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<?php include("member_left.php");?>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - �ջ�����Ϣ</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�ջ�����Ϣ</div>
            <div class="member-right-box">
            <!-- ��Ա���ĸ������Ͽ�ʼ -->
            <!-- ���ﳵ����ָ�Ͽ�ʼ -->
            <div class="flow-steps">
                <li style="background-position:-13px -144px; width: 4px;"></li>
                <li style="background-image: none;">1. �鿴���ﳵ</li>
                <li style="background-position:0px 0px; background-color: #cb4714; color: #FFFFFF;">2. ȷ�Ϲ���</li>
                <li style="background-position:0px -24px;">3. �ջ�ȷ��</li>
                <li style="background-position:0px -48px;">4. ����</li>
                <li style="background-position:-13px -120px; width: 4px;"></li>
            </div>
            <!-- ���ﳵ����ָ�Ͻ��� -->
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
           <h1>ȷ���ջ���ַ</h1><br></br>
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
			    <span class="buyer-name">(�ջ���:<?php echo $info_dz[name];?>)</span>
			    </label>
		    </li>
		    <?php
	   				}else{
		    ?>
		    <li>
			    <input type="radio" id="<?php echo $info_dz[id];?>" value="<?php echo $info_dz[id];?>" name="address"/>
			    <label for="<?php echo $info_dz[id];?>">
			    <span class="buyer-address"><?php echo $info_dz[address];?></span>
			    <span class="buyer-name">(�ջ���:<?php echo $info_dz[name];?>)</span>
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
					<span class="use-other-address">ʹ��������ַ</span>
				</label>
			</li>
		</ul>
		<div id="other-address" style="display: none">
            <table>
              <tr>
                <td>�ջ���������</td>
                <td class="member-shop-right">
                <input id="truename" name="truename" class="inputcss1" type="text" onBlur="shouhuoren(this)">
                <SPAN id=truename_notice ></SPAN>
                </td>
              </tr>
             
                      <tr>
                        <td>�ջ���ַ��</td>
                        <td class="member-shop-right">
                        <input id="jdxx" name="jdxx" class="inputcss1" type="text" onblur="jiedaoxx(this)">
                        <SPAN id=jdxx_notice ></SPAN></td>
                      <tr>
              <tr>
                <td>��ϵ�绰��</td>
                <td class="member-shop-right">
                <input name="tel" id="tel"  type="text" onBlur="chMobilePhone(this)">
                <SPAN id=tel_notice ></SPAN>
                </td>
              </tr>
              <tr>
                <td>�������䣺</td>
                <td class="member-shop-right">
                <INPUT id="email" onBlur="checkEmail(this)" name="email">
            			<SPAN id=email_notice ></SPAN>
                </td>
              </tr>
            </table>
         </div>
         <br></br>
         <h1>������Ϣ</h1>
         <table>
         	<tr>
                <td>�����ԣ�</td>
                <td class="member-shop-right"><TEXTAREA class="member-shop-input" onMouseOver="this.style.backgroundColor='#ffffff'" style="BACKGROUND-COLOR: #e8f4ff" onMouseOut="this.style.backgroundColor='#e8f4ff'" name="ly" rows="5" cols="70"></TEXTAREA></td>
              </tr>
              <tr>
                <td colspan="2"><INPUT class="member-shop-submit" type=submit value=ȷ�Ϲ��� name="Submit1"></td>
              </tr>
         </table>
       </FORM>
            </div>
            <!-- ��Ա���ĸ������Ͻ��� -->
            </div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
    <?php include("bottom.php");?>
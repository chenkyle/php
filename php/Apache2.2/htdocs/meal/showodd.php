<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>商品订单</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<?php
  include("conn/conn.php");
  $dingdanhao=$_GET[dd];
  $sql=mysql_query("select * from tb_dingdan where dingdanhao='".$dingdanhao."'",$conn);
  $info=mysql_fetch_array($sql);
  $spc=$info[spc];
  $slc=$info[slc];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<body>
<div class="main">
	<div class="main-number">
    <table>
        <tr>
            <td colspan="2"><div class="main-title">恭喜<?php echo $_SESSION[username];?>，您已成功的提交了此订单!详细信息如下:</div></td>
        </tr>
        <tr>
            <td><img src="images/member_1.gif">订单号：<?php echo $dingdanhao;?></td>
            <td>
            </td>
        </tr>
    </table>
    </div>
    <div class="main-menu">
    <table>
        <tr>
          <td colspan="5"><div class="main-title">菜单列表(如下)：</div></td>
        </tr>
        <tr class="main-tit">
            <td>菜单名称</td>
            <td>市场价</td>
            <td>会员价</td>
            <td>数量</td>
            <td>小计</td>
        </tr>
        <?php
	  $total=0;
	  for($i=0;$i<count($arraysp)-1;$i++){
		 if($arraysp[$i]!=""){
	     $sql1=mysql_query("select * from tb_shangpin where id='".$arraysp[$i]."'",$conn);
	     $info1=mysql_fetch_array($sql1);
		 $total=$total+=$arraysl[$i]*$info1[huiyuanjia];
	  ?>
        <tr>
            <td><?php echo $info1[mingcheng];?></td>
            <td><?php echo $info1[shichangjia];?></td>
            <td><?php echo $info1[huiyuanjia];?></td>
            <td><?php echo $arraysl[$i];?></td>
            <td><?php echo $arraysl[$i]*$info1[huiyuanjia];?></td>
         </tr>
         <?php
	   }
	   }
	 ?>
         <tr>
            <td colspan="5"><font class="red">总计费用: ￥<?php echo $total;?>元</font></td>
         </tr>
    </table>
    </div>
    <div class="main-infor">
    <table>
        <tr>
            <td class="main-tit">下单人：</td>
            <td colspan="3"><?php echo $_SESSION[username];?></td>
        </tr>
        <tr>
            <td class="main-tit">收货人：</td>
            <td colspan="3"><?php echo $info[shouhuoren];?></td>
        </tr>
        <tr>
            <td class="main-tit">收货人地址：</td>
            <td colspan="3"><?php echo $info[dizhi];?></td>
        </tr>
        <tr> 
            <td class="main-tit">电&nbsp;&nbsp;话：</td>
            <td colspan="3"><?php echo $info[tel];?></td>
        </tr>
        <tr>
            <td class="main-tit">E-mail:</td>
            <td><?php echo $info[email];?></td>
            <td class="main-tit">支付方式：</td>
            <td><?php echo $info[zfff];?></td>
        </tr>
        <tr>
            <td  colspan="4"><font class="red">请您在规定时间内按您的支付方式进行汇款,汇款时注明您的订单号!汇款后请及时通知我们</font></td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
            <td class="main-tit">创建时间：</td>
            <td><?php echo $info[time];?></td>
        </tr>
    </table>
    <?php
$_SESSION[producelist]="";
$_SESSION[quatity]=""; 
?>
    </div>
</div>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>处理订单</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
<?php
 include("conn/conn.php");
 $id=$_GET[id];
 $sql=mysql_query("select * from tb_dingdan where id='".$id."'",$conn);
 $info=mysql_fetch_array($sql);
?>
</head>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="6"><div class="main-title">执行处置</div></td>
  </tr>
     <form name="form1" method="post" action="save/saveorder.php?id=<?php echo $info[id];?>">
	  <tr>
        <td>订单编号：</td>
        <td><div align="left"><?php echo $info[dingdanhao];?></div></td>
        <td>已收款<input type="checkbox" value="已收款" name="ysk"></td>
        <td >已发货<input name="yfh" type="checkbox" value="已发货"></td>
        <td>已收货<input name="ysh" type="checkbox" value="已收货" ></td>
        <td><input type="submit" value="修改" class="buttoncss"></td>
	  </tr>
	  <tr>
    <td colspan="6"><font color="red">注：一旦商品确定发货，该商品数量将自动从库存中相应减少，并且不可更改！</font></td>
  </tr>
	  </form>
</table>
<br/>

<table>
      <tr class="main-tit">
        <td >商 品 名 称</td>
        <td >数量</td>
        <td >市场价</td>
        <td>会员价</td>
        <td>成交价</td>
        <td>折扣</td>
        <td>小 计</td>
      </tr>
	 <?php
	   $array=explode("@",$info[spc]);
	   $arraysl=explode("@",$info[slc]);
	   $total=0;
	   for($i=0;$i<count($array)-1;$i++)
	    {
		  if($array[$i]!="")
		  {
	       $sql1=mysql_query("select * from tb_shangpin where id='".$array[$i]."'",$conn);
		   $info1=mysql_fetch_array($sql1);
		   $total=$total+$info1[huiyuanjia]*$arraysl[$i];
	 ?>
      <tr>
        <td><div align="left"> &nbsp;<?php echo $info1[mingcheng];?></div></td>
        <td><?php if($info1[shuliang]<0) echo "售完"; else echo $arraysl[$i];?></td>
        <td><?php echo $info1[shichangjia];?></td>
        <td><?php echo $info1[huiyuanjia];?></td>
        <td><?php echo $info1[huiyuanjia];?></td>
        <td><?php echo ceil(($info1[huiyuanjia]/$info1[shichangjia])*100);?>%</td>
        <td><?php echo $info1[huiyuanjia]*$arraysl[$i];?></td>
      </tr>
	 <?php
	     }
	   }
	 ?> 
	 <tr>
    <td colspan="7"><div align="right" class="style3">合计：<?php echo $total;?>&nbsp;元&nbsp;</div></td>
  </tr>
</table>
<br/>
<table>
      <tr>
        <td colspan="2"><div class="main-title">收货人信息</div></td>
      </tr>
      <tr>
        <td >收货人姓名：</td>
        <td ><div align="left"><?php echo $info[shouhuoren];?></div></td>
      </tr>
      <tr>
        <td>详细地址：</td>
        <td><div align="left"><?php echo $info[dizhi];?></div></td>
      </tr>
      <tr>
        <td >电　　话：</td>
        <td><div align="left"><?php echo $info[tel];?></div></td>
      </tr>
      <tr>
        <td>电子邮件：</td>
        <td><div align="left"><?php echo $info[email];?></div></td>
      </tr>
	  <tr>
        <td>简单留言：</td>
        <td><div align="left"><?php echo $info[leaveword];?></div></td>
      </tr>
      <tr>
    <td colspan="2"><input name="button" type="button" class="buttoncss" onClick="javascript:history.back();" value="返回">    </td>
  </tr>
</table>
</div>
</body>
</html>

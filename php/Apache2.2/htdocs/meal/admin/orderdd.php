<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������</title>
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
    <td colspan="6"><div class="main-title">ִ�д���</div></td>
  </tr>
     <form name="form1" method="post" action="save/saveorder.php?id=<?php echo $info[id];?>">
	  <tr>
        <td>������ţ�</td>
        <td><div align="left"><?php echo $info[dingdanhao];?></div></td>
        <td>���տ�<input type="checkbox" value="���տ�" name="ysk"></td>
        <td >�ѷ���<input name="yfh" type="checkbox" value="�ѷ���"></td>
        <td>���ջ�<input name="ysh" type="checkbox" value="���ջ�" ></td>
        <td><input type="submit" value="�޸�" class="buttoncss"></td>
	  </tr>
	  <tr>
    <td colspan="6"><font color="red">ע��һ����Ʒȷ������������Ʒ�������Զ��ӿ������Ӧ���٣����Ҳ��ɸ��ģ�</font></td>
  </tr>
	  </form>
</table>
<br/>

<table>
      <tr class="main-tit">
        <td >�� Ʒ �� ��</td>
        <td >����</td>
        <td >�г���</td>
        <td>��Ա��</td>
        <td>�ɽ���</td>
        <td>�ۿ�</td>
        <td>С ��</td>
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
        <td><?php if($info1[shuliang]<0) echo "����"; else echo $arraysl[$i];?></td>
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
    <td colspan="7"><div align="right" class="style3">�ϼƣ�<?php echo $total;?>&nbsp;Ԫ&nbsp;</div></td>
  </tr>
</table>
<br/>
<table>
      <tr>
        <td colspan="2"><div class="main-title">�ջ�����Ϣ</div></td>
      </tr>
      <tr>
        <td >�ջ���������</td>
        <td ><div align="left"><?php echo $info[shouhuoren];?></div></td>
      </tr>
      <tr>
        <td>��ϸ��ַ��</td>
        <td><div align="left"><?php echo $info[dizhi];?></div></td>
      </tr>
      <tr>
        <td >�硡������</td>
        <td><div align="left"><?php echo $info[tel];?></div></td>
      </tr>
      <tr>
        <td>�����ʼ���</td>
        <td><div align="left"><?php echo $info[email];?></div></td>
      </tr>
	  <tr>
        <td>�����ԣ�</td>
        <td><div align="left"><?php echo $info[leaveword];?></div></td>
      </tr>
      <tr>
    <td colspan="2"><input name="button" type="button" class="buttoncss" onClick="javascript:history.back();" value="����">    </td>
  </tr>
</table>
</div>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ʒ����</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
  include("../conn/conn.php");
  $id=$_GET[id];
  $sql=mysql_query("select * from tb_dingdan where id='".$id."'",$conn);
  $info=mysql_fetch_array($sql);
  $spc=$info[spc];
  $slc=$info[slc];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<body>
<div class="main">
<table>
  <tr>
    <td><div align="right">
  <script>     
  function prn(){     
  document.all.WebBrowser1.ExecWB(7,1);  
  }     
  </script>     
  <object   ID='WebBrowser1'   WIDTH=0   HEIGHT=0   CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
	<input type="button" value="��ӡ" class="buttoncss" onClick="window.print()"></div></td>
  </tr>
</table>
<table>
<tr>
    <td colspan="5"><div class="main-title">�����ţ�<?php echo $info[dingdanhao];?></div></td>
  </tr>
      <tr class="main-tit">
        <td>�˵�����</td>
        <td>�г���</td>
        <td>��Ա��</td>
        <td>����</td>
        <td>С��</td>
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
        <td colspan="5">
          �ܼƷ���:<?php echo $total;?>
          </td>
        </tr>
</table><br/>
<table>
  <tr>
    <td>�µ��ˣ�</td>
    <td><div align="left"><?php echo $info[xiadanren];?></div></td>
    <td>�ջ��ˣ�</td>
    <td><div align="left"><?php echo $info[shouhuoren];?></div></td>
    
  </tr>
  <tr>
    <td >��&nbsp;&nbsp;����</td>
    <td ><div align="left"><?php echo $info[tel];?></div></td>
    <td>��&nbsp;&nbsp;ַ��</td>
    <td ><div align="left"><?php echo $info[dizhi];?></div></td>
  </tr>
  <tr>
    <td colspan="3"><input type="button" onClick="history.back();" value="����" class="buttoncss"></td>
    <td>����ʱ�䣺<?php echo $info[time];?></td>
  </tr>
</table>
</div>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�鿴����</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
include("../conn/conn.php");
include("../function.php");
$sql=mysql_query("select * from tb_pingjia where id='".$_GET[id]."'",$conn);
$info=mysql_fetch_array($sql);
?>
<body>
<div class="main">
<table>
<tr>
            <td colspan="2"><div class="main-title">�鿴������Ϣ</div></td>
          </tr>
  <tr>
    <td><div align="center">��������:</div></td>
    <td><div align="left"><?php echo $info[title];?></div></td>
  </tr>
  <tr>
    <td><div align="center">��&nbsp;&nbsp;��:</div></td>
    <td><div align="left"><?php echo unhtml($info[content]);?></div></td>
  </tr>
  <tr>
    <td><div align="center">״&nbsp;&nbsp;̬:</div></td>
    <td><div align="left"><?php if(unhtml($info[isshow])==0)echo "����"; else echo "��ʾ";?></div></td>
  </tr>
  <tr>
    <td><div align="center">����ʱ��:</div></td>
    <td><div align="left"><?php echo unhtml($info[time]);?></div></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" onClick="history.back();" value="����" class="buttoncss"></td>
  </tr>
</table>
</div>
</body>
</html>

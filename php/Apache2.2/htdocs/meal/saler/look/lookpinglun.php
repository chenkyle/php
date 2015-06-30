<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>查看评论</title>
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
            <td colspan="2"><div class="main-title">查看评论信息</div></td>
          </tr>
  <tr>
    <td><div align="center">评论主题:</div></td>
    <td><div align="left"><?php echo $info[title];?></div></td>
  </tr>
  <tr>
    <td><div align="center">内&nbsp;&nbsp;容:</div></td>
    <td><div align="left"><?php echo unhtml($info[content]);?></div></td>
  </tr>
  <tr>
    <td><div align="center">状&nbsp;&nbsp;态:</div></td>
    <td><div align="left"><?php if(unhtml($info[isshow])==0)echo "隐藏"; else echo "显示";?></div></td>
  </tr>
  <tr>
    <td><div align="center">评论时间:</div></td>
    <td><div align="left"><?php echo unhtml($info[time]);?></div></td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" onClick="history.back();" value="返回" class="buttoncss"></td>
  </tr>
</table>
</div>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>添加菜单类别</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<script language="javascript">
 function chkinput(form){if(form.leibie.value==""){alert('请输入新增菜单类别名!');form.leibie.select();return(false);}return(true);}
</script>
<body>
<div class="main">
<form name="form1" method="post" action="../save/saveaddleibie.php" onSubmit="return chkinput(this);">
<table>
  <tr>
    <td colspan="2"><div class="main-title">添加菜单类别</div></td>
  </tr>
        <tr>
          <td>类别名称：</td>
          <td><div align="left">
              &nbsp;
              <input type="text" name="leibie" class="inputcss" size="40">
          </div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="添加">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="返回" class="buttoncss">
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ӳ˵����</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<script language="javascript">
 function chkinput(form){if(form.leibie.value==""){alert('�����������˵������!');form.leibie.select();return(false);}return(true);}
</script>
<body>
<div class="main">
<form name="form1" method="post" action="../save/saveaddleibie.php" onSubmit="return chkinput(this);">
<table>
  <tr>
    <td colspan="2"><div class="main-title">��Ӳ˵����</div></td>
  </tr>
        <tr>
          <td>������ƣ�</td>
          <td><div align="left">
              &nbsp;
              <input type="text" name="leibie" class="inputcss" size="40">
          </div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="���">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="����" class="buttoncss">
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>

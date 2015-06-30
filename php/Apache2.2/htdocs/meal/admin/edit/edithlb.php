<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>修改饮食健康类别</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<?php
 include("../conn/conn.php");
 $sql=mysql_query("select * from tb_health_type where id=".$_GET[lb]."",$conn);      
 $info=mysql_fetch_array($sql);
?>
<script language="javascript">
 function chkinput(form){if(form.leibie.value==""){alert('请输入类别名!');form.leibie.select();return(false);}return(true);}
</script>
<body>
<div class="main">
<table>
 <form name="form1" method="post" action="../edit/edithleibie.php" onSubmit="return chkinput(this);">
  <tr>
    <td colspan="2"><div class="main-title">修改饮食健康类别</div></td>
  </tr>
        <tr>
          <td>类别名称：</div></td>
          <td><div align="left">
              &nbsp;
              <input value="<?php echo $info[typename];?>" type="text" name="leibie" class="inputcss" size="40">
          </div></td>
        </tr>
  <tr>
    <td colspan="2">
    	<input type="hidden" name="lb" value="<?php echo $_GET[lb];?>">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="修改">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="返回" class="buttoncss">
    </td>
  </tr>
  </form>
</table>
</div>
</body>
</html>

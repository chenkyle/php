<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
include("../conn/conn.php");
$adm=$_GET[id];
$text="";
$sql="";
$info="";
if($adm!=""){
	 $sql=mysql_query("select * from tb_admin where id='".$adm."'",$conn);
  	 $info=mysql_fetch_array($sql);
  	 $text="编辑管理员信息";
}else{
	$text="添加管理员信息";
}
?>
<title><?php echo $text;?></title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<script language="javascript">
 function chkinput(form){
	 if(form.leibie.value==""){alert('请输入新增菜单类别名!');form.leibie.select();return(false);}
	 
	 return(true);}
</script>
<body>
<div class="main">
<form name="form1" method="post" action="../save/saveaddadmin.php?oldid=<?php echo $adm;?>" onSubmit="return chkinput(this);">
<table>
  <tr>
    <td colspan="2"><div class="main-title"><?php echo $text;?></div></td>
  </tr>
        <tr>
          <td>用户名：</td>
          <td><div align="left">&nbsp;<input value="<?php echo $info[name];?>" type="text" name="name" class="inputcss" size="30"></div></td>
        </tr>
        <tr>
          <td>Email：</td>
          <td><div align="left">&nbsp;<input value="<?php echo $info[email];?>" type="text" name="email" class="inputcss" size="30"></div></td>
        </tr>
        <?php if($adm!=""){?>
        <tr>
          <td>旧密码：</td>
          <td><div align="left">&nbsp;<input type="password" name="old" class="inputcss" size="30">
          	如果要修改密码,请先填写旧密码,如留空,密码保持不变</div>
          </td>
        </tr>
        <?php }?>
        <tr>
          <td>密码：</td>
          <td><div align="left">&nbsp;<input type="password" name="p1" class="inputcss" size="30"></div></td>
        </tr>
        <tr>
          <td>确认密码：</td>
          <td><div align="left">&nbsp;<input type="password" name="p2" class="inputcss" size="30"></div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="确定">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="返回" class="buttoncss">
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>

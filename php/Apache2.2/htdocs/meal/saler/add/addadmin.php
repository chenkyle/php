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
  	 $text="�༭����Ա��Ϣ";
}else{
	$text="��ӹ���Ա��Ϣ";
}
?>
<title><?php echo $text;?></title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<script language="javascript">
 function chkinput(form){
	 if(form.leibie.value==""){alert('�����������˵������!');form.leibie.select();return(false);}
	 
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
          <td>�û�����</td>
          <td><div align="left">&nbsp;<input value="<?php echo $info[name];?>" type="text" name="name" class="inputcss" size="30"></div></td>
        </tr>
        <tr>
          <td>Email��</td>
          <td><div align="left">&nbsp;<input value="<?php echo $info[email];?>" type="text" name="email" class="inputcss" size="30"></div></td>
        </tr>
        <?php if($adm!=""){?>
        <tr>
          <td>�����룺</td>
          <td><div align="left">&nbsp;<input type="password" name="old" class="inputcss" size="30">
          	���Ҫ�޸�����,������д������,������,���뱣�ֲ���</div>
          </td>
        </tr>
        <?php }?>
        <tr>
          <td>���룺</td>
          <td><div align="left">&nbsp;<input type="password" name="p1" class="inputcss" size="30"></div></td>
        </tr>
        <tr>
          <td>ȷ�����룺</td>
          <td><div align="left">&nbsp;<input type="password" name="p2" class="inputcss" size="30"></div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="ȷ��">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="����" class="buttoncss">
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>

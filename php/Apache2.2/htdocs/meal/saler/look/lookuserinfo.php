<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�û���Ϣ����</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<?php
	include("../conn/conn.php");
	$id=$_GET[id];
	$sql=mysql_query("select * from tb_user where id=".$id."",$conn);
	$info=mysql_fetch_array($sql);
?>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="4"><div class="main-title">�û���Ϣ�鿴</div></td>
  </tr>
      <tr>
        <td>�û��ǳƣ�</td>
        <td><div align="left"><?php echo $info[name];?></div></td>
        <td>�û�״̬��</td>
        <td><div align="left"><?php
	 if($info[dongjie]==0)
	  {
	    echo "�Ƕ���״̬";
	  }
	  else
	  { 
	   echo "����״̬"; 
	  }
		?></div></td>
      </tr>
      <tr>
        <td>��ʵ����</td>
        <td colspan="3"><div align="left"><?php echo $info[truename];?></div></td>
      </tr>
	  <tr>
        <td>E-mail��</td>
        <td colspan="3"><div align="left"><?php echo $info[email];?></div></td>
      </tr>
	  <tr>
        <td>��ϵ�绰��</td>
        <td colspan="3"><div align="left"><?php echo $info[tel];?></div></td>
      </tr>
	  <tr>
        <td >QQ���룺</td>
        <td colspan="3" ><div align="left"><?php echo $info[qq];?></div></td>
      </tr>
	  <tr>
        <td>ע��ʱ�䣺</td>
        <td colspan="3" ><div align="left"><?php echo $info[regtime];?></div></td>
      </tr>
	  <tr>
        <td >������ʾ��</td>
        <td colspan="3" ><div align="left"><?php echo $info[tishi];?></div></td>
      </tr>
	  <tr>
        <td >������ʾ�𰸣�</td>
        <td colspan="3" ><div align="left"><?php echo $info[huida];?></div></td>
      </tr>
  <tr>
    <td colspan="4"><a href="../dongjieuser.php?id=<?php echo $id;?>">
	<?php
	 $sql=mysql_query("select * from tb_user where id=".$id."",$conn);
	 $info=mysql_fetch_array($sql);
	 if($info[dongjie]==0)
	  {
	    echo "������û�";
	  }
	  else
	  {
	    echo "�������";
	  }
	?></a>&nbsp;&nbsp;
  </tr>
</table>
</div>
</body>
</html>
